<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'article';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'header', 'text', 'topic_id'
    ];

    public function topic() {
        return $this->belongsTo('App\Topic','topic_id');
    }


}
