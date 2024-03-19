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

  public function InstructorProfile()
  {
    $id = Auth::user()->id;
    $profileData = User::find($id);
    return view('instructor.instructor_profile', compact('profileData'));
  }

  public function InstructorProfileStore(Request $request)
  {
    $id = Auth::user()->id;
    $data = User::find($id);

    if ($request->input('name') == $data->name && $request->input('username') == $data->username && $request->input('email') == $data->email && $request->input('phone') == $data->phone && $request->input('address') == $data->address) {
      return redirect()->back()->with(["alert-type" => 'warning', 'message' => 'Nothing changed.']);
    }

    $data->name = $request->name;
    $data->username = $request->username;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;

    if ($request->file('photo')) {
      $file = $request->file('photo');
      @unlink(public_path('upload/instructor_images/' . $data->photo));
      $filename = date('YmdHi') . $file->getClientOriginalName();
      $file->move(public_path('upload/instructor_images'), $filename);
      $data['photo'] = $filename;
    }
    $data->save();

    $notification = array('message' => 'Instructor Profile Updated Successfully', "alert-type" => "success");
    return redirect()->back()->with($notification);
  }
}
