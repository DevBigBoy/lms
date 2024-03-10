<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{

  public function AdminDashboard()
  {
    return view('admin.index');
  }

  public function AdminLogout(Request $request): RedirectResponse
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/admin/login');
  }

  public function AdminLogin()
  {
    return view('admin.admin_login');
  }

  public function AdminProfile()
  {
    $id = Auth::user()->id;
    $profileData = User::find($id);
    return view('admin.admin_profile', compact('profileData'));
  }
}
