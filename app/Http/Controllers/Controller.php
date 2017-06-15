<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function workImage($type, $field, $request, $existingImage) {
        $file = $request->file($field);
        if($file) {
            $extension = $file->getClientOriginalExtension();
            $name = $file->getFilename() . '.' .  $extension;
            $storage = Storage::disk($type);

            // upload new file
            $storage->put($name, \File::get($file->getRealPath()));
            // delete existing
            if($existingImage) {
                $storage->delete(basename($existingImage));
            }

            return config('filesystems.disks.'.$type.'.url') . '/' . $name;
        }

        return null;
    }

}
