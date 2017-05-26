<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Topic;


class AdminFeatureController extends Controller {

    public function index() {
        $topic = Topic::find(1);
        $topic->load('products.groups');
        return $topic;
    }

    public function feature($topic) {
        $topic = Topic::find($topic);
        $topic->load('products.groups');
        return $this->buildTopicFeatureJson($topic->toArray());
    }

    private function buildTopicFeatureJson($topic) {

        $groups = $this->getTopicGroups($topic);
        $products = $this->getTopicProducts($topic);

        $ret['data'] = $this->getFeaturePivot($topic, $groups, $products);
        $ret['columns'] = $this->getFeaturePivotColumns($products);

        return $ret;
    }

    private function getFeaturePivotColumns($products) {
        $ret = [];

        foreach ($products as $product) {
            $ret[] = ['title' => $product['name'], 'data' => $this->getProductIdStr($product['name'])];
        }

        return $ret;
    }

    private function getFeaturePivot($topic, $groups, $products) {
        $ret = [];

        foreach ($groups as $group) {
            $row = [];
            $row['DT_RowId'] = 'row_' . $topic['id'] . '_' . $group['id'];
            foreach ($products as $product) {
                $feature = $this->getFeatureForProductAndGroup($topic, $group['name'], $product['name']);
                $productIdStr = $this->getProductIdStr($product['name']);
                $row[$productIdStr] = $feature['value'];
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
