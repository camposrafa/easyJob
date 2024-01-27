<?php

namespace App\Domains\Core\Enum\Job;

enum Status: string
{
    case active = 'active';
    case closed = 'closed';
}
