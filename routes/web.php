<?php

use Illuminate\Support\Facades\Route;
use App\Models\Customer;
use App\Http\Controllers\CustomerController as CustomerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GroomServiceController;
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

Route::get('/', function () {
    return view('welcome');
});


//Routes that need authentication
Route::group(['middleware' => ['auth']],function() {
    Route::resource('customer','CustomerController');
    Route::resource('pet','PetController');
    Route::resource('consultation','ConsultationController');
    Route::resource('employee','EmployeeController');
    Route::resource('groomservice','GroomServiceController');
    Route::get('/customer/restore/{id}','CustomerController@restore')->name('customer.restore');
    Route::get('/pet/restore/{id}','PetController@restore')->name('pet.restore');
    Route::get('/employee/restore/{id}','EmployeeController@restore')->name('employee.restore');
    Route::get('/groomservice/restore/{id}','GroomServiceController@restore')->name('groomservice.restore');

    Route::resource('transactions','TransactionController');
    Route::get('/consultationsearch','ConsultationController@search')->name('consultation.search');
    Route::get('/transactionsearch','TransactionController@search')->name('transaction.search');
    Route::get('profile', [
        'uses' => 'UserController@getProfile',
        'as' => 'user.profile',
    ]);

});



Route::resource('consultation','ConsultationController');



// Authentication Routes begin
Route::get('/signup', [
    'uses' => 'UserController@getSignup',
    'as' => 'user.signup',

]);
Route::post('/signup', [
    'uses' => 'UserController@postSignup',
    'as' => 'user.signup',

]);

Route::get('profile', [
    'uses' => 'UserController@getProfile',
    'as' => 'user.profile',
]);

Route::get('/signin', [
    'uses' => 'UserController@getSignin',
    'as' => 'user.signin',
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignin',
    'as' => 'user.signin',
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'user.logout',
]);

// Authentication Routes End


Route::get('/services', [
    'uses' => 'TransactionController@getIndex',
          'as' => 'item.index'
  ]);

  Route::get('add-to-cart/{id}', [
    'uses' => 'TransactionController@getAddToCart',
    'as' => 'item.addToCart',
]);

Route::get('shopping-cart', [
    'uses' => 'TransactionController@getCart',
    'as' => 'item.shoppingCart'
]);

Route::get('remove/{id}',[
    'uses'=>'TransactionController@getRemoveItem',
    'as' => 'item.remove'
]);

Route::get('reduce/{id}',[
    'uses' => 'TransactionController@getReduceByOne',
    'as' => 'item.reduceByOne'
]);

Route::get('checkout',[
    'uses' => 'TransactionController@postCheckout',
    'as' => 'checkout',
    'middleware' =>'auth'
]);


Route::get('/selectowner', [
    'uses' => 'TransactionController@getSelect',
          'as' => 'item.select'
  ]);

Route::resource('comments','CommentController');
Route::get('/serviceview/{id}','CommentController@viewService')->name('item.view');
Route::get('/getreceipt','TransactionController@getReceipt')->name('shop.receipt');
