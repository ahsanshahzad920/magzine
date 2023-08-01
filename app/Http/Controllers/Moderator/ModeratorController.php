<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function dashboard()
    {
        return view('moderator.dashboard');
    }

    public function articles()
    {
        // Your logic for managing articles (index page)
    }

    public function createArticle()
    {
        // Your logic for creating a new article
    }
}
