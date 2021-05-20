<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
            'password' =>$request->password,
        ]);
 
        return redirect()->route('users.create');
     }
}
