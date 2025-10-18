<?php

namespace App\Enums;

enum ProductStatusEnum: string
{
    case Available = 'available';
    case OutOfStock = 'out_of_stock';
    case Discontinued = 'discontinued';
    case ComingSoon = 'coming_soon';

    public function label(): string
    {
        return match ($this) {
            self::Available => __('Available'),
            self::OutOfStock => __('Out of Stock'),
            self::Discontinued => __('Discontinued'),
            self::ComingSoon => __('Coming Soon'),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Available => 'green',
            self::OutOfStock => 'orange',
            self::Discontinued => 'red',
            self::ComingSoon => 'blue',
        };
    }

    public static function allStatuses(): array
    {
        return array_map(fn($status) => $status->value, self::cases());
    }

    public static function labels(): array
    {
        return array_map(fn($status) => $status->label(), self::cases());
    }

    public static function colors(): array
    {
        return array_map(fn($status) => $status->color(), self::cases());
    }

}
