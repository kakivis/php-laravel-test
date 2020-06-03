<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CompositeReportController extends Controller {
    public function index() {
        $users = User::all();
        return view('composite_report.index', ['users' => $users]);
    }

    public function least_logged() {
        $users = User::withCount('user_accesses')->orderBy('user_accesses_count', 'asc')->paginate(10);
        return view('composite_report.index', ['users' => $users]);
    }

    public function most_logged() {
        $users = User::withCount('user_accesses')->orderBy('user_accesses_count', 'desc')->paginate(10);
        return view('composite_report.index', ['users' => $users]);
    }
}
