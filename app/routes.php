<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('prefix'=>'check'),function() {
	Route::post('check-username',function(){
		if(User::checkIfExistUsername(Input::get('username')))
			return "true";
		else return "false";
	});
/*	Route::post('check-email',function(){
		if(User::checkIfExistEmail(Input::get('email')))
			return "true";
		else return "false";

	});*/
});

Route::get('register',function()
{
	return View::make('register');//template
}
);

Route::filter('check-login',function(){
	if(!Session::has('logined'))
		return Redirect::to('login');
});



Route::get('login',function() 
	{
		return View::make('login');//template
	}
);



Route::post('login',function() 
	{
		if(User::checkIfLogInOk(Input::get('user_input'),hash('sha256',Input::get('password'))))
			{
				Session::put('logined','true');
                Session::put('current_user', Input::get('user_input'));
				return Redirect::to('listproduct');
			}
			
		else
			{
				return View::make('login')->with('error_message','Tên đăng nhập hoặc mật khẩu không đúng');
			}
	}
);

Route::get('logout',function(){
	Session::forget('logined');
	//return Redirect::to('login');
    return Redirect::to('/login')
        ->with('message', 'You are now logged out');
});


Route::get("cartdetail", function(){
	return View::make("cartdetail");

});

Route::group(array('before'=>'check-login'),function() {
	Route::resource('listproduct', 'ProductController');//use ProductController.php
	Route::resource('employee' , 'EmployeeController@salaryCalculate' );
	Route::resource('salary' , 'SalaryController@salaryCalculate' );
	Route::resource('salary' , 'SalaryController' );
	Route::resource('cartdetail' , 'OrderDetailController' );

});



