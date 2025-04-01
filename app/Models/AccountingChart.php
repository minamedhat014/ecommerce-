<?php

namespace App\Models;

use App\Enums\AccountType;
use Illuminate\Database\Eloquent\Model;

class AccountingChart extends Model
{
    
    protected $fillable = ['name', 'code', 'type'];
    protected $table=['accounting_charts'];
    
    protected $casts = [
        'type' => AccountType::class, 
    ];
}
