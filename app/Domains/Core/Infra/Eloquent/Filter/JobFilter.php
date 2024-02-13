<?php

namespace App\Domains\Core\Infra\Eloquent\Filter;

class JobFilter extends AbstractFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /** @inheritDoc */
    protected $allowedFilters = [
        "id", "status", "keyword"
    ];

    /** @inheritDoc */
    protected $keywordFields = [
        "title", "description"
    ];
}
