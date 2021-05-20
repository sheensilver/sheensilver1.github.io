<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index() {
       $users =  User::paginate(5);

       return view('admin.user.index')->with(['users' => $users]);
    }
    public function create() {

        return view('admin.user.create');
    }
    public function store(Request $request) {
        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'role' =>$request->role,
            'password' =>Hash::make($request->password),
        ]);
 
        return redirect()->route('users.create');
    }
    public function edit($id) {
        $user = User::find($id);
        return view('admin.users.create')->with(['user' => $user]);
    }
    public function update(Request $request, $id) {
        User::where('id', $id)->update([
            'name' =>$request->name,
            'email' =>$request->email,
            'role' =>$request->role,
            'password' =>Hash::make($request->password),
        ]);
 
        return redirect()->route('users.index');
    }
    public function delete( $id) {
        User::where('id', $id)->delete();
 
        return redirect()->route('users.index');
    }
}
