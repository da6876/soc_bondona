<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Web Customer Routes Start
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/nav', function () {
    return view('nav');
});
Route::get('/homes', function () {
    return view('homes');
});
Route::get('/product_view', function () {
    return view('product_view');
});
Route::get('product_views/{id}', 'ProductInfoControler@getSingleProductInfo');


Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/shop', function () {
    return view('shop');
});
Route::get('ProductByCategories/{id}', 'ProductInfoControler@ProductByCatSubCat');

Route::get('/cart', function () {
    return view('cart');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/OrderInfo', function () {
    return view('order_info');
});
Route::post('AddToCart','ProductInfoControler@addToCart');
Route::get('LogoutCus','CustomerInfoController@usersLogOut');
Route::post('CustLogin','CustomerInfoController@customerLogin');
Route::post('PlaceOrder','CustomerInfoController@custPlaceOrder');

/*
|--------------------------------------------------------------------------
| Web Customer Routes End
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Web Admin Routes Start
|--------------------------------------------------------------------------
*/

/* Auth Start*/
Route::resource('UserInfo','UserInfoControler');
Route::get('/get/all/UserInfo','UserInfoControler@getAllUserInfo')->name('all.UserInfo');
Route::get('UserLogin','UserInfoControler@Login');
Route::get('ChangePassword','UserInfoControler@changePasswordsPG');
Route::post('ChangePasswordRe','UserInfoControler@changePasswords');
Route::post('UserLoginRe','UserInfoControler@userLogin');
Route::get('Logout','UserInfoControler@usersLogOut');
/* Auth End*/

Route::resource('DashBord','DashBordController');

Route::resource('ProductCategory','ProductCategoryControler');
Route::post('ShowCategory','ProductCategoryControler@ShowCategory');
Route::get('/get/all/Category','ProductCategoryControler@getProductCategory')->name('all.Category');

Route::resource('ProductSubCategory','ProductSubCategoryControler');
Route::get('/get/all/ProductSubCategory','ProductSubCategoryControler@getProductSubCategory')->name('all.ProductSubCategory');

Route::resource('ProductColor','ProductColorControler');
Route::get('/get/all/Color','ProductColorControler@getProductColor')->name('all.Color');

Route::resource('ProductType','ProductTypeControler');
Route::post('ShowProductType','ProductTypeControler@ShowProductType');
Route::get('/get/all/ProductType','ProductTypeControler@getProductType')->name('all.ProductType');

Route::resource('ProductInfo','ProductInfoControler');
Route::post('ShowSubList','ProductInfoControler@ShowSubList');
Route::get('/get/all/ProductInfo','ProductInfoControler@getAllProductInfo')->name('all.ProductInfo');

Route::resource('ProductStock','ProductStockController');
Route::post('checkAPI','ProductStockController@checkAPI');
Route::get('/get/all/ProductStock','ProductStockController@getProductType')->name('all.ProductType');

Route::resource('ProductSize','ProductSizeControler');
Route::get('/get/all/ProductSize','ProductSizeControler@getProductSize')->name('all.ProductSize');


Route::resource('MenuItem','MenuItemController');
Route::get('/get/all/MenuItem','MenuItemController@getMenuItem')->name('all.MenuItem');


Route::resource('CustomerInfo','CustomerInfoController');
Route::get('/get/all/CustomerInfo','CustomerInfoController@getCustomerInfo')->name('all.CustomerInfo');
/*
|--------------------------------------------------------------------------
| Web Admin Routes End
|--------------------------------------------------------------------------
|
*/