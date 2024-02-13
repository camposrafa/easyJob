<?php

namespace App\Domains\Core\Application\Job\Show;

class Command
{

    function __construct(
        private int $id
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
}
