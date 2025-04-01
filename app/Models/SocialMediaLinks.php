<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaLinks extends Model
{
    use HasFactory;
    use HasStatus;

    protected $table ="social_media_links";
    protected $fillable =[
        'name','link','icon','status',
    ];
}
