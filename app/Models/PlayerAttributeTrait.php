<?php

namespace App\Models;

/**
 * Class PlayerAttributeTrait.
 */
trait PlayerAttributeTrait
{
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                    '.$this->getEditButtonAttribute('players.edit').'
                    '.$this->getDeleteButtonAttribute('players.destroy').'
                </div>';
    }

    public function getImageUrisAttribute()
    {
        return '<img src="'.asset($this->image_uri).'" alt="" border="0" width="50" class="img-rounded" align="center">';
    }

}
