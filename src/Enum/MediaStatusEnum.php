<?php 
declare(strict_types=1);
namespace App\Enum;

enum MediaStatusEnum: string  
{
    case ACTIVE='active';
    case PENDING='pending';
    case ARCHIVE='archive';
    case DELETED='deleted';
}
