<?php 
if(!function_exists('getUploadPath')){
    function getUploadPath($prefix, $type = 'images'){
        
            $newDirPath = "$type/$prefix/" . date('Y') . '/' . date('m') . '/' . date('d');
            if(!Storage::disk('public')->exists($newDirPath)){
                Storage::disk('public')->makeDirectory($newDirPath);
            }

            return $newDirPath;
    }

}