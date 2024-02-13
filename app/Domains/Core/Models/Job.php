<?php

namespace App\Domains\Core\Models;

use App\Domains\Core\Enum\Job\Status;
use App\Domains\Core\Infra\Eloquent\Helper\Sortable;
use Carbon\Carbon;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes, Filterable, Sortable;

        /**
     * @var array
     */
    protected $casts = [
        'status' => Status::class
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getSiengeDescription(): ?string
    {
        return $this->getDescription();
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

        /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updated_at;
    }

    public function getDeletedAt(): ?Carbon
    {
        return $this->deleted_at;
    }
}
