<?php

namespace App\Http\Controllers\BackEnd\Admin;

use Carbon\Carbon;
use App\Models\Point;
use App\Http\Controllers\Controller;
use App\Repositories\PointRepository;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class PointRepository.
 */
class PointsController extends Controller
{
    protected $point;

    /**
     * @param PointRepository $point
     */
    public function __construct(PointRepository $point)
    {
        $this->point = $point;
    }

    /**
     *
     * @return view
     */
    public function index()
    {
        return view('backend.point.index');
    }

    public function pointsData()
    {
        return Datatables::of($this->point->getForDataTable())
            ->addColumn('sn', function ($data) {
                static $i = 1;
                return $i++;
            })
            ->addColumn('team_id', function ($point) {
                return isset($point->getTeamName->name) ? $point->getTeamName->name : 'N.A';
            })
            ->addColumn('points', function ($point) {
                return $point->tot_p;
            })
            ->addColumn('total_match', function ($point) {
                $total_match = $point->tot_m;
                return $total_match;
            })
            ->make(true);
    }
}
