<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function my_home()
    {
        return view('home.index');
    }
    //
   public function index()
{
    if (Auth::check()) {
        $usertype = Auth::user()->usertype;

        if ($usertype == 'admin') {
            return view('admin.index'); // show admin
        } elseif ($usertype == 'user') {
            return view('home.index'); // show user
        } else {
            return view('unauthorized'); // optional
        }
    } else {
        return redirect('login'); // not logged in
    }
}
}

