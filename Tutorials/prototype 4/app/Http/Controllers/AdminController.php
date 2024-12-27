<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

public function showDashboard()
{
    if (Auth::user()->role !== 'admin') {
        return redirect('/'); // Redirect to the home page if not an admin
    }

    // Return the admin dashboard view if the user is an admin
    return view('admin.dashboard');
}

}