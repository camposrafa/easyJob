<?php

namespace App\Domains\Core\Application\Search;

use Illuminate\Pagination\AbstractPaginator;

/**
 * @property AbstractPaginator $data
 * @property array $summary
 */
class Result
{

    /**
     * @param AbstractPaginator $data
     * @param array|null $summary
     */
    function __construct(
        private AbstractPaginator $data,
        private ?array $summary,
    ) {
    }

    /**
     * @return AbstractPaginator
     */
    public function getData(): AbstractPaginator
    {
        return $this->data;
    }

    /**
     * @param AbstractPaginator $data
     * @return self
     */
    public function setData(AbstractPaginator $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getSummary(): ?array
    {
        return $this->summary;
    }

    /**
     * @param array $summary
     * @return self
     */
    public function setSummary(array $summary): self
    {
        $this->summary = $summary;
        return $this;
    }
}
