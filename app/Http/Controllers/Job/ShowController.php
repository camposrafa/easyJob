<?php

namespace App\Http\Controllers\Job;

use App\Domains\Core\Application\Job\Show\Command;
use App\Domains\Core\Application\Job\Show\Handler;
use App\Http\Controllers\Controller;
use App\Http\Resources\Job;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __construct(private Handler $handler)
    {
    }

    public function show(int $id, Request $request)
    {
        return new Job(
            $this->handler->handle(
                new Command($id)
            )
        );
    }
}
