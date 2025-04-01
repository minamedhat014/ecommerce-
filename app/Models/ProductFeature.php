<?php

namespace App\Models;

use App\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    use HasTranslation;
    public $translatable = ['name'];
    protected $fillable = ['product_id', 'name_ar', 'name_en'];
    protected $table = 'product_features';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
}
