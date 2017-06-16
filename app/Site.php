<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Site extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'site';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'intro', 'meta_description', 'meta_title', 'meta_image', 'background'
    ];


    public static function getListIdUrl() {
        $ret = [];
        $entries = self::all();
        foreach ($entries as $entry) {
            $ret[$entry->id] = $entry->url;
        }
        return $ret;
    }

    public static function findByUrl($value)  {
        return self::where('url', (string)$value)->first();
    }

    public function topics() {
        return $this->hasMany('App\Topic','site_id');
    }

}
