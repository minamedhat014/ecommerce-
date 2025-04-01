<?php

namespace App\Models;

use App\Traits\HasStatus;
use Spatie\Sluggable\HasSlug;
use App\Traits\HasTranslation;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageLink extends Model
{
    use HasFactory;
    use HasStatus;
    use HasSlug;
    use HasTranslation;

    protected $table ="page_links";
    protected $fillable = ['title_en','parent_id','type_id','title_ar','status','created_by','updated_by'];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_en')
            ->saveSlugsTo('slug')
            ->preventOverwrite()
            ->usingSeparator('_');
    }


    // Get the translated title
   

 
    public function type(): BelongsTo
    {
        return $this->belongsTo(PageType::class,'type_id');
    }

    public function parent()
    {
        return $this->belongsTo(PageLink::class, 'parent_id');
    }

    /**
     * Define the children relationship.
     */
    public function children()
    {
        return $this->hasMany(PageLink::class, 'parent_id');
    }
}
