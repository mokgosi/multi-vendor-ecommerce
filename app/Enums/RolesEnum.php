<?php

namespace App\Enums;

enum RolesEnum: string
{
    case Admin = 'Admin';
    case User = 'User';
    case Vendor = 'Vendor';
    case Customer = 'Customer';

    public function label(): string
    {
        return match ($this) {
            self::Admin => __('Admin'),
            self::Vendor => __('Vendor'),
            self::Customer => __('Customer'),
            self::User => __('User'),
        };
    }

}
