<?php

namespace App\Http\Controllers\BackEnd\Admin;

use Carbon\Carbon;
use App\Models\Match;
use App\Http\Controllers\Controller;
use App\Repositories\TeamRepository;
use App\Repositories\MatchRepository;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class MatchController.
 */
class MatchController extends Controller
{
    protected $match;
    protected $team;

    /**
     * @param MatchRepository $match
     */
    public function __construct(MatchRepository $match)
    {
        $this->match = $match;
        $this->team  = new TeamRepository();
    }

    /**
     *
     * @return view
     */
    public function index()
    {
        return view('backend.match.index');
    }

    public function matchData()
    {
        return Datatables::of($this->match->getForDataTable())
            ->addColumn('sn', function ($data) {
                static $i = 1;
                return $i++;
            })
            ->addColumn('first_team_id', function ($match) {
                return isset($match->getFirstTeamName->name) ? $match->getFirstTeamName->name : 'N.A';
            })
            ->addColumn('second_team_id', function ($match) {
                return isset($match->getSecondTeamName->name) ? $match->getSecondTeamName->name : 'N.A';
            })
            ->addColumn('result', function ($match) {
                $result = $match->result == '0' ? 'Draw' : 'Winner';
                return $result;
            })
            ->addColumn('winner_team_id', function ($match) {
                return isset($match->getWinnerTeamName->name) ? $match->getWinnerTeamName->name : 'N.A';
            })
            ->addColumn('scheduled_date', function ($match) {
                return Carbon::parse($match->scheduled_date)->toDateString();
            })
            ->addColumn('action', function ($match) {
                return $match->action_buttons;
            })
             ->rawColumns(['result', 'action'])
            ->make(true);
    }

    /**
     *
     * @return view
     */
    public function create()
    {   
        $data['team_data'] = $this->team->getAll();
        return view('backend.match.create')->with($data);
    }

    /**
     * @param \App\Http\Requests\StoreMatchRequest $request
     *
     * @return mixed
     */
    public function store(StoreMatchRequest $request)
    {
        $this->match->create($request->all());

        return redirect(route('matches.index'))->with(['success' => trans('Match Created Successfully.')]);
    }

    /**
     * @param \App\Models\Match
     */
    public function edit(Match $match)
    {   
        $data['team_data'] = $this->team->getAll();
        $data['match'] = $match;
        return view('backend.match.edit')
            ->with($data);
    }

    /**
     * @param \App\Models\Match                               
     $match
     * @param \App\Http\Requests\UpdateMatchRequest $request
     *
     */
    public function update(Match $match, UpdateMatchRequest $request)
    {
        $this->match->update($match, $request->all());

        return redirect(route('matches.index'))->with(['success' => 'Match Updated Successfully.']);
    }

    /**
     * @param \App\Models\Match                              
     *$match
     *
     */
    public function destroy(Match $match)
    {
        $this->match->delete($match);
        echo json_encode(array('code' => 200));
    }
}
