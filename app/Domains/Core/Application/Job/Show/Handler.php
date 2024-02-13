<?php

namespace App\Domains\Core\Application\Job\Show;

use App\Domains\Core\Application\Job\Show\Command;
use App\Domains\Core\Contracts\JobRepository;
use Exception;

class Handler
{
    function __construct(private JobRepository $jobRepository)
    {
    }

    public function handle(Command $command)
    {
        $job = $this->jobRepository->getOne([
            'id' => $command->getId()
        ]);

        if (is_null($job)) {
            throw new Exception("job not found!", 404);
        }

        return $job;
    }
}
