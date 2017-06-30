<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Topic;
use App\Group;
use App\Feature;



class AdminGroupController extends Controller {

    private $TYPES = ['ICON' => 'ICON', 'TEXT' => 'TEXT'];

    public function index($topicid) {
        $topic = Topic::find($topicid);
        $topic->load('products.groups');

        $topic = $topic->toArray();
        $groups = $this->getTopicGroups($topic);
        $products = $this->getTopicProducts($topic);

        $groupTable = $this->getGroupTable($topic, $groups, $products);
        $productColumns = $this->getProductColumns($products);

        return view('admin.group.index', ['topicid' => $topicid, 'groups' => $groupTable, 'products' => $productColumns]);
    }

    public function edit($topicid, $id) {
        $topic = Topic::find($topicid);
        $topic->load('products.groups');

        $topic = $topic->toArray();
        $groups = $this->getTopicGroups($topic);
        $products = $this->getTopicProducts($topic);

        $groupTable = $this->getGroupTable($topic, $groups, $products);
        $groupEntry = $this->filterGroupTable($groupTable, $id);

        if($groupEntry) {
            return view('admin.group.edit', ['topicid' => $topicid, 'group' => $groupEntry, 'types' => $this->TYPES]);
        }
        return redirect()->back();
    }

    public function update(Request $request, $topicid, $id) {
        $inputs = $request->all();

        $groupTopic = Group::findGroupByTopicIdAndGroupId($topicid, $id);
        if($groupTopic === null) {
            return redirect()->back()->withInput()->withErrors(['error' => ['Group existiert nicht im Topic']]);
        }

        // save the group
        $group = Group::find($id);
        $group->name = $inputs['name'];
        $group->icon = $inputs['icon'];
        $group->save();

        // save feature data
        $featureDatas = $this->getFeaturesFromInput($inputs, $group->id);
        foreach($featureDatas as $featureData) {
            $feature = Feature::findByGroupIdAndProductId($id, $featureData['product_id']);
            if($feature === null) {
                    $feature = new Feature();
            }

            $this->saveFeature($feature, $featureData);
        }

        return redirect()->route('admin.group.index', [$topicid]);
    }

    public function create($topicid) {
        $topic = Topic::find($topicid);
        $topic->load('products.groups');

        $topic = $topic->toArray();
        $products = $this->getTopicProducts($topic);

        $productColumns = $this->getProductColumns($products);

        return view('admin.group.create', ['topicid' => $topicid, 'products' => $products, 'types' => $this->TYPES]);

    }


    public function save(Request $request, $topicid) {
        $inputs = $request->all();

        // save the group
        $group = new Group();
        $group->name = $inputs['name'];
        $group->icon = $inputs['icon'];
        $group->save();

        // save feature data
        $featureDatas = $this->getFeaturesFromInput($inputs, $group->id);
        foreach($featureDatas as $featureData) {
            $feature = new Feature();
            $this->saveFeature($feature, $featureData);
        }

        return redirect()->route('admin.group.index', [$topicid]);

    }

    public function destroy($topicid, $id){
        $groupTopic = Group::findGroupByTopicIdAndGroupId($topicid, $id);
        if($groupTopic === null) {
            return redirect()->back()->withInput()->withErrors(['error' => ['Group existiert nicht im Topic']]);
        }

        // delete the group
        Group::find($id)->delete();

        return redirect()->route('admin.group.index', [$topicid]);
    }

    private function getFeaturesFromInput($inputs, $groupId) {
        $ret =[];
        foreach($inputs as $input_key => $input_value) {
            // starts with feature
            if(substr($input_key, 0, strlen('feature_name_')) === 'feature_name_') {
                $productid = $this->getProductIdFromInputKey($input_key);
                $featureType = $inputs['feature_type_' . strval($productid)];

                $entry = [
                    'group_id' => $groupId,
                    'product_id' => $productid,
                    'value' => $input_value,
                    'type' => $featureType
                ];
                $ret[] = $entry;
            }
        }
        return $ret;
    }

    private function saveFeature($feature, $data) {
        $feature->group_id = $data['group_id'];
        $feature->product_id = $data['product_id'];
        $feature->value = $data['value'];
        $feature->type = $data['type'];
        $feature->save();
    }

    private function getProductIdFromInputKey($inputKey) {
        return intval(preg_replace('/[^0-9]+/', '', $inputKey), 10);
    }

    private function getProductColumns($products) {
        $ret = [];

        foreach ($products as $product) {
            $ret[] = ['name' => $product['name'], 'id' => $product['id']];
        }

        return $ret;
    }

    private function filterGroupTable($groupTable, $groupid) {
        foreach($groupTable as $entry) {
            if($entry['id'] == $groupid) {
                return $entry;
            }
        }
        return null;
    }

    private function getGroupTable($topic, $groups, $products) {
        $ret = [];

        foreach ($groups as $group) {
            $row = [];
            $row['name'] = $group['name'];
            $row['icon'] = $group['icon'];
            $row['id'] = $group['id'];
            $row['features'] = [];

            foreach ($products as $product) {
                $feature = $this->getFeatureForProductAndGroup($topic, $group['name'], $product['name']);
                $productIdStr = $this->getProductIdStr($product['name']);
                $row['features'][] = ['name' => $feature['value'], 'type' => $feature['type'], 'product' => $product['name'], 'productid' => $product['id']];
            }
            $ret[] = $row;
        }

        return $ret;

    }

    private function getProductIdStr($productName) {
        $ret = strtolower($productName);
        $ret = str_replace(' ', '_', $ret);
        return $ret;
    }

    private function getFeatureForProductAndGroup($topic, $groupName, $productName) {
        foreach ($topic['products']as $product) {
            if($product['name'] == $productName) {
                return $this->getFeatureForGroup($product, $groupName);
            }
        }
        return null;
    }

    private function getFeatureForGroup($product, $groupName) {
        foreach ($product['groups'] as $group) {
            if($group['name'] == $groupName) {
                return $group['pivot'];
            }
        }
        return null;
    }

    private function getTopicGroups($topic) {
        $groups = [];

        if(isset($topic['products']) && isset($topic['products'][0]['groups'])) {
            foreach ($topic['products'][0]['groups'] as $group) {
                $groups[] = $group;
            }
        }

        return $groups;
    }

    private function getTopicProducts($topic) {
        $products = [];

        if(isset($topic['products'])) {
            foreach ($topic['products'] as $product) {
                $products[] = $product;
            }
        }

        return $products;
    }

}
