<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Input;

class ProductStockController extends Controller
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
            return view('admin.product_stock');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    public function store(Request $request){
        try {
            if ($request['StockID']==""){
                $data = array();
                $data['ProductID'] = $request['ProductID'];
                $data['ProductCode'] = $request['ProductCode'];
                $data['Color'] = $request['Color'];
                $data['Size'] = $request['Size'];
                $data['DisplayType'] = $request['DisplayType'];
                $data['StockQuantity'] = $request['StockQuantity'];
                $data['SellQuantity'] = $request['SellQuantity'];
                $data['Status'] = $request['Status'];
                $data['CreateBy'] = Session::get('Admin_UserID');
                $data['CreateDate'] = $this->getDates();
                $data['UpdateBy'] = "";
                $data['UpdateDate'] = "";

                $result = DB::table('productstock')->insert($data);
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Product Stock Added Successfully"
                ));

            }else{

                $data = array();
                $data['ProductID'] = $request['ProductID'];
                $data['ProductCode'] = $request['ProductCode'];
                $data['Color'] = $request['Color'];
                $data['Size'] = $request['Size'];
                $data['DisplayType'] = $request['DisplayType'];
                $data['StockQuantity'] = $request['StockQuantity'];
                $data['SellQuantity'] = $request['SellQuantity'];
                $data['Status'] = $request['Status'];
                $data['UpdateBy'] = Session::get('Admin_UserID');
                $data['UpdateDate'] =  $this->getDates();


                DB::table('productstock')
                    ->where('StockID', $request['StockID'])
                    ->update($data);

                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Product Type Update Successfully"
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
            $singleDataShow = DB::table('producttype')
                ->where('ProductTypeId', $id)
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
            DB::table('producttype')
                ->where('ProductTypeId', $id)
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

    public function checkAPI(){

        $client =  new \GuzzleHttp\Client();
        $options = [
            'multipart' => [
                [
                    'name' => 'Name',
                    'contents' => 'aaaa'
                ]
            ]];
        $request = new Request('POST', 'http://103.91.54.60/OAA/test.php');
        $res = $client->sendAsync($request, $options)->wait();
        echo $res->getBody();
    }

    public function getProductType(){

        $UserInfo = DB::select("SELECT ProductTypeId,Name,Status,CreateBy,CreateDate,UpdateBy,
        UpdateDate FROM producttype where Status!='Delete';");

        return DataTables::of($UserInfo)
            ->addColumn('action', function ($UserInfo) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showUserInfoData(' . $UserInfo->ProductTypeId . ')" role="button" href="#" class="btn btn-success btn-sm">Edit</a>
                    <a onclick="deleteUserInfoData(' . $UserInfo->ProductTypeId . ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
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
