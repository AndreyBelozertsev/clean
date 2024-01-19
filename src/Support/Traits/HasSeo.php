<?php
namespace Support\Traits;

use Domain\Seo\Models\Seo;
use Illuminate\Database\Eloquent\Relations\MorphOne;


trait HasSeo
{

    /**
    * Get the model seo.
    */

    public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }


}




