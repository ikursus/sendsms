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

Route::get('/', function () {
    return view('welcome');
});

Route::get('hubungi', function () {
    return view('template_hubungi');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {

    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('/add', 'UserController@create')->name('users.create');
    Route::post('/add', 'UserController@simpan')->name('users.store');
    Route::get('/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::patch('/{id}/edit', 'UserController@update')->name('users.update');
    Route::delete('/{id}', 'UserController@destroy')->name('users.destroy');

});


Route::group(['middleware' => 'auth'], function () {

    Route::resource('sms', 'SmsController');

});



Route::get('sms/send', function () {

    $some_data = array(
        'phone'=>'60176890886',
        'access_key'=>'65f033048fee4bdf902046815a2e0fc1',
        'secret_key'=>'asyioffgvai19ojdhu2tasqc1x93614gdcrz7h8frh6m8qo5k57qief5k2wdqy2wfdgw94c2lqpi1ikfyxfrzvrpz780rtg6zl11',
        'message'=>'sample api sms 2'
      );  
    
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_URL, 'https://app.smshandy.com/api/sms/send');  
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
    
      $result = curl_exec($curl);
      $info = curl_getinfo($curl);  
      curl_close($curl);
      $obj = json_decode($result);
      
      return $result;

});
