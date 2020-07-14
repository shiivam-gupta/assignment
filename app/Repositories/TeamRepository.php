<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Team;
use App\Repositories\BaseRepository;
use DB;

/**
 * Class TeamRepository.
 */
class TeamRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Team::class;

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                'id',
                'name',
                'logo_uri',
                'club_state'
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
        $imageName = '';
        if (isset($input['logo_uri'])) {
            $imageName = time() . '.' . $input['logo_uri']->extension();
            $input['logo_uri']->move(public_path('images/team'), $imageName);
        }
        
        $input['logo_uri'] = 'images/team/'.$imageName;

        if (Team::create($input)) {
            return true;
        }

        throw new GeneralException('Some Error.');

    }

    /**
     * @param \App\Models\Team $team
     * @param  $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * return bool
     */
    public function update(Team $team, array $input)
    {
        if (isset($input['logo_uri'])) {

            /*For Unlink The Images*/
            unlink(public_path($team->logo_uri));

            $imageName = time() . '.' . $input['logo_uri']->extension();
            $input['logo_uri']->move(public_path('images/team'), $imageName);
            $input['logo_uri'] = 'images/team/'.$imageName;
        }

        if ($team->update($input)) {
            return true;
        }

        throw new GeneralException('Some Error.');
    }

    /**
     * @param \App\Models\Team $team
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function delete(Team $team)
    {
        if ($team->delete()) {
            return true;
        }

        throw new GeneralException('Some Error.');
    }
}
