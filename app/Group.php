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
        'name', 'icon',
    ];

    public function products() {
        return $this->belongsToMany('App\Product','feature', 'group_id', 'product_id')->withPivot('value');
    }

    public static function findGroupByTopicIdAndGroupId($topicid, $groupid) {
        return \DB::table('group')
                ->join('feature', 'group.id', '=', 'feature.group_id')
                ->join('product', 'feature.product_id', '=', 'product_id')
                ->where([['product.topic_id', '=', $topicid], ['group.id', '=', $groupid]])
                ->get();
    }

   public static function getListIdName() {
        $ret = [];
        $entries = self::all();
        foreach ($entries as $entry) {
            $ret[$entry->id] = $entry->name;
        }
        return $ret;
    }


}
