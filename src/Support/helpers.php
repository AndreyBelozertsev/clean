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

if (!function_exists('makeThumbnail')) {
    function makeThumbnail( string $file, string $size, string $method = 'resize')
    {
        
        if(! file_exists(public_path($file)) ){
            return;
        }

        $pathParse = array_reverse(explode('/', $file));

        return route('thumbnail',[
            'size'=>$size,
            'dir'=> $pathParse[4],
            'year'=> $pathParse[3],
            'month'=> $pathParse[2],
            'day'=> $pathParse[1],
            'method'=>$method,
            'file' =>File::basename($file)
        ]);    
    }
}

if (!function_exists('resetLandfillCache')) {
    function resetLandfillCache( )
    {
        Cache::forget('navigation_menu');
    }
}
