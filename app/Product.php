<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function findLastProductsBySiteId($site_id, $count) {
        return DB::table('product')
                ->join('topic', 'product.topic_id', '=', 'topic.id')
                ->where('topic.site_id', $site_id)
                ->orderBy('product.created_at', 'desc')
                ->limit($count)->get();
    }

}
