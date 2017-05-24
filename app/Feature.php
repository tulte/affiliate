<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Feature extends Model
{

    /**
     * Disable Timestamps
     *
     */
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feature';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value', 'group_id'
    ];



}
