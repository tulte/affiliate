<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Group;


class AdminGroupController extends Controller {

    public function index() {
        $groups = Group::all();
        return view('admin.group.index', ['groups' => $groups]);
    }

    public function edit($id) {
        $group = Group::find($id);
        if($topic) {
            return view('admin.group.edit', ['group' => $group]);
        }
        return redirect()->back();
    }

    protected function validator(array $data, $id = null)
    {
        $validator = [
            'name' => 'required|unique:group' . ($id > 0 ? ',name,' . $id : '')
        ];

        return Validator::make($data, $validator);
    }

    public function create() {
        return view('admin.group.create');
    }


    public function save(Request $request) {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $group = new Group();
        $this->saveGroup($group,$request);

        return redirect()->route('admin.group.index');

    }

    public function update(Request $request, $id) {
        $group = Group::find($id);
        $validator = $this->validator($request->all(), $id);

        if($group === null) {
            return redirect()->back()->withInput()->withErrors(['error' => ['Group existiert nicht']]);
        }

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $this->saveGroup($group,$request);

        return redirect()->route('admin.group.index');

    }

    public function destroy($id)
    {
        Group::find($id)->delete();
        return redirect()->route('admin.group.index');
    }


    private function saveGroup($group, $request) {
        $group->name = $request->name;
        $group->icon = $request->icon;
        $group->save();
    }

}
