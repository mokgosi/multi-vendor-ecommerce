<?php

namespace App\Enums;

enum ProductStatusEnum
{
    case ACTIVE;
    case INACTIVE;
    case PENDING;
    case DISCONTINUED;

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::PENDING => 'Pending',
            self::DISCONTINUED => 'Discontinued',
        };
    }
}
