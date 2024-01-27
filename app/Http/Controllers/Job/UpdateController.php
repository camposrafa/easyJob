<?php

namespace App\Http\Controllers\Job;

use App\Domains\Core\Application\Job\Update\Command;
use App\Domains\Core\Application\Job\Update\Handler;
use App\Domains\Core\Enum\Job\Status;
use App\Http\Controllers\Controller;
use App\Http\Resources\Job;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct(private Handler $handler)
    {
    }

    public function update(int $id, Request $request)
    {

        $JobCommand = new Command(
            $id,
            $request->input('title', null),
            $request->input('description', 0),
            Status::from($request->input('status'))
        );

        return new Job($this->handler->handle($JobCommand));
    }
}
