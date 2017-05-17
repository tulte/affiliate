<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Crypt;

class AdminUserController extends Controller {

    public function index() {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }


    public function edit($id) {
        $user = User::find($id);
        if($user) {
            return view('admin.user.edit', ['user' => $user]);
        }
        return redirect()->back();
    }

    protected function validator(array $data, $id = null, $password_required = true)
    {
        $validator = [
            'email' => 'required|email|max:255|unique:user' . ($id > 0 ? ',email,' . $id : ''),
            'password' => ($password_required ? 'required|min:6' : '')
        ];

        return Validator::make($data, $validator);
    }

    public function create() {
        return view('admin.user.create');
    }


    public function save(Request $request) {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $user = new User();
        $this->saveUser($user,$request);

        return redirect()->route('admin.user.index');

    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $password_required = isset($request->password);
        $validator = $this->validator($request->all(), $id, $password_required);

        if($user === null) {
            return redirect()->back()->withInput()->withErrors(['error' => ['Benutzer existiert nicht']]);
        }

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $this->saveUser($user,$request);
        return redirect()->route('admin.user.index');

    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.user.index');
    }


    private function saveUser($user, $request) {
        $user->email = $request->email;
        if($request->password) {
            $user->password =  bcrypt($request->password);
        }
        $user->save();
    }

}
