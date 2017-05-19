<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Topic extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'topic';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


}
