<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use Session;
use Redirect;

class UserInfoControler extends Controller{
    
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
            return view('admin.user_info');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    public function Login(){
        return view('admin.user_login');
    }

    public function changePasswordsPG(){
        return view('change_password');
    }

    public function store(Request $request){
        try {
            if ($request['UserID']==""){
                $data = array();
                if($request['Primary1']=="1"){
                    $data['LoginID'] = $request['MobileNo'];
                }elseif($request['Primary2']=="1"){
                    $data['LoginID'] = $request['Email'];
                }else{
                    $data['LoginID'] = $this->generateRandomString();
                }
                $data['UserType'] = $request['UserType'];
                try {
                    $userPassword = $this->encrypData('UserPasswordEncrypt', $request['Password']);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return json_encode(array(
                        "statusCode" => 201,
                        "statusMsg" => "Password Encryp Failed !!"
                    ));
                }
                $data['Password'] = $userPassword;
                $data['FullName'] = $request['FullName'];
                $data['MobileNo'] = $request['MobileNo'];
                $data['Email'] = $request['Email'];
                $data['Address'] = $request['Address'];
                $data['Status'] = $request['Status'];
                $data['CreateBy'] = Session::get('Admin_UserID');
                $data['CreateDate'] = $this->getDates();
                $data['UpdateBy'] = "";
                $data['UpdateDate'] = "";

                $result = DB::table('userinfo')->insert($data);
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "User Type Added Successfully"
                ));

            }else{

                $data = array();
                if($request['Primary1']=="1"){
                    $data['LoginID'] = $request['MobileNo'];
                }elseif($request['Primary2']=="1"){
                    $data['LoginID'] = $request['Email'];
                }else{
                    $data['LoginID'] = $this->generateRandomString();
                }
                $data['UserType'] = $request['UserType'];
                try {
                    $userPassword = $this->encrypData('UserPasswordEncrypt', $request['Password']);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return json_encode(array(
                        "statusCode" => 201,
                        "statusMsg" => "Password Encryp Failed !!"
                    ));
                }
                $data['Password'] = $userPassword;
                $data['FullName'] = $request['FullName'];
                $data['MobileNo'] = $request['MobileNo'];
                $data['Email'] = $request['Email'];
                $data['Address'] = $request['Address'];
                $data['Status'] = $request['Status'];
                $data['UpdateBy'] = Session::get('Admin_UserID');
                $data['UpdateDate'] =  $this->getDates();


                DB::table('userinfo')
                    ->where('UserID', $request['UserID'])
                    ->update($data);

                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "User Update Successfully"
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
            $singleDataShow = DB::table('userinfo')
                ->where('UserID', $id)
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
            DB::table('userinfo')
                    ->where('UserID', $id)
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

    public function getAllUserInfo(){

        $UserInfo = DB::select("SELECT UserID,LoginID,UserType,Password,FullName,MobileNo,
        Email,Address,Status,CreateBy,CreateDate,UpdateBy,UpdateDate FROM userinfo where Status BETWEEN 'Active' AND 'InActive' AND Status !='Delete';");

        return DataTables::of($UserInfo)
            ->addColumn('action', function ($UserInfo) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showUserInfoData(' . $UserInfo->UserID . ')" role="button" href="#" class="btn btn-success btn-sm">Edit</a>
                    <a onclick="deleteUserInfoData(' . $UserInfo->UserID . ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }


    public function changePasswords(Request $request){
        try {
            $user_info_id = Session::get('Admin_UserID');
            try {
                $old_password = $this->encrypData('UserPasswordEncrypt', $request['inoldpassword']);
                $new_password = $this->encrypData('UserPasswordEncrypt', $request['innewpassword']);
            } catch (\Exception $e) {
                DB::rollBack();
                return json_encode(array(
                    "statusCode" => 201,
                    "statusMsg" => "Password Encryp Failed !!"
                ));
            }
            $invoice_ext_sql = DB::select("SELECT COUNT(user_info_id) as user_info_id  FROM userinfo 
                        WHERE Password = '$old_password' and user_info_id = '$user_info_id';");
            $user_info_ids = $invoice_ext_sql[0]->user_info_id;

            if ($user_info_ids == "1") {
                $data = array();
                $data['password'] = $new_password;
                DB::table('user_info')
                    ->where('user_info_id', $user_info_id)
                    ->update($data);
                Session::flush();
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Password Change Successfully !!"
                ));
            } else {
                return json_encode(array(
                    "statusCode" => 205,
                    "statusMsg" => "Old Password Don't Match !!".$user_info_id
                ));
            }
        } catch (\Exception $e) {
            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function userLogin(Request $request){
        try {
            $userName = $request['inemail'];

            try {
                $userPassword = $this->encrypData('UserPasswordEncrypt', $request['idpassword']);
            } catch (\Exception $e) {
                DB::rollBack();
                return json_encode(array(
                    "statusCode" => 201,
                    "statusMsg" => "Password Encryp Failed !!"
                ));
            }

            $userPassword = $userPassword;

            $UserInfo = DB::select("SELECT UserID,LoginID,UserType,Password,FullName,MobileNo,
                                Email, Address,Status
                                FROM userinfo
                                WHERE LoginID = '$userName'
                                AND password = '$userPassword'
                                AND Status BETWEEN 'Active' AND 'ROOT'");

            if ($UserInfo) {
                Session::put('Admin_UserID', $UserInfo[0]->UserID);
                Session::put('Admin_LoginID', $UserInfo[0]->LoginID);
                Session::put('Admin_UserType', $UserInfo[0]->UserType);
                Session::put('Admin_Password', $UserInfo[0]->Password);
                Session::put('Admin_FullName', $UserInfo[0]->FullName);
                Session::put('Admin_MobileNo', $UserInfo[0]->MobileNo);
                Session::put('Admin_Email', $UserInfo[0]->Email);
                Session::put('Admin_Address', $UserInfo[0]->Address);
                Session::put('Admin_Status', $UserInfo[0]->Status);

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
        return Redirect::to('UserLogin');
    }

    public function encrypData($ViewType, $data){

        $ciphering = "AES-128-CTR";

        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '6876199612231998';
        $encryption_key = "EncryptDhaliAbir";

        if ($ViewType == "UserPasswordEncrypt") {
            try {
                $encryption = openssl_encrypt($data, $ciphering,
                    $encryption_key, $options, $encryption_iv);
                return $encryption;
            } catch (\Exception $e) {
                DB::rollBack();
                ["o_status_message" => $e->getMessage()];
                return json_encode(array(
                    "statusCode" => $e->getMessage()
                ));
            }
        } elseif ($ViewType == "UserPasswordDeEncrypt") {
            try {
                $decryption = openssl_decrypt($data, $ciphering,
                    $encryption_key, $options, $encryption_iv);
                return $decryption;
            } catch (\Exception $e) {
                DB::rollBack();
                ["o_status_message" => $e->getMessage()];
                return json_encode(array(
                    "statusCode" => $e->getMessage()
                ));
            }
        }

    }

    public function generateRandomString() {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function getDates(){
        $Date = "";
        date_default_timezone_set("Asia/Dhaka");
        return $Date = date("d/m/Y");
    }
}
