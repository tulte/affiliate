<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Attribute extends Model
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
    protected $table = 'attribute';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'product_id'
    ];
}
