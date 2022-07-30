<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //update profile info
    public function updateProfile(Request $request)
    {
        $rules = [
            'name'    => 'required|string',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

            return response()->json([
                'status'  => false,
                'message' => $validator->errors()
            ],422);

        }else {

            $authid = auth()->user()->id;
            $user =User::find($authid);

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


            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->country = $request->country;
            $user->organization = $request->organization;
            $user->profession = $request->profession;
            $user->save();

            return response()->json([
                'status'  => true,
                'message' => "Your Profile Updated successfully.",
                'data' => $user
            ],200);

        }
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
