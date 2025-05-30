<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait ImageUploader
{
    public function uploadImage($file, $path, $oldImage = null)
    {

        $filename = time() . uniqid() . '.' . $file->getClientOriginalExtension();
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $filepath = $path . $filename;
        $file->move($path, $filename);
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }
        return $filepath;
    }
}
