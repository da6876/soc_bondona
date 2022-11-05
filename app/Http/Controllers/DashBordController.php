<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;

class DashBordController extends Controller
{
    public function AuthCheck(){
        $name = Session::get('Admin_UserID');
        if ($name) {
            return;
        } else {
            return Redirect::to('UserLogin')->send();;
        }
    }

    public function index()
    {
        $this->AuthCheck();
        try {
            DB::connection()->getPdo();
            return view('admin.welcome');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }
}
