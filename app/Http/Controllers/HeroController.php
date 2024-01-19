<?php

namespace App\Http\Controllers;

use Domain\Hero\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::activeItems()->paginate(10);
        return view('page.hero.index',['heroes' => $heroes]);
    }

    public function show($slug)
    {

    }
}
