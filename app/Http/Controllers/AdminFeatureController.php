<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Topic;


class AdminFeatureController extends Controller {

    public function index() {
        $topic = Topic::find(1);
        $topic->load('products.groups.feature');
        return $topic;
    }

}
