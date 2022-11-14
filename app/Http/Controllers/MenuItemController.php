<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;

class MenuItemController extends Controller
{

    public function AuthCheck(){
        $name = Session::get('Admin_UserID');
        if ($name) {
            return;
        } else {
            return Redirect::to('UserLogin')->send();;
        }
    }

    public function index(){
        $this->AuthCheck();
        try {
            DB::connection()->getPdo();
            return view('admin.web_menu_item');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    public function store(Request $request){
        try {
            if ($request['menu_item_id']==""){
                $data = array();
                $data['Name'] = $request['Name'];
                $data['Link'] = $request['Link'];
                $data['Other'] = $request['Other'];
                $data['Status'] = $request['Status'];
                $data['CreateBy'] = Session::get('Admin_UserID');
                $data['CreateDate'] = $this->getDates();
                $data['UpdateBy'] = "";
                $data['UpdateDate'] = "";

                $result = DB::table('menu_item')->insert($data);
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Menu Item Added Successfully"
                ));

            }else{

                $data = array();
                $data['Name'] = $request['Name'];
                $data['Link'] = $request['Link'];
                $data['Other'] = $request['Other'];
                $data['Status'] = $request['Status'];
                $data['UpdateBy'] = Session::get('Admin_UserID');
                $data['UpdateDate'] =  $this->getDates();


                DB::table('menu_item')
                    ->where('menu_item_id', $request['menu_item_id'])
                    ->update($data);

                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Menu Item Update Successfully"
                ));
            }

        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function show($id){
        try {
            $singleDataShow = DB::table('menu_item')
                ->where('menu_item_id', $id)
                ->get();
            return $singleDataShow;
        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function destroy($id){
        try {
            $data['Status'] = "Delete";
            DB::table('menu_item')
                    ->where('menu_item_id', $id)
                    ->update($data);
            return json_encode(array(
                "statusCode" => 200
            ));
        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function getMenuItem(){

        $UserInfo = DB::select("SELECT menu_item_id,Name,Link,Other,Status,CreateBy,CreateDate,UpdateBy,
        UpdateDate FROM menu_item where Status!='Delete';");

        return DataTables::of($UserInfo)
            ->addColumn('action', function ($UserInfo) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showUserInfoData(' . $UserInfo->menu_item_id . ')" role="button" href="#" class="btn btn-success btn-sm">Edit</a>
                    <a onclick="deleteUserInfoData(' . $UserInfo->menu_item_id . ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }

    public function getDates(){
        $Date = "";
        date_default_timezone_set("Asia/Dhaka");
        return $Date = date("d/m/Y");
    }
}
