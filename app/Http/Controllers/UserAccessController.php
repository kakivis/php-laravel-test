<?php

namespace App\Http\Controllers;

use App\UserAccess;
use Illuminate\Http\Request;

class UserAccessController extends Controller
{
    public function index() {
        $user_accesses = UserAccess::paginate(10);
        return view('user_access.index', ['user_accesses' => $user_accesses]);
    }

    public function create() {
        return view('user_access.create');
    }

    public function show(int $id) {
        $user_access = UserAccess::findOrFail($id);
        return view('user_access.show', ['user_access' => $user_access]);
    }

    public function store() {
        $user_access = new UserAccess();
        $user_access->user_id = request('user_id');
        $user_access->last_login = request('last_login');
        $user_access->save();
        return redirect('/user_accesses')->with(['msg' => 'User access created successfully']);
    }
}
