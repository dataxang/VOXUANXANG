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

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix'=>'check'),function() {
	Route::post('check-username',function(){
		if(User::check_username(Input::get('username')))
			return "true";
		else return "false";
	});
	Route::post('check-email',function(){
		if(User::check_email(Input::get('email')))
			return "true";
		else return "false";

	});
});


Route::get('/hello',function() 
{
	return View::make('hellopage');
}
);
Route::get('register',function() 
{
	return View::make('register');//template
}
);

Route::filter('check-login',function(){
	if(!Session::has('logined'))
		return Redirect::to('login');
});

Route::get('edit-profile',array('before'=>'check-login',function(){
	return View::make('edit-profile');
}));

Route::post('register',function() 
{
	$rules=array(
		'username'=>'required|min:3',
		'password'=>'required|min:6',
		'email'=>'required|email',

		);
	if(!Validator::make(Input::all(),$rules)->fails()){
		/*if(!User::check_username(Input::get('username')) &&!User::check_email(Input::get('email')))
		{
			$user = new User();
			$user->username= Input::get('username');
			$user->password= md5(sha1(Input::get('password')));
			$user->email= Input::get('email');
			$user->save();
			Session::put('register_success',Input::get('username')."đã đăng ký thành công");
			return Redirect::to('login');
			//echo "Đăng ký  thành công!";

		}*/

			$user = new User();
			$user->username= Input::get('username');
			$user->password= md5(sha1(Input::get('password')));
			$user->email= Input::get('email');//Temp comment for not using email
			$user->save();
			Session::put('register_success',Input::get('username')." đã đăng ký thành công");
			return Redirect::to('login');
			//echo "Đăng ký  thành công!";


		
	}
	else
		echo "Đăng ký KHÔNG thành công!";
}
);


Route::get('login',function() 
	{
		return View::make('login');//template
	}
);



Route::post('login',function() 
	{
		if(User::check_login(Input::get('user_input'),md5(sha1(Input::get('password')))))
			{
				Session::put('logined','true');
                Session::put('current_user', Input::get('user_input'));
				return Redirect::to('home');
				// return "Đăng nhập  thành công!";
			}
			
		else
			{
				return View::make('login')->with('error_message','Tên đăng nhập hoặc mật khẩu không đúng');
				// return "Đăng nhập KHÔNG thành công!";
			}
	}
);

Route::get('logout',function(){
	Session::forget('logined');
	return Redirect::to('login');
});


Route::get('/home', function()
{
    return View::make('home');

});


Route::get('/about', function()
{
    return View::make('employee.index');

});


Route::get('/contact', function()
{
    return View::make('contact');

});

Route::resource('employee' , 'EmployeeController@CalculateSalary' );
Route::resource('home', 'EmployeeController');//use UController.php