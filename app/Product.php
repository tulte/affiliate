<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'link', 'image', 'identifier'
    ];

    public function topic() {
        return $this->belongsTo('App\Topic','topic_id');
    }

    public function groups() {
        return $this->belongsToMany('App\Group','feature', 'product_id', 'group_id')->withPivot('value');
    }

}
