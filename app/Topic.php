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
        'name', 'intro',
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

    public static function findByName($value)  {
        return self::where('name', (string)$value)->first();
    }


}
