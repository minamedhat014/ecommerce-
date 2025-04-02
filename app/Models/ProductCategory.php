<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use App\Traits\HasTranslation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductCategory extends Model implements HasMedia
{
    use HasFactory;
    use HasSlug;
    use HasTranslation;
    use InteractsWithMedia;

    
    protected $table ='product_categories';
    protected $with=['media'];
   protected $fillable = ['name_ar','name_en','slug','description'];
    /**
     * Get the options for generating the slug.
     */
  public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('categories')
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


     public function product(): BelongsTo
     {
         return $this->belongsTo(Product::class);
     }


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name_en')
            ->saveSlugsTo('slug')
            ->preventOverwrite()
            ->usingSeparator('_');
    }




}
