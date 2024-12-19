<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * The index function retrieves all users from the database and passes them to the view for
     * display.
     *
     * @return The `index` method is returning a view called `setting.user.index` with the `users` data
     * passed to it using the `compact` function.
     */
    public function index()
    {
        $users = User::with('roles', 'permissions')->get();
        return view('setting.user.index', compact('users'));
    }
}