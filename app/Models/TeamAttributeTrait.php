<?php

namespace App\Models;

/**
 * Class TeamAttributeTrait.
 */
trait TeamAttributeTrait
{
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                    '.$this->getEditButtonAttribute('teams.edit').'
                    '.$this->getDeleteButtonAttribute('teams.destroy').'
                    <a href="'.route('players.index', ['team_id' => $this->id]).'" class="btn btn-flat btn-default">
                    <i data-toggle="tooltip" data-placement="top" title="View Players" class="fa fa-eye"></i>
                    </a>
                </div>';
    }

    public function getLogoUrisAttribute()
    {
        return '<img src="'.asset($this->logo_uri).'" alt="" border="0" width="50" class="img-rounded" align="center">';
    }

}
