<?php

namespace App\Http\Helpers;

class ViewHelper {

    public static function first_eloquent($data, $field, $value){
        foreach($data as $entry) {
            if($entry->$field == $value) {
                return $entry;
            }
        }
        return null;
    }

}
