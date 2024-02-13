<?php

namespace App\Domains\Core\Application\Search;

class Command
{

    /**
     * @param array $filter
     * @param array $sort
     * @param null|integer $page
     * @param null|integer $perPage
     */
    function __construct(
        private array $filter = [],
        private $sort = [],
        private ?int $page,
        private ?int $perPage
    ) {
    }

    /**
     * @return array
     */
    public function getFilter(): array
    {
        return $this->filter;
    }

    /**
     * @param array $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->filter = $filter;
        return $this;
    }

    /**
     * @return string|array
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param array|string $sort
     * @return self
     */
    public function setSort($sort): self
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return integer
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return self
     */
    public function setPage(?int $page): self
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return integer
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     * @return self
     */
    public function setPerPage(?int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }
}
