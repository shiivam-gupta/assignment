<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlayerAttributeTrait;
use App\Models\ModelTrait;

class Player extends Model
{
    use ModelTrait,PlayerAttributeTrait,SoftDeletes;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'firstname', 'lastname', 'image_uri', 'jersey_number', 'country', 'matches', 'runs',
        'highest_score', 'total_fifties', 'total_hundreds'
    ];


}
