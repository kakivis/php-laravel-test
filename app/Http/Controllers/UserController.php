<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index() {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    public function create() {
        return view('user.create');
    }

    public function show(int $id) {
        $user = User::findOrFail($id);
        return view('user.show', ['user' => $user]);
    }

    public function store() {
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->active = request('active') ?? 0;
        $user->save();
        return redirect('/users')->with(['msg' => 'User created successfully']);
    }
}
