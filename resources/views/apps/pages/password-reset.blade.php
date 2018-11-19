<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{url('theme/login/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('theme/login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('theme/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('theme/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('theme/login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{url('theme/login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('theme/login/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('theme/login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{url('theme/login/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('theme/login/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('theme/login/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url("{{asset('theme/login/images/bg-01.jpg')}}");">
      
      <div class="wrap-login100 p-b-100">
        <div class="login100-form-title">
            <img class="img-responsive " src="{{url('theme/images/company_logo.png')}}" width="250" alt="image clock">
          </div>
        
        <form method="post" action="" class="login100-form validate-form p-b-33 p-t-5 m-t-40">
          <div class="logoText m-t-20">
            <span class="p-t-30">
             <i class="fa fa-unlock" aria-hidden="true"></i> password-reset
            </span>
            <hr>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Enter Email">
            <input class="input100" type="email" name="email" placeholder="User Email">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>
          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="{{url('theme/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('theme/login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('theme/login/vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{url('theme/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('theme/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('theme/login/vendor/daterangepicker/moment.min.js')}}"></script>
  <script src="{{url('theme/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('theme/login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('theme/login/js/main.js')}}"></script>

</body>
</html>