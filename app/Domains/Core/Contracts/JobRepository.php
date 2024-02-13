<?php

namespace App\Domains\Core\Contracts;

use App\Domains\Core\Models\Job;
use Illuminate\Pagination\AbstractPaginator;

interface JobRepository
{

    /**
     * @param Job $Job
     * @return Job
     */
    public function save(Job $Job): Job;

    /**
     * @param array $filter
     * @param array|string $sort
     * @param int $page
     * @param int $perPage
     * @return AbstractPaginator
     */

    public function index(array $filter, $sort, int $page = 1, int $perPage = 10): AbstractPaginator;

    /**
     *
     * @param array $filter
     * @return Job|null
     */
    public function getOne(array $filter): ?Job;

    /**
     *
     * @param Job $Job
     * @return boolean
     */
    public function destroy(Job $Job): bool;

    /**
     *
     * @param array $filter
     * @return array
     */
    public function summary(array $filter): array;
}
