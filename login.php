<?php
session_start();

if(!isset($_SESSION['username'])){
if(isset($_POST['submit']))
{

  if(!empty($_POST['username']) && !empty($_POST['password']))
  {
    include "dashboard/config/dbconnect.php";
    $user_username = mysqli_real_escape_string($dbc,trim($_POST['username']));
    $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));
    $query = "SELECT *FROM admin_table WHERE adm_username ='$user_username' AND adm_password='$user_password'";
    $data = mysqli_query($dbc,$query) or die("query gagal");
    $user_chaptha = sha1($_POST['captcha']);
    if($_SESSION['captcha']!=$user_chaptha)
    {
        $status = "chaptcha Salah";
    }
    else if(mysqli_num_rows($data)==1)
    {
        $row = mysqli_fetch_array($data);
        $_SESSION['username'] = $row['adm_username'];
        header('location: /dashboard');
    }
    else
    {
        $status = "username atau kata sandi anda salah";
    }

  }

}
else
{
  if(isset($_GET['sendpass']))
  {
    $email = $_GET['sendpass'];
    include "dashboard/config/dbconnect.php";
    $query = "SELECT * FROM admin_table WHERE adm_email = '".$email."'";
    $data = mysqli_query($dbc,$query) or die("query gagal");
    if(mysqli_num_rows($data)==1)
    {
      $row=mysqli_fetch_array($data);
      $username = $row['adm_username'];
      $password = $row['adm_password'];
      $pesan = "username anda adalah $username |||| password anda adalah $password";
      mail($email,"Request Username & Password",$pesan);
      $status = "username dan password sudah dikirim ke email";
      $hijau=true;
    }
    else {
      $status = "email yg anda masukan tidak cocok dengan akun manapun";
    }
  }
  else {
      $status = "";
  }

}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Login - PinjamLCD</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dashboard/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="dashboard/css/colors/green-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <h3 class="box-title m-b-20">Log In</h3>
                    <p style="<?php if(isset($_GET['sendpass']) && $hijau==true) { echo 'color:green'; }else{ echo 'color:red';} ?>"><?php echo $status; ?></p>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" required="" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                          <img src="captcha.php">
                            <input class="form-control" type="text" name="captcha" required="" > </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                             <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5" style="color:green"></i>Forgot password?</a> </div>
                    </div>




                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="submit">Log In</button>
                        </div>
                    </div>

                </form>
                <form class="form-horizontal" id="recoverform" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Need Password</h3>
                            <p class="text-muted">Masukan alamat Email yang terhubung dengan akunmu, kami akan mengirimkan username dan password ke alamat tersebut </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" required="" name="sendpass" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>

    </section>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dashboard/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="dashboard/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dashboard/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dashboard/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
<?php
}

else{
  header('location: /dashboard');
}
?>
