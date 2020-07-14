<?php

namespace App\Http\Controllers\BackEnd\Admin;

use Carbon\Carbon;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TeamRepository;
use App\Exceptions\GeneralException;
use App\Repositories\PlayerRepository;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class PlayerController.
 */
class PlayerController extends Controller
{
    protected $player;
    protected $team;

    /**
     * @param PlayerRepository $player
     */
    public function __construct(PlayerRepository $player)
    {
        $this->player       = $player;
        $this->team  = new TeamRepository();
    }

    /**
     *
     * @return view
     */
    public function index(Request $request)
    {
        $data['team_data'] = $this->team->find($request->team_id);
        return view('backend.player.index')->with($data);
    }

    public function playerData(Request $request)
    {
        return Datatables::of($this->player->getForDataTable($request->all()))
            ->addColumn('sn', function ($data) {
                static $i = 1;
                return $i++;
            })
            ->addColumn('image_uri', function ($player) {
                return $player->image_uris;
            })
            ->addColumn('name', function ($player) {
                return $player->firstname.' '.$player->lastname;
            })
            ->addColumn('action', function ($player) {
                return $player->action_buttons;
            })
             ->rawColumns(['image_uri', 'action'])
            ->make(true);
    }

    /**
     *
     * @return view
     */
    public function create(Request $request)
    {   
        if($request->team_id){
            $data['team_data'] = $this->team->find($request->team_id);
            return view('backend.player.create')->with($data);
        }

        throw new GeneralException('Some Error.');
    }

    /**
     * @param \App\Http\Requests\StorePlayerRequest $request
     *
     * @return mixed
     */
    public function store(StorePlayerRequest $request)
    {
        $this->player->create($request->all());

        return redirect(route('players.index',['team_id' => $request->team_id]))->with(['success' => trans('Player Created Successfully.')]);
    }

    /**
     * @param \App\Models\Player
     */
    public function edit(Player $player)
    {   
        $data['team_data'] = $this->team->find($player->team_id);
        $data['player'] = $player;
        return view('backend.player.edit')
            ->with($data);
    }

    /**
     * @param \App\Models\Player                               
     $player
     * @param \App\Http\Requests\UpdatePlayerRequest $request
     *
     */
    public function update(Player $player, UpdatePlayerRequest $request)
    {
        $this->player->update($player, $request->all());

        return redirect(route('players.index',['team_id' => $player->team_id]))->with(['success' => 'Player Updated Successfully.']);
    }

    /**
     * @param \App\Models\Player                              
     *$player
     *
     */
    public function destroy(Player $player)
    {
        $this->player->delete($player);
        echo json_encode(array('code' => 200));
    }
}
