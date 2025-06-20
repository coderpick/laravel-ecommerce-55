<?php

namespace App\Traits;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait FileUploader
{
    public static function upload($file, $location, $width = 1200, $height = 630, $updateFile = false)
    {
        if ($file) {
            // Generate a unique file name
            $pre = time().'_'.substr(md5(rand()), 0, 5);
            $file_name = $pre.'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            // Ensure the location directory exists
            if (! file_exists($location)) {
                mkdir($location, 0777, true);
            }
            // Image processing with Intervention Image
            $imgDriver = new ImageManager(new Driver);
            $image = $imgDriver->read($file);
            $image->cover($width, $height);
            $image->toWebp(90);

            $file_full_name = $file_name.'.webp';
            $file_path = $location.'/'.$file_full_name;

            // Delete old file if it exists
            if ($updateFile && file_exists(public_path($updateFile))) {
                unlink(public_path($updateFile));
            }

            // Save the processed image
            $image->save($file_path); // Save using Intervention Image

            return $file_path;

        }

        return null;
    }
}
