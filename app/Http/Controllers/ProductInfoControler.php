<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Input;
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

                $image1=$request['image1'];
                $image2=$request['image2'];
                $image3=$request['image3'];
                $image4=$request['image4'];
                if ($image1){
                    $ran_one=str_random(6);
                    $ext_one=strtolower($image1->getClientOriginalExtension());
                    $one_full_name=$ran_one.'.'.$ext_one;
                    $upload_path_one="public/allImages/productimage/";
                    $image_url_one=$upload_path_one.$one_full_name;
                    $success_one1=$image1->move($upload_path_one,$one_full_name);
                    $data['image1']=$image_url_one;
                }else{
                    $data['image1']="No Image";
                }

                if ($image2){
                    $ran_one=str_random(6);
                    $ext_one=strtolower($image2->getClientOriginalExtension());
                    $one_full_name=$ran_one.'.'.$ext_one;
                    $upload_path_one="public/allImages/productimage/";
                    $image_url_one=$upload_path_one.$one_full_name;
                    $success_one2=$image2->move($upload_path_one,$one_full_name);
                    $data['image2']=$image_url_one;
                }else{
                    $data['image2']="No Image";
                }

                if ($image3){
                    $ran_one=str_random(6);
                    $ext_one=strtolower($image3->getClientOriginalExtension());
                    $one_full_name=$ran_one.'.'.$ext_one;
                    $upload_path_one="public/allImages/productimage/";
                    $image_url_one=$upload_path_one.$one_full_name;
                    $success_one3=$image3->move($upload_path_one,$one_full_name);
                    $data['image3']=$image_url_one;
                }else{
                    $data['image3']="No Image";
                }

                if ($image4){
                    $ran_one=str_random(6);
                    $ext_one=strtolower($image4->getClientOriginalExtension());
                    $one_full_name=$ran_one.'.'.$ext_one;
                    $upload_path_one="public/allImages/productimage/";
                    $image_url_one=$upload_path_one.$one_full_name;
                    $success_one4=$image4->move($upload_path_one,$one_full_name);
                    $data['image4']=$image_url_one;
                }else{
                    $data['image4']="No Image";
                }

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


                $image1=$request['image1'];
                $image2=$request['image2'];
                $image3=$request['image3'];
                $image4=$request['image4'];

                if ($image1){
                    $ran_one=str_random(6);
                    $ext_one=strtolower($image1->getClientOriginalExtension());
                    $one_full_name=$ran_one.'.'.$ext_one;
                    $upload_path_one="public/allImages/productimage/";
                    $image_url_one=$upload_path_one.$one_full_name;
                    $success_one=$image1->move($upload_path_one,$one_full_name);
                    $data['image1']=$image_url_one;

                   // unlink($request['image1']);
                }else{
                    $data['image1']=$request['images1'];
                }

                if ($image2){
                    $ran_one=str_random(6);
                    $ext_one=strtolower($image2->getClientOriginalExtension());
                    $one_full_name=$ran_one.'.'.$ext_one;
                    $upload_path_one="public/allImages/productimage/";
                    $image_url_one=$upload_path_one.$one_full_name;
                    $success_one=$image2->move($upload_path_one,$one_full_name);
                    $data['image2']=$image_url_one;

                    //unlink($request['image2']);
                }else{
                    $data['image2']=$request['images2'];
                }

                if ($image3){
                    $ran_one=str_random(6);
                    $ext_one=strtolower($image3->getClientOriginalExtension());
                    $one_full_name=$ran_one.'.'.$ext_one;
                    $upload_path_one="public/allImages/productimage/";
                    $image_url_one=$upload_path_one.$one_full_name;
                    $success_one=$image3->move($upload_path_one,$one_full_name);
                    $data['image3']=$image_url_one;

                    //unlink($request['image3']);
                }else{
                    $data['image3']=$request['images3'];
                }

                if ($image4){
                    $ran_one=str_random(6);
                    $ext_one=strtolower($image4->getClientOriginalExtension());
                    $one_full_name=$ran_one.'.'.$ext_one;
                    $upload_path_one="public/allImages/productimage/";
                    $image_url_one=$upload_path_one.$one_full_name;
                    $success_one=$image4->move($upload_path_one,$one_full_name);
                    $data['image4']=$image_url_one;

                    //unlink($request['image4']);
                }else{
                    $data['image4']=$request['images4'];
                }


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

        $UserInfo = DB::select("SELECT tb1.ProductID,tb6.name as ProductType,tb2.name as Category ,tb5.name as SubCategory,
        DisplayType,Description,Details,Material,Care,PriceMRP,PriceDiscount,tb1.Status,
        tb1.CreateBy,tb1.CreateDate,tb1.UpdateBy,tb1.UpdateDate 
        FROM productinfo tb1,productcategory tb2,productsubcategory tb5,producttype tb6
        where tb1.Status != 'Delete'
        AND tb1.ProductType =tb6.ProductTypeId
        AND tb1.Category =tb2.ProductCategoryId
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

    public function getSingleProductInfo($ProductID){

        $ProductsInfo = DB::select("SELECT TB1.ProductID,TB1.ProductType, TB1.ProductType,
        TB2.Name as ProductTypeName,TB1.Color,TB4.Name as ColorName, TB1.Category,
        TB5.Name as CategoryName, TB1.SubCategory,TB3.Name as SubCategoryName,
        TB1.DisplayType, TB1.Description, TB1.Details, TB1.Material, TB1.Care,
        TB1.PriceMRP, TB1.PriceDiscount, TB1.image1, TB1.image2, TB1.image3,
        TB1.image4, TB1.Status, TB1.CreateBy, TB1.CreateDate, TB1.UpdateBy,
        TB1.UpdateDate 
        FROM productinfo TB1,producttype TB2,productsubcategory TB3,productcolor TB4,productcategory TB5
        WHERE TB1.ProductType = TB2.ProductTypeId
        AND TB1.Color = TB4.ProductColorId
        AND TB1.Category = TB5.ProductCategoryId
        AND TB1.SubCategory = TB3.ProductSubCategoryId
        AND TB1.ProductID = '$ProductID';");

		return view('product_view',['ProductsInfo'=>$ProductsInfo]);
    }

    public function addToCart(){
        try {
            if (request()->input('ViewType')=="DeleteToCard"){
                try {

                    $data['Status'] = "Delete";
                    DB::table('shopingcard')
                        ->where('ShopingCardID', request()->input('ShopingCardID'))
                        ->update($data);
                    return json_encode(array(
                        "statusCode" => 200,
                        "statusMsg" => "Product Remove from Cart Successfully !"
                    ));
                } catch (\Exception $e) {

                    return json_encode(array(
                        "statusCode" => 400,
                        "statusMsg" => "Product Remove from Cart Failed !"
                    ));;
                }

            }else{
                $data = array();
                $data['ProductID'] = request()->input('ProductID');
                $data['CustomerID'] =  request()->input('CustomerID');
                $data['ProductCode'] =  request()->input('ProductID');
                $data['Quantity'] =  request()->input('Quantity');
                $data['Status'] =  "P";
                $data['CreateBy'] = request()->input('CustomerID');
                $data['CreateDate'] = $this->getDates();
                $data['UpdateBy'] = "";
                $data['UpdateDate'] = "";


                $result = DB::table('shopingcard')->insert($data);
                if($result){
                    return json_encode(array(
                        "statusCode" => 200,
                        "statusMsg" => "Product Add to Cart Successfully !"
                    ));
                }else{
                    return json_encode(array(
                        "statusCode" => 201,
                        "statusMsg" => "Product Add to Cart Failed !"
                    ));
                }
            }

        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
/*        return json_encode($data );*/
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

    public function ProductByCatSubCat($ProductSubCategoryId){

        $AllProducts = DB::select("SELECT TB1.ProductID, TB1.ProductType,
                                    TB2.Name as ProductTypeName,TB1.Color,TB4.Name as ColorName, TB1.Category,
                                    TB5.Name as CategoryName, TB1.SubCategory,TB3.Name as SubCategoryName,
                                    TB1.DisplayType, TB1.Description, TB1.Details, TB1.Material, TB1.Care,
                                    TB1.PriceMRP, TB1.PriceDiscount, TB1.image1, TB1.image2, TB1.image3,
                                    TB1.image4, TB1.Status, TB1.CreateBy, TB1.CreateDate, TB1.UpdateBy,
                                    TB1.UpdateDate 
                                    FROM productinfo TB1,producttype TB2,productsubcategory TB3,productcolor TB4,productcategory TB5
                                    WHERE TB1.ProductType = TB2.ProductTypeId
                                    AND TB1.Color = TB4.ProductColorId
                                    AND TB1.Category = TB5.ProductCategoryId
                                    AND TB1.SubCategory = TB3.ProductSubCategoryId
                                    and TB1.SubCategory = '$ProductSubCategoryId';");
        return view('filtter_shop', ['AllProducts' => $AllProducts]);

        //return view("filtter_shop");*/
    }

    public function getDates(){
        $Date = "";
        date_default_timezone_set("Asia/Dhaka");
        return $Date = date("d/m/Y");
    }
}
