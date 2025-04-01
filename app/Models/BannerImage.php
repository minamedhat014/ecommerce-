<?php

namespace App\Models;

use App\Traits\HasStatus;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BannerImage extends Model implements HasMedia
{
    use HasFactory;

    use HasFactory;
    use InteractsWithMedia;
    use HasStatus;





    protected $table = 'banner_images';
    protected $fillable = ['name','status','speed','created_by','updated_by'];



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($info) {
            // Update all other records' status to 2
            self::where('status', '!=', 'deactived')->update(['status' => 'deactived']);
        });
    }

    public function registerMediaCollections(): void
{
    $this
        ->addMediaCollection('banner images')
        ->registerMediaConversions(function (Media $media) {
            $this
                ->addMediaConversion('banner')
                ->width(768) // Set the desired width for the banner
                ->height(400); // Set the desired height for the banner
        });
}
}
