<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Topic;
use App\Site;

class AdminTopicController extends Controller {

    public function index() {
        $topics = Topic::all();
        return view('admin.topic.index', ['topics' => $topics]);
    }

    public function edit($id) {
        $topic = Topic::find($id);
        if($topic) {
            return view('admin.topic.edit', ['topic' => $topic, 'sites' => Site::getListIdUrl()]);
        }
        return redirect()->back();
    }

    public function feature($id) {
        return view('admin.topic.feature', ['id' => $id]);
    }

    protected function validator(array $data, $id = null)
    {
        $validator = [
            'name' => 'required|unique:topic' . ($id > 0 ? ',name,' . $id : '')
        ];

        return Validator::make($data, $validator);
    }

    public function create() {
        return view('admin.topic.create', ['sites' => Site::getListIdUrl()]);
    }


    public function save(Request $request) {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $topic = new Topic();
        $this->saveTopic($topic,$request);

        return redirect()->route('admin.topic.index');

    }

    public function update(Request $request, $id) {
        $topic = Topic::find($id);
        $password_required = isset($request->password);
        $validator = $this->validator($request->all(), $id, $password_required);

        if($topic === null) {
            return redirect()->back()->withInput()->withErrors(['error' => ['Topic existiert nicht']]);
        }

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $this->saveTopic($topic,$request);

        return redirect()->route('admin.topic.index');

    }

    public function destroy($id)
    {
        Topic::find($id)->delete();
        return redirect()->route('admin.topic.index');
    }


    private function saveTopic($topic, $request) {
        // image stuff
        $image = $this->workImage('topic', 'meta_image', $request, $topic->meta_image);
        if($image !== null) {
            $topic->meta_image = $image;
        }

        $topic->name = $request->name;
        $topic->intro = $request->intro;
        $topic->site_id = $request->site;
        $topic->meta_title = $request->meta_title;
        $topic->meta_description = $request->meta_description;
        $topic->save();
    }

}
