<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Topic;
use App\Info;


class AdminInfoController extends Controller {

    public function index() {
        $infos = Info::all();
        $infos->load('topic');
        return view('admin.info.index', ['infos' => $infos]);
    }


    public function edit($id) {
        $info = Info::find($id);
        $topics = Topic::getListIdName();
        if($info) {
            return view('admin.info.edit', ['info' => $info, 'topics' => $topics]);
        }
        return redirect()->back();
    }

    protected function validator(array $data, $id = null)
    {
        $validator = [
            'text' => 'required'
        ];

        return Validator::make($data, $validator);
    }

    public function create() {
        $topics = Topic::getListIdName();
        return view('admin.info.create', ['topics' => $topics]);
    }


    public function save(Request $request) {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $info = new Info();
        $this->saveInfo($info,$request);

        return redirect()->route('admin.info.index');

    }

    public function update(Request $request, $id) {
        $info = Info::find($id);
        $password_required = isset($request->password);
        $validator = $this->validator($request->all(), $id);

        if($info === null) {
            return redirect()->back()->withInput()->withErrors(['error' => ['Info existiert nicht']]);
        }

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $this->saveInfo($info,$request);
        return redirect()->route('admin.info.index');

    }

    public function destroy($id)
    {
        Info::find($id)->delete();
        return redirect()->route('admin.info.index');
    }


    private function saveInfo($info, $request) {
        $info->header = $request->header;
        $info->text = $request->text;
        $info->topic_id = $request->topic;
        $info->save();
    }

}
