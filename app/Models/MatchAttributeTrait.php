<?php

namespace App\Models;

/**
 * Class MatchAttributeTrait.
 */
trait MatchAttributeTrait
{
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                    '.$this->getEditButtonAttribute('matches.edit').'
                    '.$this->getDeleteButtonAttribute('matches.destroy').'
                </div>';
    }

}
