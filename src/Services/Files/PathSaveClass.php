<?php

namespace Services\Files;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PathSaveClass
{
    public static function getUploadPath($prefix, $type = 'images'){
        
        $newDirPath = "$type/$prefix/" . date('Y') . '/' . date('m') . '/' . date('d');

        if(!Storage::disk('public')->exists($newDirPath)){
            Storage::disk('public')->makeDirectory($newDirPath);
        }
        return "storage/$newDirPath";

    }
}