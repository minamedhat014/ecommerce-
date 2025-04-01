<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table='stocks';
    protected $fillable = [
        'product_id',
        'supplier_id',
        'created_by','updated_by'
    ];



    public function product(){
        return $this->belongsTo(product::class,'product_id');
    }

    public function transactions() {
        return $this->hasMany(StockTransaction::class , 'stock_id');
    }

    public function balance() {
        return $this->hasOne(StockBalance::class,'stock_id');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    
    public function scopeBackFilter($query,$search,$sort,$page)
    {
        return $query->with(['balance', 'transactions','supplier','transactions.price', 'product',
        ]) 
        ->when($search, function ($query) use ($search) {
            return $query->whereRelation('product', 'sku', 'like', '%' . $search . '%');
        })
        ->orderBy('id', $sort)
        ->paginate($page);
    }

}
