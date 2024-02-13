<?php

namespace App\Domains\Core\Infra\Eloquent\Filter;

use EloquentFilter\ModelFilter;

class AbstractFilter extends ModelFilter
{

    /**
     * @var array
     */
    protected $allowedFilters = [];


    /** @inheritDoc */
    protected $keywordFields = [];

    /**
     * @var array
     */
    protected $columnMap = [];

    /**
     * @return void
     */
    public function filterInput()
    {
        foreach ($this->input as $key => $val) {

            if (is_string($val) && str_contains($val, ',')) {
                $val = explode(',', $val);
            }

            $method = $this->getFilterMethod($key);

            if ($this->methodIsCallable($method)) {
                $this->{$method}($val);
            } else {
                if (in_array($method, $this->allowedFilters)) {
                    $column = $this->resolveColumn($method) ?? sprintf('%s.%s', $this->query->getModel()->getTable(), $key);
                    if (is_array($val)) {
                        $this->whereIn($column, $val);
                    } else {
                        $this->where($column, $val);
                    }
                }
            }
        }
    }

    /**
     * @param string $method
     * @return string|null
     */
    private function resolveColumn(string $method): ?string
    {
        if (!isset($this->columnMap[$method])) {
            return null;
        }
        return $this->columnMap[$method];
    }

    /**
     * @param string $value
     * @return void
     */
    public function keyword($value)
    {
        if (empty($this->keywordFields)) {
            return;
        }

        $this->query->where(function ($query) use ($value) {
            foreach ($this->keywordFields as $field) {
                $query->orWhere($field, "LIKE", "%{$value}%");
            }
        });
    }

    public function setup()
    {
        $this->onlyShowNotDeletedComponents();
    }

    public function onlyShowNotDeletedComponents()
    {
        $this->query->withoutTrashed();
    }
}
