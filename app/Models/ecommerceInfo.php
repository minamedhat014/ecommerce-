<?php

namespace App\Models;

use App\Traits\HasStatus;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ecommerceInfo extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasStatus;





    protected $table = 'ecommerce_infos';
    protected $fillable = ['name','discriptions','key_words','phone','status','email','address','created_by','updated_by'];



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
            ->addMediaCollection('site info')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(150)
                    ->height(150);
            });
    
    } 
}
