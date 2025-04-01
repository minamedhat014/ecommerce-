<?php

namespace App\Models;

use App\Enums\stockConditions;
use Illuminate\Database\Eloquent\Model;

class StockBalance extends Model
{
    protected $table='stock_balances';
    protected $fillable=['product_id','stock_id','current_stock','created_at',
    'condition'
    ,'updated_at'];


    public function stock() {
        return $this->belongsTo(Stock::class,'stock_id');
    }

    protected $casts = [
        'condition' => stockConditions::class
    ];

    
}
