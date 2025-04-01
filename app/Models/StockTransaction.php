<?php

namespace App\Models;

use App\Enums\stockConditions;
use App\Enums\stockTransactions;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StockTransaction extends Model
{
    
    use LogsActivity;

public function getActivitylogOptions(): LogOptions
{
    return LogOptions::defaults()
    ->logOnly(['*']);
    // Chain fluent methods for configuration options
}


    protected $table='stock_transactions';

    protected $fillable = [ 'stock_id','product_id','type',
    'condition',
    'quantity','created_by','updated_by'];

    protected $casts = [
        'type' => stockTransactions::class,
        'condition' => stockConditions::class
    ];

    public function stock() {
        return $this->belongsTo(Stock::class,'stock_id');
    }
    public function price()
    {
        return $this->morphOne(price::class, 'pricable');
    }
    
}
