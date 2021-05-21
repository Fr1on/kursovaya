<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);
//        $user = new User;
//        $user->name = $request->name;
//        $user->
//        $user->password = Hash::make($request->password);
//        $query = $user->save();
            $query = DB::table('users')
                ->insert([
                   'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password)

                ]);

        if ($query) {
            return back()->with('success', 'You have been successfuly registered');
        } else {
            return back()->with('fail', 'Something went wrong');
        }

    }

    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('profile');
        }
        return back()->with('fail','No account found for this email');
    }
    function profile(){
        return view('admin.profile');
    }
    function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect('login');
        }
    }
    function showData($id){
        return user::find($id);
    }
}
