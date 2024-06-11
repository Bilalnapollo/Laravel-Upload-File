<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        $users = User::get();
        // echo $users;
        return view('file-upload',compact('users'));
    }
    function store(Request $req){
        // echo "File Uploaded";
        //learn about validation request
        $req->validate([
            'photo'=> 'required|mimes:png,jpg,jpeg|max:5000' //add these validtors in validation request 
        ]); 
        $file = $req->file('photo');
        $path = $file->store('image','public'); // specify the path where you are storing the image
        User::create([
            'file-name'=> $path
        ]);
        return redirect('/user')->with('status','User Image Uploaded Successfully'); //use route name insted
    }

    function destroy($id){
        $user = User::find($id);
        $user->delete();
        $image_path = public_path('storage'.'/'.$user["file-name"]);
        // return $image_path;
        if(file_exists($image_path)){
            @unlink($image_path);
        }
        return redirect('/user')->with('status','User Image Data deleted Successfully');
    }
    function edit($id){
        $user = User::find($id);
        return view('file-update',compact('user')); //use the same view for both edit and add new record 
    }
    function update($id, Request $req){
       $user = User::find($id);
       if($req->hasFile('photo')){

        $image_path = public_path('storage'.'/'.$user["file-name"]);
        if(file_exists($image_path)){
            @unlink($image_path);
        }
        $path = $req->file('photo')->store('image','public');
        $user['file-name'] = $path;
        $user->save();

        
       }
       return redirect('/user')->with('status','User Image Data updated Successfully');
    }
}
