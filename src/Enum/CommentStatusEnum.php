<?php 
namespace App\enum;

enum CommentStatusEnum: string  
{
    case PUBLISH='publish';
    case PENDING='pending';
    case REJECT='reject';
}
