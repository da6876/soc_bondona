<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;

class CustomerInfoController extends Controller
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
            return view('admin.customer_info');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }


    public function store(Request $request){
        try {
            if ($request['CustomerID']==""){
                $data = array();
                if($request['Primary1']=="1"){
                    $LoginID = $request['MobileNo'];
                }elseif($request['Primary2']=="1"){
                    $LoginID = $request['Email'];
                }else{
                    $LoginID = "NO AA";
                }
                
                $data['LoginID'] = $LoginID;
                $data['Password'] = md5($request['Password']);
                $data['FirstName'] = $request['FirstName'];
                $data['LastName'] = $request['LastName'];
                $data['MobileNo'] = $request['MobileNo'];
                $data['Email'] = $request['Email'];
                $data['Address'] = $request['Address'];
                if($request['ViewType']=="Admin"){
                    $data['CreateBy'] = Session::get('Admin_UserID');
                    $data['Status'] = $request['Status'];
                }else{
                    $data['CreateBy'] = $LoginID;
                    $data['Status'] = "Active";
                }
                $data['CreateDate'] = $this->getDates();
                $data['UpdateBy'] = "";
                $data['UpdateDate'] = "";

                $image1=$request['picture'];
                if ($image1){
                    $ran_one=str_random(6);
                    $ext_one=strtolower($image1->getClientOriginalExtension());
                    $one_full_name=$ran_one.'.'.$ext_one;
                    $upload_path_one="public/allImages/CustomerImage/";
                    $image_url_one=$upload_path_one.$one_full_name;
                    $success_one1=$image1->move($upload_path_one,$one_full_name);
                    $data['picture']=$image_url_one;
                }else{
                    $data['picture']="No Image";
                }

                $result = DB::table('customerinfo')->insert($data);
                
                if($request['ViewType']=="Admin"){
                    return json_encode(array(
                        "statusCode" => 200,
                        "statusMsg" => "Customer Added Successfully"
                    ));
                }else{
                    /* return json_encode(array(
                        "statusCode" => 200,
                        "statusMsg" => "Customer Added Successfully"
                    )); */
                    //$this->customerCheckUP($LoginID,$request['Password']);
                    $userName = $LoginID;
                    $userPassword =md5($request['Password']);

                    $UserInfo = DB::select("SELECT CustomerID,LoginID,Password,FirstName,LastName,picture,
                                        MobileNo, Address,Email,Status
                                        FROM customerinfo
                                        WHERE LoginID = '$userName'
                                        AND Password = '$userPassword'
                                        AND Status = 'Active'");

                    if ($UserInfo) {
                        Session::put('CustomerID', $UserInfo[0]->CustomerID);
                        Session::put('Customer_LoginID', $UserInfo[0]->LoginID);
                        Session::put('Customer_FirstName', $UserInfo[0]->FirstName);
                        Session::put('Customer_LastName', $UserInfo[0]->LastName);
                        Session::put('Customer_picture', $UserInfo[0]->picture);
                        Session::put('Customer_Email', $UserInfo[0]->Email);
                        Session::put('Customer_MobileNo', $UserInfo[0]->MobileNo);
                        Session::put('Customer_Address', $UserInfo[0]->Address);
                        Session::put('Customer_Status', $UserInfo[0]->Status);

                        return json_encode(array(
                            "statusCode" => 200
                        ));

                    } else {
                        return json_encode(array(
                            "statusCode" => 201,
                            "RealPass" => $request['idpassword'],
                            "EncPass" => $userPassword,
                            "sss" => json_encode($UserType)
                        ));
                    }

                }

            }
            
            else{

                $data = array();
                $data['LoginID'] = $request['LoginID'];
                $data['Password'] = $request['Password'];
                $data['FirstName'] = $request['FirstName'];
                $data['LastName'] = $request['LastName'];
                $data['picture'] = $request['picture'];
                $data['MobileNo'] = $request['MobileNo'];
                $data['Email'] = $request['Email'];
                $data['Address'] = $request['Address'];
                $data['Status'] = $request['Status'];
                $data['UpdateBy'] = Session::get('Admin_UserID');
                $data['UpdateDate'] =  $this->getDates();


                DB::table('customerinfo')
                    ->where('CustomerID', $request['CustomerID'])
                    ->update($data);

                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Customer Update Successfully"
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
            $singleDataShow = DB::table('customerinfo')
                ->where('CustomerID', $id)
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
            DB::table('customerinfo')
                    ->where('CustomerID', $id)
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

    public function getCustomerInfo(){

        $UserInfo = DB::select("SELECT CustomerID,LoginID,Password,FirstName,LastName,
        picture,MobileNo,Email,Address,Status,CreateBy,CreateDate,UpdateBy,
        UpdateDate FROM customerinfo where Status!='Delete';");

        return DataTables::of($UserInfo)
            ->addColumn('action', function ($UserInfo) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showUserInfoData(' . $UserInfo->CustomerID . ')" role="button" href="#" class="btn btn-success btn-sm">Edit</a>
                    <a onclick="deleteUserInfoData(' . $UserInfo->CustomerID . ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }

    public function ShowCategory(){
        try {
            $ViewType = request()->input('ViewType');

            if ($ViewType == "Categorie") {

                try {
                    $categories_sub = DB::table('productcategory')
                        ->where('Status', 'Active')
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


    public function customerLogin(Request $request){
        try {
            $userName = $request['LoginID'];
            $userPassword =$request['Password'];

            $UserInfo = DB::select("SELECT CustomerID,LoginID,Password,FirstName,LastName,picture,
                                MobileNo, Address,Email,Status
                                FROM customerinfo
                                WHERE LoginID = '$userName'
                                AND Password = '$userPassword'
                                AND Status = 'Active'");

            if ($UserInfo) {
                Session::put('CustomerID', $UserInfo[0]->CustomerID);
                Session::put('Customer_LoginID', $UserInfo[0]->LoginID);
                Session::put('Customer_FirstName', $UserInfo[0]->FirstName);
                Session::put('Customer_LastName', $UserInfo[0]->LastName);
                Session::put('Customer_picture', $UserInfo[0]->picture);
                Session::put('Customer_Email', $UserInfo[0]->Email);
                Session::put('Customer_MobileNo', $UserInfo[0]->MobileNo);
                Session::put('Customer_Address', $UserInfo[0]->Address);
                Session::put('Customer_Status', $UserInfo[0]->Status);

                return json_encode(array(
                    "statusCode" => 200
                ));

            } else {
                return json_encode(array(
                    "statusCode" => 201,
                    "RealPass" => $request['idpassword'],
                    "EncPass" => $userPassword,
                    "sss" => json_encode($UserType)
                ));
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return json_encode(array(
                "statusCode" => 201,
                "statusMsg" => $e->getMessage()
            ));
        }
    }

    public function customerCheckUP($userName,$userPassword){
        try {
            $userName = $userName;
            $userPassword =md5($userPassword);

            $UserInfo = DB::select("SELECT CustomerID,LoginID,Password,FirstName,LastName,picture,
                                MobileNo, Address,Email,Status
                                FROM customerinfo
                                WHERE LoginID = '$userName'
                                AND Password = '$userPassword'
                                AND Status = 'Active'");

            if ($UserInfo) {
                Session::put('CustomerID', $UserInfo[0]->CustomerID);
                Session::put('Customer_LoginID', $UserInfo[0]->LoginID);
                Session::put('Customer_FirstName', $UserInfo[0]->FirstName);
                Session::put('Customer_LastName', $UserInfo[0]->LastName);
                Session::put('Customer_picture', $UserInfo[0]->picture);
                Session::put('Customer_Email', $UserInfo[0]->Email);
                Session::put('Customer_MobileNo', $UserInfo[0]->MobileNo);
                Session::put('Customer_Address', $UserInfo[0]->Address);
                Session::put('Customer_Status', $UserInfo[0]->Status);

                return json_encode(array(
                    "statusCode" => 200
                ));

            } else {
                return json_encode(array(
                    "statusCode" => 201,
                    "RealPass" => $request['idpassword'],
                    "EncPass" => $userPassword,
                    "sss" => json_encode($UserType)
                ));
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return json_encode(array(
                "statusCode" => 201,
                "statusMsg" => $e->getMessage()
            ));
        }
    }

    public function usersLogOut(){
        Session::flush();
        return Redirect::to('/');
    }


    public function getDates(){
        $Date = "";
        date_default_timezone_set("Asia/Dhaka");
        return $Date = date("d/m/Y");
    }
    
}
