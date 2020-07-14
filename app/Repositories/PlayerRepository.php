<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Player;
use App\Repositories\BaseRepository;
use DB;

/**
 * Class PlayerRepository.
 */
class PlayerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Player::class;

    /**
     * @return mixed
     */
    public function getForDataTable(array $input)
    {
        return $this->query()
            ->select([
                'id',
                'firstname',
                'lastname',
                'image_uri',
            ])->where('team_id',$input['team_id'])->get();
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
        
        if (isset($input['image_uri'])) {
            $imageName = time() . '.' . $input['image_uri']->extension();
            $input['image_uri']->move(public_path('images/player'), $imageName);
        }
        
        $input['image_uri'] = 'images/player/'.$imageName;

        if (Player::create($input)) {
            return true;
        }

        throw new GeneralException('Some Error.');
    }

    /**
     * @param \App\Models\Player $player
     * @param  $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * return bool
     */
    public function update(Player $player, array $input)
    {
        if (isset($input['image_uri'])) {

            /*For Unlink The Images*/
            unlink(public_path($player->image_uri));

            $imageName = time() . '.' . $input['image_uri']->extension();
            $input['image_uri']->move(public_path('images/player'), $imageName);
            $input['image_uri'] = 'images/player/'.$imageName;
        }

        if ($player->update($input)) {
            return true;
        }

        throw new GeneralException('Some Error.');
    }

    /**
     * @param \App\Models\Player $player
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function delete(Player $player)
    {
        if ($player->delete()) {
            return true;
        }

        throw new GeneralException('Some Error.');

    }

    /**
     * @param \App\Models\Player $player
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function getTeamInfo(array $input)
    {
        return $this->query()->find()->get();
    }
}
