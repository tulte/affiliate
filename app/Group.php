<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Group extends Model
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
    protected $table = 'group';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function feature()
    {
        return $this->hasOne('App\Feature','group_id');
    }


}