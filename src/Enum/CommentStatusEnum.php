<?php 
declare(strict_types=1);
namespace App\enum;

enum CommentStatusEnum: string  
{
    case PUBLISH='publish';
    case PENDING='pending';
    case REJECT='reject';
}
