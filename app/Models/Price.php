<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Price extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table='prices';
    protected $fillable =['price','created_by','updated_by'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }

    public function pricable()
    {
        return $this->morphTo();
    }

    public function discounts()
    {
        return $this->morphMany(Discount::class, 'discountable');
    }
}
