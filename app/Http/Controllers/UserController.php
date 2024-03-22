<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

  public function index()
  {
    return view('frontend.index');
  }
  //
  public function UserDashboard()
  {
    return view();
  }
}
