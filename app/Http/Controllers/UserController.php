<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Process the registration form
    public function register(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Assign role based on user type
        $userType = $request->input('user_type'); // Assuming you have a form field for user type selection

        if ($userType === 'admin') {
            $role = Role::where('name', 'Admin')->first();
        } elseif ($userType === 'moderator') {
            $role = Role::where('name', 'Moderator/Editor')->first();
        } else {
            $role = Role::where('name', 'Author/Publisher')->first();
        }

        // If no role is found, assign the default role (Author/Publisher)
        if (!$role) {
            $role = Role::where('name', 'Author/Publisher')->first();
        }

        $user->role()->associate($role);
        $user->save();

        // Redirect to the appropriate dashboard based on the user's role
        if ($user->role->name == 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role->name == 'Moderator/Editor') {
            return redirect()->route('moderator.dashboard');
        } else {
            return redirect()->route('author.dashboard');
        }
    }

   // Process the login form
public function login(Request $request)
{

    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    if (Auth::attempt($credentials)) {
        // Check if the authenticated user is an Admin
        if (auth()->user()->role->name === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->role->name === 'Moderator/Editor') {
            return redirect()->route('moderator.dashboard');
        } elseif (auth()->user()->role->name === 'Author/Publisher') {
            return redirect()->route('author.dashboard');
        }
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}

}
