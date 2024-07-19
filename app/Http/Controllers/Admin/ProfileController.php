<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    //
    public function index(){
        $user  = auth()->user();
        return view('admin.profile',compact('user'));
    }
    public function update(ProfileRequest $request){
        $user = auth()->user();
        $user->fill($request->post())->update();
        if( $request->hasFile('photo')){
            $exist = Storage::disk('public')->exists('images/admins/'.$user->phot);
            if($exist){
                Storage::disk('public')->delete('images/admins/'.$user->photo);

            }

            $imageName = Str::random().'.'.$request->photo->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images/admins/', $request->photo , $imageName);
            $user->photo = $imageName;
            // dd('error');
            $user->save();

        }
        return redirect()->back()->with([
            'message'=> "Profile Updated successfully",
            'alert_type'=>"success"
        ]);
    }
    public function viewChangePassword(){
        $user =  auth()->user();
        return view('admin.changePassword',compact('user'));
    }
    public function changePassword(ChangePasswordRequest $request){
        $user  = auth()->user();
        if($user && Hash::check($request->old_password,$user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            $arr = [
                'message'=> "Password Updated successfully",
                'alert_type'=>'success'
            ];
            // dd('stop');
        }else{
            $arr = [
                'message'=> "Password Incorrect",
                'alert_type'=>'error'
            ];
            // dd('else stop');
        }
        return redirect()->back()->with($arr);

    }
}
