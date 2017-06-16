<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Site;

class AdminSiteController extends Controller {

    public function index() {
        $sites = Site::all();
        return view('admin.site.index', ['sites' => $sites]);
    }

    public function edit($id) {
        $site = Site::find($id);
        if($site) {
            return view('admin.site.edit', ['site' => $site]);
        }
        return redirect()->back();
    }

    protected function validator(array $data, $id = null)
    {
        $validator = [
            'url' => 'required|unique:site' . ($id > 0 ? ',url,' . $id : '')
        ];

        return Validator::make($data, $validator);
    }

    public function create() {
        return view('admin.site.create');
    }


    public function save(Request $request) {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $site = new Site();
        $this->saveSite($site,$request);

        return redirect()->route('admin.site.index');

    }

    public function update(Request $request, $id) {
        $site = Site::find($id);
        $password_required = isset($request->password);
        $validator = $this->validator($request->all(), $id, $password_required);

        if($site === null) {
            return redirect()->back()->withInput()->withErrors(['error' => ['Site existiert nicht']]);
        }

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $this->saveSite($site,$request);

        return redirect()->route('admin.site.index');

    }

    public function destroy($id)
    {
        Site::find($id)->delete();
        return redirect()->route('admin.site.index');
    }


    private function saveSite($site, $request) {
        // image stuff
        $image = $this->workImage('site', 'meta_image', $request, $site->meta_image);
        if($image !== null) {
            $site->meta_image = $image;
        }

        $site->url = $request->url;
        $site->meta_title = $request->meta_title;
        $site->meta_description = $request->meta_description;
        $site->save();
    }

}
