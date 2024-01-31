<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domain\Question\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::activeItems()->paginate(10);
        return view('page.question.index',['questions' => $questions]);
    }

    public function show($slug)
    {
        $question = Question::activeItem($slug)->firstOrFail();
        return view('page.question.show',['question' => $question]);
    }
}
