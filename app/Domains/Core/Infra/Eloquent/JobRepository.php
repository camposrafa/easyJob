<?php

namespace App\Domains\Core\Infra\Eloquent;

use App\Domains\Core\Models\Job;
use App\Domains\Core\Contracts\JobRepository as JobRepositoryContract;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\DB;

class JobRepository implements JobRepositoryContract
{

    /** @inheritDoc */
    public function save(Job $job): Job
    {
        $job->save();
        $job->refresh();
        return $job;
    }

    /** @inheritDoc */
    public function index(array $filter, $sort, int $page = 1, int $perPage = 10): AbstractPaginator
    {
        return Job::filter($filter)
            ->sort($sort)
            ->paginate($perPage, ['*'], 'page', $page);
    }

    /** @inheritDoc */
    public function getOne(array $filter): ?Job
    {
        return Job::filter($filter)->first();
    }

    /** @inheritDoc */
    public function destroy(Job $job): bool
    {
        return $job->delete();
    }

    /** @inheritDoc */
    public function summary(array $filter): array
    {
        $query = Job::filter($filter)->withoutTrashed()->getQuery();

        $queryTotals = clone $query;
        $summary['totals'] = (array)$queryTotals->select([
            DB::raw("count(*) as total_jobs")
        ])->first();

        return $summary;
    }
}
