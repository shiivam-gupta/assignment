<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\Point;
use Carbon\Carbon;
use DB;

/**
 * Class PointRepository.
 */
class PointRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Point::class;

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()->selectRaw('team_id,count(team_id) as tot_m,sum(points) as tot_p')
            ->groupBy('team_id')
            ->get();
    }

}
