<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace App\Enum;

enum UserAccountStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case BLOCKED = 'blocked';
    CASE BANNED = 'banned';
=======
<?php 
namespace App\Enum;

enum UserAccountStatusEnum: string  
{
    case ACTIVE='active';
    case PENDING='pending';
    case BLOCKED='blocked';
    case BANNED='banned';
    case DELETED='deleted';
    case INACTIVE='inactive';

>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
}
