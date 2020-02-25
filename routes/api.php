<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('sms/send', function(Request $request) {

		$url = 'https://api.esms.com.my/sms/send';

		// replace yourusername, yourpassword, and 60123456789 to suits your need
		$data = array(
            'user' => '65f033048fee4bdf902046815a0e0fc5',
			'pass' => 'asyioffgvai19ojdhur4asqc1x936o4gdcrz7h8frh6m8qo5k57qief5k2wdqy2wfdgw94c2lqpi1ikfyxfrzvrpz780rtg6zl11',
			'to' => $request->input('phone'),
            'msg' => 'RM0.00 ' . $request->input('message')
        );

		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded; charset=utf-8",
				'method'  => 'POST',
				'content' => http_build_query($data)
			)
        );

		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		if ($result === FALSE) { /* Handle error */ }

		dd($result);
});
