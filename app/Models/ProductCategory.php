<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use App\Traits\HasTranslation;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCategory extends Model
{
    use HasFactory;
    use HasSlug;
    use HasTranslation;
    
    protected $table ='product_categories';
   protected $fillable = ['name_ar','name_en','slug','description'];
    /**
     * Get the options for generating the slug.
     */


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
