<?php

namespace App\Http\Controllers\BackEnd\Admin;

use Carbon\Carbon;
use App\Models\Team;
use App\Repositories\TeamRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class TeamController.
 */
class TeamController extends Controller
{
    protected $team;

    /**
     * @param TeamRepository $team
     */
    public function __construct(TeamRepository $team)
    {
        $this->team = $team;
    }

    /**
     *
     * @return view
     */
    public function index()
    {
        return view('backend.team.index');
    }

    public function teamData()
    {
        return Datatables::of($this->team->getForDataTable())
            ->addColumn('sn', function ($data) {
                static $i = 1;
                return $i++;
            })
            ->addColumn('logo_uri', function ($team) {
                return $team->logo_uris;
            })
            ->addColumn('name', function ($team) {
                return $team->name;
            })
            ->addColumn('club_state', function ($team) {
                return $team->club_state;
            })
            ->addColumn('action', function ($team) {
                return $team->action_buttons;
            })
             ->rawColumns(['logo_uri', 'action'])
            ->make(true);
    }

    /**
     *
     * @return view
     */
    public function create()
    {   
        return view('backend.team.create');
    }

    /**
     * @param \App\Http\Requests\StoreTeamRequest $request
     *
     * @return mixed
     */
    public function store(StoreTeamRequest $request)
    {
        $this->team->create($request->all());

        return redirect(route('teams.index'))->with(['success' => trans('Team Created Successfully.')]);
    }

    /**
     * @param \App\Models\Team
     */
    public function edit(Team $team)
    {   
        return view('backend.team.edit')
            ->with('team', $team);
    }

    /**
     * @param \App\Models\Team                               
     $team
     * @param \App\Http\Requests\UpdateTeamRequest $request
     *
     */
    public function update(Team $team, UpdateTeamRequest $request)
    {
        $this->team->update($team, $request->all());

        return redirect(route('teams.index'))->with(['success' => 'Team Updated Successfully.']);
    }

    /**
     * @param \App\Models\Team                              
     *$team
     *
     */
    public function destroy(Team $team)
    {
        $this->team->delete($team);
        echo json_encode(array('code' => 200));
    }
}
