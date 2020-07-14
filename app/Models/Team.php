<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeamAttributeTrait;
use App\Models\ModelTrait;

class Team extends Model
{
    use ModelTrait,TeamAttributeTrait,SoftDeletes;

    protected $table;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'logo_uri', 'club_state',
    ];

}
