<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CompositeReportController extends Controller {
    public function index() {
        $request = $this->getRequest();
        $users = $this->getUsers($request);
        return view('composite_report.index', ['users' => $users, 'request' => $request]);
    }

    public function leastLogged() {
        $users = User::withCount('user_accesses')->orderBy('user_accesses_count', 'asc')->paginate(10);
        $request = $this->getRequest();
        $request['per_page'] = null;
        return view('composite_report.index', ['users' => $users, 'request' => $request]);
    }

    public function mostLogged() {
        $users = User::withCount('user_accesses')->orderBy('user_accesses_count', 'desc')->paginate(10);
        $request = $this->getRequest();
        $request['per_page'] = null;
        return view('composite_report.index', ['users' => $users, 'request' => $request]);
    }

    private function getUsers($request) {
        $collection = User::query();
        $per_page = $request['per_page'];
        $filters = [];
        $filters['per_page'] = $per_page;
        if (!empty($request['name'])) {
            $collection = $collection->whereName($request['name']);
            $filters['name'] = $request['name'];
        }
        if (!empty($request['email'])) {
            $collection = $collection->whereEmail($request['email']);
            $filters['email'] = $request['email'];
        }
        if (strlen($request['active']) == 1) {
            $collection = $collection->whereActive($request['active']);
            $filters['active'] = $request['active'];
        }
        if (!empty($request['start_date'])) {
            $collection = $collection->withAndWhereHas('user_accesses', function($q) use($request){
                $q->where('last_login', '>', $request['start_date']);
            });
            $filters['start_date'] = $request['start_date'];
        }
        if (!empty($request['end_date'])) {
            $collection = $collection->withAndWhereHas('user_accesses', function($q) use($request){
                if (!empty($request['start_date'])) {
                    $q->whereBetween('last_login',[$request['start_date'], $request['end_date']]);
                } else {
                    $q->where('last_login', '<', $request['end_date']);
                }
            });
            $filters['end_date'] = $request['end_date'];
        }

        return $collection->orderBy('name', 'ASC')->paginate($per_page)->appends($filters);
    }

    private function getRequest() {
        $request = request()->all();
        $request['name'] = !empty($request['name']) ? $request['name'] : '';
        $request['email'] = !empty($request['email']) ? $request['email'] : '';
        $request['active'] = isset($request['active']) && strlen($request['active']) == 1 ? $request['active'] : '';
        $request['start_date'] = !empty($request['start_date']) ? $this->formatDateTime($request['start_date']) : '';
        $request['end_date'] = !empty($request['end_date']) ? $this->formatDateTime($request['end_date']) : '';
        $request['per_page'] = !empty($request['per_page']) ? $request['per_page'] : 10;
        return $request;
    }

    private function formatDateTime($start_date)
    {
        return date("Y-m-d\TH:i:s", strtotime($start_date));
    }
}
