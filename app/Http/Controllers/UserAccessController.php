<?php

namespace App\Http\Controllers;

use App\UserAccess;
use Illuminate\Http\Request;

class UserAccessController extends Controller
{
    public function index() {
        $user_accesses = UserAccess::all();
        return view('user_access.index', ['user_accesses' => $user_accesses]);
    }

    public function create() {
        return view('user_access.create');
    }

    public function show(int $id) {
        $user_access = UserAccess::findOrFail($id);
        return view('user_access.show', ['user_access' => $user_access]);
    }
}
