<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ThumbnailController extends Controller
{
    public function __invoke(
            string $dir, 
            string $method,
            string $year, 
            string $month, 
            string $day, 
            string $size, 
            string $file
        ) :BinaryFileResponse
    {
        abort_if(!in_array($size, config('thumbnail.allowed_sizes',[])),
            403, 
            'Size not allowed'
        );
        
        $storage = Storage::disk('images');
        
        
        $realPath = "$dir/$year/$month/$day/$file";
        $newDirPath = "$dir/$method/$year/$month/$day/$size";
        $resultPath = "$newDirPath/$file"; 

        if(!$storage->exists($newDirPath )){
            $storage->makeDirectory($newDirPath);
        }

        if(!$storage->exists($resultPath)){
            if(File::exists(config('thumbnail.default_template') . $realPath)){
                $image = Image::make(config('thumbnail.default_template') . $realPath);
            }else{
                $image = Image::make($storage->path($realPath));
            }
            
            [$w,$h] = explode('x',$size);

            if($w == 'null' || $h == 'null'){
                $image->{$method}($w, $h, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }else{
                $image->{$method}($w, $h);
            }
            $image->save($storage->path($resultPath));
            
        }

        return response()->file($storage->path($resultPath)); 
    }
}
