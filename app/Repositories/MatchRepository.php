<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\Match;
use App\Models\Point;
use Carbon\Carbon;
use DB;

/**
 * Class MatchRepository.
 */
class MatchRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Match::class;

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                'id',
                'first_team_id',
                'second_team_id',
                'result',
                'winner_team_id',
                'scheduled_date'
            ])->get();
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        DB::transaction(function () use ($input) {
            
            $input['scheduled_date'] = Carbon::parse($input['scheduled_date'])->format('Y-m-d');
            if($input['result'] == '1'){
                if($input['winner_team_id'] == '1'){
                    $input['winner_team_id'] = $input['first_team_id'];
                    $input['looser_team_id'] = $input['second_team_id'];
                } else {
                    $input['winner_team_id'] = $input['second_team_id'];
                    $input['looser_team_id'] = $input['first_team_id'];
                }
            } else {
                $input['winner_team_id'] = NULL;
            }
            if ($match = Match::create($input)) {
                $this->calculatePoints($input,$match);
                return true;
            }
            throw new GeneralException('Some Error.');
        });
    }

    /**
     * @param \App\Models\Match $match
     * @param  $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * return bool
     */
    public function update(Match $match, array $input)
    {

        DB::transaction(function () use ($match, $input) {

            $input['scheduled_date'] = Carbon::parse($input['scheduled_date'])->format('Y-m-d');
            if($input['result'] == '1'){
                if($input['winner_team_id'] == '1'){
                    $input['winner_team_id'] = $input['first_team_id'];
                    $input['looser_team_id'] = $input['second_team_id'];
                } else {
                    $input['winner_team_id'] = $input['second_team_id'];
                    $input['looser_team_id'] = $input['first_team_id'];
                }
            } else {
                $input['winner_team_id'] = NULL;
            }

            if ($match->update($input)) {
                Point::where('match_id',$match->id)->delete();
                $this->calculatePoints($input,$match);
                return true;
            }

            throw new GeneralException('Some Error.');
        });
    }

    /**
     * @param \App\Models\Match $match
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function delete(Match $match)
    {
        DB::transaction(function () use ($match) {
            if ($match->delete()) {
                Point::where('match_id',$match->id)->delete();
                return true;
            }

            throw new GeneralException('Some Error.');
        });
    }

    /**
     * @param \App\Models\Match $match
     * @param $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function calculatePoints($input,$match)
    {
        if($input['result'] == '1'){
            $teamoneArr['match_id'] = $match->id;
            $teamoneArr['team_id'] = $input['winner_team_id'];
            $teamoneArr['points'] = '2'; 
            Point::create($teamoneArr);

            $teamtwoArr['match_id'] = $match->id;
            $teamtwoArr['team_id'] = $input['looser_team_id'];
            $teamtwoArr['points'] = '0'; 
            Point::create($teamtwoArr);
        } else {
            $teamoneArr['match_id'] = $match->id;
            $teamoneArr['team_id'] = $input['first_team_id'];
            $teamoneArr['points'] = '1'; 
            Point::create($teamoneArr);

            $teamtwoArr['match_id'] = $match->id;
            $teamtwoArr['team_id'] = $input['second_team_id'];
            $teamtwoArr['points'] = '1'; 
            Point::create($teamtwoArr);
        }
        return true;
    }
}
