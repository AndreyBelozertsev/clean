<?php


namespace Support\Traits;

use Domain\Seo\Models\Seo;
use Illuminate\Database\Eloquent\Model;


trait HasSlug
{

    protected static function bootHasSlug()
    {
        
        static::creating(function(Model $model){
            $model->makeSlug();
        });
    }

    protected function makeSlug():void
    {
        $slug = $this->slugUnique(
            str($this->{$this->slugFrom()})
                ->slug()
                ->value()
        );
 
        $this->{$this->slugColumn()} = $slug;

    }

    protected function slugColumn():string
    {
        return 'slug';
    }

    protected function slugFrom():string
    {
        return 'title';
    }

    protected function slugUnique(string $slug):string
    {
        $originalSlug = $slug;
        $i=0;

        while($this->isSlugExsist($slug)){
            $i++;
            $slug = $originalSlug . '-' . $i;
        }
        
        return $slug;
    }

    protected function isSlugExsist(string $slug):bool
    {

        $query = $this->newQuery()
            ->where(self::slugColumn(), $slug)
            ->where($this->getKeyName, '!=', $this->getKey())
            ->withOutGlobalScopes();
        
        $querySeo = false;
        if(method_exists($this, 'seo')){
            $querySeo = $this->seo()->newQuery()
            ->where('url', parse_url($this->makeUrl($slug), PHP_URL_PATH))
            ->where('seoable_id', '!=', $this->id)
            ->where('seoable_type', '!=', $this->getMorphClass())
            ->withOutGlobalScopes();
        }
       
        return $query->exists() && $querySeo;
    }

    

}
