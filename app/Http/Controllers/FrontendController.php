<?php

namespace App\Http\Controllers;

use App\Series;
use App\Lesson;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome()
    {
        return view('welcome')->withSeries(Series::all());
    }

    public function series(Series $series, Lesson $lesson)
    {
        return view('series')->withSeries($series)
            ->withLesson($lesson);
    }
}
