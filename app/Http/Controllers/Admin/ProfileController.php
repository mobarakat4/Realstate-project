<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        return redirect()->back();
    }
}
