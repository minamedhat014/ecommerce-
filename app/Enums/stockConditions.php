<?php

namespace App\Enums;

enum stockConditions : string
{
     
    case GOOD = 'good';
    case DAMAGED = 'damaged';
    case RETURNED = 'returned';
    case RESERVED = 'reserved';

    // Optional: Define condition labels
    public function label(): string {
        return match($this) {
            self::GOOD => 'good Stock',
            self::DAMAGED => 'Damaged Stock',
            self::RETURNED => 'Returned Stock',
            self::RESERVED => 'Reserved for Orders',
        };
    }

    // Optional: Define if stock is sellable
    public function isSellable(): bool {
        return match($this) {
            self::GOOD, self::RESERVED => true,
            self::DAMAGED, self::RETURNED => false,
        };
    }

}
