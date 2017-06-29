<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Topic;
use App\Product;


class AdminProductController extends Controller {

    public function index() {
        $products = Product::all();
        $products->load('topic');
        return view('admin.product.index', ['products' => $products]);
    }


    public function edit($id) {
        $product = Product::find($id);
        $topics = Topic::getListIdName();
        if($product) {
            return view('admin.product.edit', ['product' => $product, 'topics' => $topics]);
        }
        return redirect()->back();
    }

    protected function validator(array $data, $id = null)
    {
        $validator = [
            'name' => 'required|unique:product' . ($id > 0 ? ',name,' . $id : ''),
            'identifier' => 'required',
            'provider' => 'required',
            'link' => 'required',
            'price' => 'required|integer',
            'review_count' => 'required|integer',
            'review_value' => 'required|integer|max:50'

        ];

        return Validator::make($data, $validator);
    }

    public function create() {
        $topics = Topic::getListIdName();
        return view('admin.product.create', ['topics' => $topics]);
    }


    public function save(Request $request) {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $product = new Product();
        $this->saveProduct($product,$request);

        return redirect()->route('admin.product.index');

    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
        $password_required = isset($request->password);
        $validator = $this->validator($request->all(), $id);

        if($product === null) {
            return redirect()->back()->withInput()->withErrors(['error' => ['Product existiert nicht']]);
        }

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $this->saveProduct($product,$request);
        return redirect()->route('admin.product.index');

    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin.product.index');
    }


    private function saveProduct($product, $request) {
        // image stuff
        $image = $this->workImage('product', 'image', $request, $product->image);
        if($image !== null) {
            $product->image = $image;
        }

        // db stuff
        $product->name = $request->name;
        $product->provider = $request->provider;
        $product->link = $request->link;
        $product->price = $request->price;
        $product->review_count = $request->review_count;
        $product->review_value = $request->review_value;
        $product->identifier = $request->identifier;
        $product->topic_id = $request->topic;
        $product->save();
    }


}
