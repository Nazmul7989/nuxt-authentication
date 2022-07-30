<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    //update profile info
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'    => 'required|string',
        ]);

        $user = auth('api')->user();

        //Image image
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            if ($image) {

                if (Storage::exists('public' . $user->profile_picture)) {
                    Storage::delete('public'  . $user->profile_picture);
                }

                $imageName = "User_". uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('uploads/users/',$imageName,'public');
                $user->profile_picture = '/uploads/users/' . $imageName;
            }
        }


        $user->name = $request->name;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->organization = $request->organization;
        $user->profession = $request->profession;
        $user->save();

        return response()->json([
            'status'  => true,
            'message' => "Your Profile Updated successfully.",
            'user' => $user
        ],200);

    }

    //Change password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required:min:6',
        ]) ;

        if (Auth::guard('api')->attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                'status'  => true,
                'message' => "Your password has been changed successfully.",
            ],201);

        } else {

            return response()->json([
                'status'  => false,
                'message' => "Your current password does not match.",
            ]);

        }


    }
}
