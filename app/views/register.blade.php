@extends('main')
@section('title')
	Đăng ký
@endsection

@section('content')
<form method='post' action='{{Asset('register')}}' id='form-register'>
	<h2> Đăng ký</h2>
	<input type ='text' name='username' id='username' placeholder='Username' class='form-control'/>
	<input type ='password' name='password' id='password'  placeholder='Password'  class='form-control'/>
	<input type ='password' name='password_confirmation' id='password_confirmation' placeholder='Re-PassWord'  class='form-control'/>
	<input type ='text' name='email' id='email' placeholder='Email'  class='form-control'/>
	<button class='btn btn-lg btn-primary btn-block'>Đăng ký</button>
</form>
<script type="text/javascript">
$('#form-register').validate({
	rules:{		
		username:{
			required:true,
			minlength:3,
			remote:{
				url:"{{Asset('check/check-username')}}",
				type:"POST"
			}
		},

		password:{
			required:true,
			minlength:6
		},
		password_confirmation:{
			equalTo:'#password'
		},
		email:{
			required:true,
			email:true,
			remote:{
				url:"{{Asset('check/check-email')}}",
				type:"POST"
			}
		}
	},

	messages:{
		username:{
			required:"Vui lòng nhập Username",
			minlength:"Phải nhập từ 3 ký tự trở lên",
			remote:"Username đã tồn tại",
		},
		password:{
			required:"Vui lòng nhập mật khẩu",
			minlength:"Mật khẩu phải có từ 6 ký tự trở lên",
		},
		password_confirmation:{
			equalTo:"Mật khẩu không giống nhau",
		},
		email:{
			required:"Vui lòng nhập  email",
			email:"Không đúng định dạng email",
			remote:"Email này đã tồn tại",
		}
	}
});
</script>
@endsection