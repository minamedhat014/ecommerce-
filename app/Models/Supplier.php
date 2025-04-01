<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    use HasStatus;
   
    protected $table = 'suppliers';
    protected $fillable = ['name','email','phone','address','bank_account','created_by','updated_by'];


    
    
}
