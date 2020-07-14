<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
//use App\Models\TeamAttributeTrait;
use App\Models\ModelTrait;

class Point extends Model
{
    use ModelTrait;

    protected $table;

    //protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'match_id', 'team_id', 'points',
    ];

    public function getTeamName(){
        return $this->belongsTo('App\Models\Team','team_id','id');
    }

}
