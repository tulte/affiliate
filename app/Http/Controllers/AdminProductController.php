<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Topic;
use App\Product;
use App\Group;
use App\Feature;
use App\Attribute;


class AdminProductController extends Controller {

    private $TYPES = ['BOOLEAN' => 'BOOLEAN', 'ICON' => 'ICON', 'TEXT' => 'TEXT'];

    public function index() {
        $products = Product::all();
        $products->load('topic');
        return view('admin.product.index', ['products' => $products]);
    }


    public function edit($id) {
        $product = Product::find($id);
        $topics = Topic::getListIdName();
        $groups = Group::getListIdName();

        if($product) {
            return view('admin.product.edit', ['product' => $product, 'topics' => $topics, 'groups' => $groups, 'group_types' => $this->TYPES]);
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
        $groups = Group::getListIdName();

        return view('admin.product.create', ['topics' => $topics, 'groups' => $groups, 'group_types' => $this->TYPES]);
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

        $groupData = $this->getGroupData($request);
        $product->groups()->sync($groupData);

        $attributeData = $this->getAttributeData($request);
        $this->saveAttributeData($product->id, $attributeData);

    }

    private function saveAttributeData($productId, $attributeData) {
        $product = Product::find($productId);
        $product->load('attributes');

        // delete non used
        if(count($attributeData) < $product->attributes()->count()) {
            $diffCount = $product->attributes()->count() - count($attributeData);
            for($i = 0; $i < $diffCount; $i++) {
                var_dump($product->attribute[$i]);
                $product->attributes[$i]->delete();
            }
        }

        // add missing
        if(count($attributeData) > $product->attributes()->count()) {
            $diffCount = count($attributeData) - $product->attributes()->count();
            for($i = 0; $i < $diffCount; $i++) {
                $attribute = new Attribute();
                $attribute->product_id = $product->id;
                $attribute->save();
            }
        }

        $product = Product::find($productId);
        $product->load('attributes');
        foreach($attributeData as $index => $attribute) {
            $product->attributes[$index]->value = $attribute['value'];
            $product->attributes[$index]->type = $attribute['type'];
            $product->attributes[$index]->save();
        }
    }

    private function getGroupData($request) {
        $ret = [];
        foreach($request->group_id as $index => $group_id) {
            $ret[$group_id] = [
                'value' => $request->group_value[$index],
                'type' => $request->group_type[$index]
            ];
        }
        return $ret;
    }

    private function getAttributeData($request) {
        $ret = [];
        foreach($request->attribute_value as $index => $attribute_value) {
            $ret[] = [
                'value' => $attribute_value,
                'type' => $request->attribute_type[$index]
            ];
        }
        return $ret;
    }

}
