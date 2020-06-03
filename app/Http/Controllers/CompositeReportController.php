<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CompositeReportController extends Controller {
    public function index() {
        $users = User::all();
        return view('composite_report.index', ['users' => $users]);
    }
}
