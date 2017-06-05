<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Topic;
use Illuminate\Support\Facades\Cache;

class AffiliateController extends Controller {

    public function index() {
        return view('affiliate.index');
    }

    public function topic($topic) {
        $entry = $this->getTopic($topic);

        if($entry === null) {
            abort(404);
        }
        return view('affiliate.topic', ['topic' => $entry, 'topics' => Topic::all()]);
    }

    private function getTopic($topic) {
        $entry = Cache::get($topic);
        $entry = Topic::findByName($topic);
        if($entry === null) {
            $entry = Topic::findByName($topic);
            if($entry !== null) {
                $entry->load('products.groups');
                $entry->load('infos');
                Cache::put($topic, $entry, 30);
            }
        }
        return $entry;
    }

}
