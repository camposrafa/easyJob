<?php

namespace App\Domains\Core\Application\Job\Update;

use App\Domains\Core\Application\Job\Update\Command;
use App\Domains\Core\Contracts\JobRepository;
use Exception;

class Handler
{
    function __construct(private JobRepository $jobRepository){
    }

    public function handle(Command $command){

        $job  = $this->jobRepository->getOne([
            'id' => $command->getId()
        ]);

        if(is_null($job)){
            throw new Exception('Job not found', 404);
        }

        return $this->jobRepository->save(
            $job
            ->setTitle($command->getTitle())
            ->setDescription($command->getDescription())
            ->setStatus($command->getStatus())
        );
    }
}
