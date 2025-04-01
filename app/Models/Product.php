<?php

namespace App\Models;

use App\Traits\HasStatus;
use Spatie\Sluggable\HasSlug;
use App\Traits\HasTranslation;
use Spatie\Sluggable\SlugOptions;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\Conversions\Manipulations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia,HasFactory;
    use LogsActivity;
    use HasStatus;
    use HasTranslation;
    use HasSlug;
   

    public $translatable = ['name', 'description'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name_en')
            ->saveSlugsTo('slug')
            ->preventOverwrite()
            ->usingSeparator('-');
    }

protected $table='products';
protected $fillable =['name_ar','name_en','slug','category_id','sku',
'description_en','description_ar','status','remarks','created_by','updated_by'];



public function getActivitylogOptions(): LogOptions
{
    return LogOptions::defaults()
    ->logOnly(['*']);
    // Chain fluent methods for configuration options
}

public function seo(): array 
{
    return [
        'title' => $this->name,
        'description' => $this->description,
        'keywords' => $this->remarks,
    ];
}

    public function price()
    {
        return $this->morphOne(price::class, 'pricable');
    }



    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('products')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('webp')
                ->format('webp') 
                ->quality(90)
                ->nonQueued();      
                $this
                    ->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
    }

    
    public function category(){
        return $this->belongsTo(ProductCategory::class,'category_id');
        }

    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'product_offer', 'product_id', 'offer_id');
    }

    public function attributes(){
        return $this->hasMany(ProductAttribute::class,'product_id');
    }

    public function features(){
        return $this->hasMany(ProductFeature::class,'product_id');
    }
    public function applications(){
        return $this->hasMany(ProductAplication::class,'product_id');
    }
  
    public function scopeBackFilter($query, $search, $sort, $paginate)
{
    return $query->with(['category', 'media', 'offers', 'price','attributes','features','applications'])
        ->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name_ar', 'like', '%'.$search.'%')
                      ->orWhere('name_en', 'like', '%'.$search.'%');
            });
        })
        ->orderBy('id', $sort)
        ->paginate($paginate);
}


    public function scopeFilter($query, $low = null, $high = null, $cat_id = null)
    {
        return $query->with(['category', 'media', 'offers', 'price','attributes','features','applications'])
            ->where('status', 'active')     
            
            // Filter by category if $cat_id exists
            ->when($cat_id, function ($query) use ($cat_id) {
                $query->whereRelation('category', 'category_id', '=', $cat_id);
            })
    
            // Filter price range only if $low and $high exist
            ->when(isset($low, $high), function ($query) use ($low, $high) {
                $query->whereHas('price', function ($query) use ($low, $high) {
                    $query->whereBetween('price', [$low, $high]);
                });
            })
            
            ->latest(); // 🔹 Get the latest records (sorted by created_at)
    }

    public function scopeRecent($query)
    {
        return $query->with(['category', 'media', 'offers', 'price','attributes','features','applications'])
            ->where('status', 'active')     
            ->latest(); // 🔹 Get the latest records (sorted by created_at)
    }
    
    

    
    
    }
   


