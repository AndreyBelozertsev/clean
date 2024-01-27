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

if (!function_exists('getUuid')) {
    function getUuid(){

        if (\Cookie::get('custom-uuid')  == null) {
            $uuid =  \Str::uuid();
            \Cookie::queue(
                \Cookie::make('custom-uuid', $uuid, 60 * 24 * 30)
            );
            return $uuid;
        }
        return \Cookie::get('custom-uuid');
    }
}

if (!function_exists('getHumanDate')) {
    function getHumanDate($date, $time = false){
        $format = 'd F Y г.';
        if($time){
            $format = 'd F Y H:i';
        }
        return Illuminate\Support\Carbon::parse($date)->translatedFormat($format);
    }
}

