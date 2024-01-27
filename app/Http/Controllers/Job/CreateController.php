<?php

namespace App\Http\Controllers\Job;

use App\Domains\Core\Application\Job\Create\Command;
use App\Domains\Core\Application\Job\Create\Handler;
use App\Http\Controllers\Controller;
use App\Http\Resources\Job;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __construct(private Handler $handler)
    {
    }

    public function store(Request $request)
    {

        $JobCommand = new Command(
            $request->input('title', null),
            $request->input('description', 0),
        );

        return new Job($this->handler->handle($JobCommand));
    }
}
