<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use function PHPSTORM_META\type;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

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

  public function AdminProfileStore(Request $request)
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
      @unlink(public_path('upload/admin_images/' . $data->photo));
      $filename = date('YmdHi') . $file->getClientOriginalName();
      $file->move(public_path('upload/admin_images'), $filename);
      $data['photo'] = $filename;
    }
    $data->save();

    $notification = array('message' => 'Admin Profile Updated Successfully', "alert-type" => "success");
    return redirect()->back()->with($notification);
  }

  public function AdminChangePassword()
  {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('admin.admin_change_password', compact('user'));
  }

  public function AdminPasswordUpdate(Request $request)
  {
    // validation
    $validated = $request->validate([
      'current_password' => ['required', 'current_password'],
      'password' => ['required', Password::defaults(), 'confirmed'],
    ]);

    if (!Hash::check($request->current_password, auth::user()->password)) {
      $notification = array('message' => 'current password does not match', "alert-type" => "error");
      return redirect()->back()->with($notification);
    }


    // update new password
    $request->user()->update([
      'password' => Hash::make($validated['password']),
    ]);

    $notification = array('message' => 'password updated successfully', "alert-type" => "success");
    return redirect()->back()->with($notification);
  }
}