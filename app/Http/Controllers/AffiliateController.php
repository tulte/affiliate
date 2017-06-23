<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Topic;
use App\Article;
use App\Product;
use Illuminate\Support\Facades\Cache;

class AffiliateController extends Controller {

    public function index() {
        $site = view()->shared('site');
        $articles = Article::findLastArticlesBySiteId($site->id,4);
        $products = Product::findLastProductsBySiteId($site->id,4);

        return view('affiliate.index', ['articles' => $articles, 'products' => $products]);
    }

    public function topic($topic) {
        $entry = $this->getTopic($topic);

        if($entry === null) {
            abort(404);
        }
        return view('affiliate.topic', ['topic' => $entry]);
    }

    public function article($topic) {
        $entry = $this->getTopic($topic);

        if($entry === null) {
            abort(404);
        }
        return view('affiliate.article', ['topic' => $entry]);
    }

    public function impressum() {
        return view('affiliate.impressum');
    }

    public function datenschutz() {
        return view('affiliate.datenschutz');
    }

    private function getTopic($topic) {
        $entry = Cache::get($topic);
        if($entry === null) {
            // find topic for name and id
            if(is_numeric($topic)) {
                $entry = Topic::find($topic);
            } else {
                $entry = Topic::findByName($topic);
            }

            if($entry !== null) {
                $entry->load('products.groups');
                $entry->load('infos');
                Cache::put($topic, $entry, 1);
            }
        }
        return $entry;
    }

}
