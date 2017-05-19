<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class AffiliateController extends Controller {

    public function index() {
        return view('affiliate.index');
    }

    public function topic($topic) {
        return view('affiliate.topic', ['topic' => $topic]);
    }

}
