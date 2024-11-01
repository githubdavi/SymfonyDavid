<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace App\Enum;

enum CommentStatusEnum: string
{
    case PENDING = 'pending';
    case VALIDATED = 'validated';
    case REJECTED = 'rejected';
=======
<?php 
namespace App\enum;

enum CommentStatusEnum: string  
{
    case PUBLISH='publish';
    case PENDING='pending';
    case REJECT='reject';
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
}
