<?php
namespace Support\Traits;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


trait HasThumbnail
{

    abstract protected function thumbnailDir():string;

    public function makeThumbnail(string $size, string $method = 'resize')
    {
        if(! $this->{$this->thumbnailColumn()} || Storage::exists($this->{$this->thumbnailColumn()} )){
            return;
        }
        return route('thumbnail',[
            'size'=>$size,
            'dir'=> $this->thumbnailDir(),
            'year'=> $this->thumbnailDate()[3],
            'month'=> $this->thumbnailDate()[2],
            'day'=> $this->thumbnailDate()[1],
            'method'=>$method,
            'file' =>File::basename($this->{$this->thumbnailColumn()})
        ]);
    }

    public function makeThumbnailFromImg(string $size, string $file, string $method = 'resize')
    {
        if(! file_exists(public_path($file)) ){
            return;
        }
        return route('thumbnail',[
            'size'=>$size,
            'dir'=> $this->thumbnailDir(),
            'year'=> $this->thumbnailDate($file)[3],
            'month'=> $this->thumbnailDate($file)[2],
            'day'=> $this->thumbnailDate($file)[1],
            'method'=>$method,
            'file' =>File::basename($file)
        ]);
    }

    protected function thumbnailColumn():string
    {
        return 'thumbnail';
    }
    
    protected function thumbnailDate($file = null):array
    {
        
        if($file){
            return array_reverse(explode('/', $file));
        }
        return array_reverse(explode('/', $this->{$this->thumbnailColumn()}));
    }

}
