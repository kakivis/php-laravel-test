<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CompositeReportController extends Controller {
    public function index() {
        $per_page = request('per_page', 10);
        $users = $this->getUsers($per_page);
        return view('composite_report.index', ['users' => $users, 'per_page' => $per_page]);
    }

    public function least_logged() {
        $users = User::withCount('user_accesses')->orderBy('user_accesses_count', 'asc')->paginate(10);
        return view('composite_report.index', ['users' => $users]);
    }

    public function most_logged() {
        $users = User::withCount('user_accesses')->orderBy('user_accesses_count', 'desc')->paginate(10);
        return view('composite_report.index', ['users' => $users]);
    }

    private function getUsers($per_page) {
        $collection = User::query();
        $request = request()->all();
        $filters = [];
        $filters['per_page'] = $per_page;
        if (isset($request['name'])) {
            $collection = $collection->whereName($request['name']);
            $filters['name'] = $request['name'];
        }
        if (isset($request['email'])) {
            $collection = $collection->whereEmail($request['email']);
            $filters['email'] = $request['email'];
        }
        if (isset($request['active'])) {
            $collection = $collection->whereActive($request['active']);
            $filters['active'] = $request['active'];
        }
        if (isset($request['start_date'])) {
            $collection = $collection->withAndWhereHas('user_accesses', function($q) use($request){
                $q->where('last_login', '>', $request['start_date']);
            });
            $filters['start_date'] = $request['start_date'];
        }
        if (isset($request['end_date'])) {
            $collection = $collection->withAndWhereHas(['user_accesses' => function($q) use($request){
                $q->where('last_login', '<', $request['end_date']);
            }]);
            $filters['end_date'] = $request['end_date'];
        }
//        $collection = $collection->whereHas('user_accesses');
        return $collection->orderBy('name', 'ASC')->paginate($per_page)->appends($filters);
    }
}
