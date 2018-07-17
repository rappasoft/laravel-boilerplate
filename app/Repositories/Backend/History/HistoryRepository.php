<?php

namespace App\Repositories\Backend\History;

use OwenIt\Auditing\Models\Audit;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class HistoryRepository.
 */
class HistoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Audit::class;
    }

    /**
     * @return array
     */
    public function getHistoryTypes() : array
    {
        return Audit::groupBy('auditable_type')
            ->whereNotNull('user_type')
            ->pluck('auditable_type')
            ->toArray();
    }

    /**
     * @param     $category
     * @param int $limit
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCategory($category, $limit = 50) : LengthAwarePaginator
    {
        return Audit::with('user')
            ->where('auditable_type', $category)
            ->latest()
            ->paginate($limit);
    }
}
