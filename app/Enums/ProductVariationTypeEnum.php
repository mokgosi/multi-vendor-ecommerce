<?php

namespace App\Enums;

enum ProductVariationTypeEnum: string
{
    //
    case COLOR = 'color';
    case SIZE = 'size';

    public function label(): string
    {
        return match ($this) {
            self::COLOR => __('Color'),
            self::SIZE => __('Size'),
        };
    }

    public static function labels(): array
    {
        return array_map(
            fn (self $type) => $type->label(),
            self::cases()
        );
    }

}
