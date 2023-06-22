<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.home.index', [
            'title' => "Admin | Dashboard"
        ]);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.home.profile', [
            'title' => "Admin | Profile",
            'user' => $user,
        ]);
    }

    public function edit_profile(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'nik' => 'required',
        ]);


        if ($request->has('profile_photo')) {
            $photo = $request->file('profile_photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/upload/users'), $photoName);
            $photo_temp = 'upload/users/' . $photoName;

            $old_photo = Admin::where('nip', $request->get('nip'))->get('profile_photo')->first()['profile_photo'];
            if (str_contains($old_photo, 'root') == false) {
                try {
                    unlink(public_path('images/' . $old_photo));
                } catch(Exception $e){
                }
            }
        } else {
            $photo_temp = Admin::where('nip', $request->get('nip'))->get('profile_photo')->first()['profile_photo'];
        }

        if ($request->get('password') != "") {
            Admin::where('nip', $request->get('nip'))->update([
                'full_name' => $request->get('full_name'),
                'nik' => $request->get('nik'),
                'profile_photo' => $photo_temp,
                'password' => bcrypt($request->get('password'))
            ]);
        } else {
            Admin::where('nip', $request->get('nip'))->update([
                'full_name' => $request->get('full_name'),
                'nik' => $request->get('nik'),
                'profile_photo' => $photo_temp,
            ]);
        }

        return back()->with('success', true);
    }
}
