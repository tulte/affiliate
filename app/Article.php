<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'header', 'text', 'image', 'topic_id'
    ];

    public function topic() {
        return $this->belongsTo('App\Topic','topic_id');
    }

    public static function findLastArticlesBySiteId($site_id, $count) {
        return DB::table('article')
                ->join('topic', 'article.topic_id', '=', 'topic.id')
                ->where('topic.site_id', $site_id)
                ->orderBy('article.created_at', 'desc')
                ->limit($count)->get();
    }


}
