<?php

namespace App\Http\Controllers;

use App\Models\Work;

class PageController extends Controller
{
    public function work(Work $work)
    {
        return view('pages.work', compact('work'));
    }
}
