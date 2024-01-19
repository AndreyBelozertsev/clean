<?php

namespace App\Menu;

use Illuminate\Support\Str;
use Support\Traits\Makeable;

class MenuItem
{
    use Makeable;

    public function __construct(
        protected string $link,
        protected string $label,
    )
    {
    }

    public function link(): string
    {
        return $this->link;
    }

    public function label(): string
    {
        return $this->label;
    }

    public function isActive(): bool
    {
        $path = parse_url($this->link(), PHP_URL_PATH) ?? '/';

        if($path === '/') {
            return request()->path() === $path;
        }
    
        $link = $this->link();
        
        if(! Str::is(url('/') . '*', $link) ){
            $link = url('/') . $link; 
        }
      
        return request()->fullUrlIs($link . '*');
    }
}
