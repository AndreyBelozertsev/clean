<?php
namespace Support\Traits;

use Domain\Seo\Models\Seo;
use Illuminate\Database\Eloquent\Model;

trait CreateSeo
{

    protected static function bootCreateSeo()
    {
        static::created(function(Model $model){
            $model->createSeo();
        });
    }

    protected function createSeo():void
    {

        if(method_exists($this, 'seo')){
            $this->seo()->create([
                'title'=> str()->limit($this->{$this->titleFrom()},50,''),
                'url'=>$this->makeUrl()
            ]);
        }else{
            Seo::create([
                'title'=> str()->limit($this->{$this->titleFrom()},50,''),
                'url'=>$this->makeUrl()
            ]);
        }
    }

    protected function titleFrom():string
    {
        return 'title';
    }


}
