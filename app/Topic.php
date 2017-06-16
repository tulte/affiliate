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
        'name', 'intro', 'site_id', 'meta_description', 'meta_title', 'meta_image'
    ];


    public static function getListIdName() {
        $ret = [];
        $entries = self::all();
        foreach ($entries as $entry) {
            $ret[$entry->id] = $entry->name;
        }
        return $ret;
    }

    public function products()
    {
        return $this->hasMany('App\Product','topic_id');
    }

    public function infos()
    {
        return $this->hasMany('App\Info','topic_id');
    }

    public function articles()
    {
        return $this->hasMany('App\Article','topic_id');
    }

    public static function findByName($value)  {
        return self::where('name', (string)$value)->first();
    }


}
