<?php

namespace App\Enums;

enum stockTransactions: string
{
    case IN = 'in';
    case OUT = 'out';
  
    public function label(): string
    {
        return match ($this) {
            self::IN => 'in',
            self::OUT => 'out',
        };
    }
}
