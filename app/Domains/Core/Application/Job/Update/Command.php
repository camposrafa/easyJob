<?php

namespace App\Domains\Core\Application\Job\Update;

use App\Domains\Core\Enum\Job\Status;

class Command {

    function __construct(
        private int $id,
        private string $title,
        private string $description,
        private Status $status
    ){
    }

    public function getId():int
    {
        return $this->id;
    }

    public function setId(int $id):self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle():string
    {
        return $this->title;
    }

    public function setTitle(string $title):self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description):self
    {
        $this->description = $description;
        return $this;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status):self
    {
        $this->status = $status;
        return $this;
    }
}
