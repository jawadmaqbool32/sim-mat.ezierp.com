<?php

namespace App\Core;

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;


class Helper
{

    public static function _uid()
    {
        return md5(date('Y-m-d') . microtime() . rand());
    }
    public static function normalize_hyphened($string)
    {
        return ucwords(str_replace('-', ' ', $string));
    }

    public static function hyphened($string)
    {
        return strtolower(str_replace(' ', '-', $string));
    }
    public static function snaked($string)
    {
        return str_replace(' ', '_', strtolower($string));
    }

    public static function uploadFile($settings)
    {
        $file = $settings['file'];
        $width = $settings['width'];
        $height = $settings['height'];
        $filename = round(microtime(true)) . rand(100, 999) . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path($settings['path']);
        $image_complete_path = $destinationPath . $filename;
        if ($width || $height) {
            Image::make($file->getRealPath())->resize($width, $height)->save($image_complete_path);
        }
        return $filename;
    }


    public static function deleteExcept($settings)
    {
        $files = $settings['files'];
        $exceptions = $settings['exceptions'];
        $path = $settings['path'];
        foreach ($files as $file) {
            if (array_search($file, $exceptions, true) === false) {
                $file = public_path($path) . '/' . $file;
                File::delete($file);
            }
        }
    }
}
