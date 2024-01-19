<?php

namespace App\Http\Controllers;

use Domain\Page\Models\Page;

class PageController extends Controller
{
    public function show($slug = ''){

        if($page = Page::activeItem($slug)->first()){

            if(view()->exists("page.$page->template.index")){
                return view("page.$page->template.index", ['page' => $page] );
            }

            return view('page.default.index', ['page' => $page]);
        }
        abort(404);
    }
}
