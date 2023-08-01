<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        // Your logic for managing users (index page)
    }

    public function createUser()
    {
        // Your logic for creating a new user
    }

    public function content()
    {
        // Your logic for managing content (index page)
    }

    public function createContent()
    {
        // Your logic for creating new content
    }

    public function settings()
    {
        // Your logic for managing settings
    }

    public function updateSettings()
    {
        // Your logic for updating settings
    }
}
