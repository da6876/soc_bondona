<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;

class ProductInfoControler extends Controller
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
            return view('admin.product_info');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    public function store(Request $request){
        try {
            if ($request['ProductID']==""){
                $data = array();
                $data['ProductID'] = $request['ProductID'];
                $data['ProductType'] = $request['ProductType'];
                $data['Color'] = $request['Color'];
                $data['Size'] = $request['ProductSize'];
                $data['Category'] = $request['Category'];
                $data['SubCategory'] = $request['SubCategory'];
                $data['DisplayType'] = $request['DisplayType'];
                $data['Description'] = $request['Description'];
                $data['Details'] = $request['Details'];
                $data['Material'] = $request['Material'];
                $data['Care'] = $request['Care'];
                $data['PriceMRP'] = $request['PriceMRP'];
                $data['PriceDiscount'] = $request['PriceDiscount'];
                $data['Status'] = $request['Status'];
                $data['CreateBy'] = Session::get('Admin_UserID');
                $data['CreateDate'] = $this->getDates();
                $data['UpdateBy'] = "";
                $data['UpdateDate'] = "";

                $result = DB::table('productinfo')->insert($data);
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Product Info Added Successfully"
                ));

            }else{

                $data = array();
                $data['ProductID'] = $request['ProductID'];
                $data['ProductType'] = $request['ProductType'];
                $data['Color'] = $request['Color'];
                $data['Size'] = $request['ProductSize'];
                $data['Category'] = $request['Category'];
                $data['SubCategory'] = $request['SubCategory'];
                $data['DisplayType'] = $request['DisplayType'];
                $data['Description'] = $request['Description'];
                $data['Details'] = $request['Details'];
                $data['Material'] = $request['Material'];
                $data['Care'] = $request['Care'];
                $data['PriceMRP'] = $request['PriceMRP'];
                $data['PriceDiscount'] = $request['PriceDiscount'];
                $data['Status'] = $request['Status'];
                $data['UpdateBy'] = Session::get('Admin_UserID');
                $data['UpdateDate'] =  $this->getDates();


                DB::table('productinfo')
                    ->where('ProductID', $request['ProductID'])
                    ->update($data);

                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Product Info Update Successfully"
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
            $singleDataShow = DB::table('productinfo')
                ->where('ProductID', $id)
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
            DB::table('productinfo')
                    ->where('ProductID', $id)
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

    public function getAllProductInfo(){

        $UserInfo = DB::select("SELECT tb1.ProductID,tb6.name as ProductType,tb3.name as Color,tb4.name as Size,tb2.name as Category ,tb5.name as SubCategory,
        DisplayType,Description,Details,Material,Care,PriceMRP,PriceDiscount,tb1.Status,
        tb1.CreateBy,tb1.CreateDate,tb1.UpdateBy,tb1.UpdateDate 
        FROM productinfo tb1,productcategory tb2,productcolor tb3,productsize tb4,productsubcategory tb5,producttype tb6
        where tb1.Status != 'Delete'
        AND tb1.ProductType =tb6.ProductTypeId
        AND tb1.Category =tb2.ProductCategoryId
        AND tb1.Color =tb3.ProductColorId
        AND tb1.Size =tb4.ProductSizeId
        AND tb1.SubCategory =tb5.ProductSubCategoryId;");

        return DataTables::of($UserInfo)
            ->addColumn('action', function ($UserInfo) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showProduct(' . $UserInfo->ProductID . ')" role="button" href="#" class="btn btn-success btn-sm">Edit</a>
                    <a onclick="deleteProduct(' . $UserInfo->ProductID . ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }

    
    public function ShowSubList(){
        try {
            $ViewType = request()->input('ViewType');

            if ($ViewType == "Categorie") {

                try {
                    $categories_sub = DB::table('productcategory')
                        ->where('Status', '=', 'Active')
                        ->get();
                    return json_encode($categories_sub);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return ["o_status_message" => $e->getMessage()];
                }

            }else if ($ViewType == "SubCategorie") {

                $Category_Id = request()->input('CatId');
                try {
                    $categories_sub = DB::table('productsubcategory')
                        ->where('Status', '=', 'Active')
                        ->where('Category_Id', '=', $Category_Id)
                        ->get();
                    return json_encode($categories_sub);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return ["o_status_message" => $e->getMessage()];
                }

            }else if ($ViewType == "Color") {

                try {
                    $categories_sub = DB::table('productcolor')
                        ->where('Status', '=', 'Active')
                        ->get();
                    return json_encode($categories_sub);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return ["o_status_message" => $e->getMessage()];
                }

            }else if ($ViewType == "Type") {

                try {
                    $categories_sub = DB::table('producttype')
                        ->where('Status', '=', 'Active')
                        ->get();
                    return json_encode($categories_sub);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return ["o_status_message" => $e->getMessage()];
                }

            }else if ($ViewType == "Size") {

                $ProductTypeId = request()->input('ProductID');
                try {
                    $categories_sub = DB::table('productsize')
                        ->where('ProductTypeId', '=', $ProductTypeId)
                        ->where('Status', '=', 'Active')
                        ->get();
                    return json_encode($categories_sub);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return ["o_status_message" => $e->getMessage()];
                }

            }
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    public function getDates(){
        $Date = "";
        date_default_timezone_set("Asia/Dhaka");
        return $Date = date("d/m/Y");
    }
}
