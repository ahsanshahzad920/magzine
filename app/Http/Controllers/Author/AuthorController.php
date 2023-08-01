<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function dashboard()
    {
        return view('author.dashboard');
    }

    public function submitArticle()
    {
        // Your logic for the article submission form
    }

    public function storeArticle()
    {
        // Your logic for storing a submitted article
    }

    public function content()
    {
        // Your logic for managing content (index page) specific to the author
    }
}
