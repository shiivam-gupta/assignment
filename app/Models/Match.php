<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\MatchAttributeTrait;
use App\Models\ModelTrait;

class Match extends Model
{
    use ModelTrait,MatchAttributeTrait,SoftDeletes;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_team_id', 'second_team_id', 'result', 'winner_team_id', 'scheduled_date'
    ];

    public function getFirstTeamName(){
        return $this->belongsTo('App\Models\Team','first_team_id');
    }

    public function getSecondTeamName(){
        return $this->belongsTo('App\Models\Team','second_team_id');
    }

    public function getWinnerTeamName(){
        return $this->belongsTo('App\Models\Team','winner_team_id');
    }

}
