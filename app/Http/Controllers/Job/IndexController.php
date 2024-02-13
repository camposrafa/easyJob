<?php

namespace App\Http\Controllers\Job;

use App\Domains\Core\Application\Job\Index\Handler;
use App\Domains\Core\Application\Search\Command as SearchCommand;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IndexController extends Controller
{
    public function __construct(private Handler $handler)
    {
    }

    public function index(Request $request)
    {
        $filter = $request->get('filter') ?? [];

        $indexResult = $this->handler->handle(new SearchCommand(
            Arr::only(
                $filter,
                [
                    'id', 'keyword', 'status'
                ]
            ),
            $request->get('sort'),
            $request->get('page', 1),
            $request->get('per_page', 10),
        ));

        return new JobCollection(
            $indexResult->getData(),
            $indexResult->getSummary(),
        );
    }
}
