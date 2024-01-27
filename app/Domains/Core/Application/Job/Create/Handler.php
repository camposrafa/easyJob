<?php

namespace App\Domains\Core\Application\Job\Create;

use App\Domains\Core\Application\Job\Create\Command;
use App\Domains\Core\Contracts\JobRepository;
use App\Domains\Core\Models\Job;

class Handler
{
    function __construct(private JobRepository $jobRepository){
    }

    public function handle(Command $command){
        return $this->jobRepository->save(
            (new Job())
            ->setTitle($command->getTitle())
            ->setDescription($command->getDescription())
        );
    }
}
