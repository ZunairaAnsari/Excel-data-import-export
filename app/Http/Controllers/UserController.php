<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::paginate(7);
        return view('welcome', compact('users'));
    }


    public function register(Request $request){
        $request->validate([
            'name' =>'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' =>'required|string|email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('home')->with('success', 'Login successful');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('home')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('home')->with('success', 'User deleted successfully.');
    }

    public function export()
    {
        $filename = 'users.xlsx';
        return Excel::download(new UsersExport, $filename );
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successful');
    }
}
