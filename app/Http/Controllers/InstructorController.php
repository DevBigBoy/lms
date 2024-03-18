<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class InstructorController extends Controller
{
  //
  public function InstructorDashboard()
  {
    return view('instructor.index');
  }

  public function InstructorLogout(Request $request): RedirectResponse
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/admin/login');
  }

  public function InstructorLogin()
  {
    return view('instructor.instructor_login');
  }

  public function AdminProfile()
  {
    $id = Auth::user()->id;
    $profileData = User::find($id);
    return view('instructor.admin_profile', compact('profileData'));
  }
}
