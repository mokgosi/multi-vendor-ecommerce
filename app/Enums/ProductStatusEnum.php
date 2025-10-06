<?php

namespace App\Enums;

enum ProductStatusEnum: string
{
    case ACTIVE = 'Active';
    case INACTIVE = 'Inactive';
    case DRAFT = 'Draft';
    case DISCONTINUED = 'Discontinued';
}
