<?php

namespace App\Domains\Core\Application\Job\Index;

use App\Domains\Core\Application\Search\Command;
use App\Domains\Core\Application\Search\Result;
use App\Domains\Core\Contracts\JobRepository;

class Handler
{
    function __construct(private JobRepository $jobRepository)
    {
    }

    public function handle(Command $command)
    {
        $data = $this->jobRepository->index(
            $command->getFilter(),
            $command->getSort(),
            $command->getPage(),
            $command->getPerPage()
        );

        $summary = $this->jobRepository
            ->summary($command->getFilter());

        return new Result($data, $summary);
    }
}
