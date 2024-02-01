<?php

namespace App\Http\Controllers;

use Domain\Page\Models\Page;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function show($slug = ''){

        
        $page = Cache::rememberForever('page_' . $slug, function() use($slug) {
            return Page::activeItem($slug)->first();
        });

        if($page){

            if(view()->exists("page.$page->template.index")){
                return view("page.$page->template.index", ['page' => $page] );
            }

            return view('page.default.index', ['page' => $page]);
        }
        abort(404);
    }
}
