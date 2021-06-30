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

        $query = DB::table('users')
            ->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)

            ]);

        if ($query) {
            return back()->with('success', 'Регистрация прошла успешно');
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
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('profile');
        }
        return back()->with('fail', 'Не найден аккаунт с такой почтой или паролем');
    }

    function profile()
    {
        return view('admin.profile');
    }

    function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('login');
        }
    }

    function showData($id)
    {
        $myid = Auth::user()->id;
        if($myid == $id || $myid == 1){
            $data = user::find($id);
            return view('edit', ['data' => $data]);
        }
        else{
            return redirect('profile');

        }


    }

    function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|',
            'password' => 'required|min:5|max:12'
        ]);

        $data=User::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password= Hash::make($request->password);

        $data->save();
        return redirect('profile');
    }
    function delete($id){
        $data=User::find($id);
        $data->delete();
        return redirect('login');
    }
    function userslist(){
        $data=User::all();
        return view('userslist',['users'=>$data]);
    }
    function admin(){

                return view('admin');



    }
}

