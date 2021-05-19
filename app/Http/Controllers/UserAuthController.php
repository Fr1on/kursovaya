<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
//        $user = User::where('email', '=', $request->email)->first();
        $user = DB::table('users')
                ->where('email',$request->email)
                ->first();
        if ($user){
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUser', $user->id);
                return redirect('profile');
            } else {
                return back()->with('fail', 'Invalid password');
            }

        }else{
            return back()->with('fail','No account found for this email');
        }
    }
    function profile(){
        if(session()->has('LoggedUser')){
//            $user = User::where('id', '=', session('LoggedUser'))->first();
            $user = DB::table('users')
                ->where('id', session('LoggedUser'))
                ->first();
            $data =[
                'LoggedUserInfo'=>$user
            ];
        }
        return view('admin.profile', $data);
    }
    function logout(){
        if (session()->has('LoggedUser')){
            session()->pull('LoggedUser');

            return redirect('login');
        }
    }
}
