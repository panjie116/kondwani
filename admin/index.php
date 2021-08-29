<?php 

include 'includes/conn.php';

//error_reporting(0);
session_start();


$message='';
if(isset($_POST['login'])){

    $username =htmlentities(mysqli_escape_string($con,$_POST['username']));
    $password = htmlentities(mysqli_escape_string($con,$_POST['password']));

    $query=mysqli_query($con,"SELECT * FROM tbladmin WHERE username ='$username' AND password='$password'");
    if(mysqli_num_rows($query) == 1){

        $row=mysqli_fetch_array($query);

             $dbusername=$row['username'];
             $firstname=$row['fname'];
             $email=$row['email'];
             $dbpassword=$row['password'];
             $images=$row['picture'];
             /// aunthentication

             if($dbusername == $username && $dbpassword == $password ){
             

                        $_SESSION['username']=$username;
                        $_SESSION['email']=$email;

                        $message=$_SESSION['username'];

                            echo " <script type='text/javascript'>
                                        window.location='main/dashboard.html';
                                    </script>";

                              }
                else{
                    $message=" <div class='alert alert-danger' role='alert'>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      <strong>Wrong</strong> credetials!
                    </div>";

                } 

              

        }

        else{

                 $message=" <div class='alert alert-danger' role='alert'>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      <strong>User</strong> not found!
                    </div>";

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
    <title>Portfolio</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="main/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="main/css/style.css" rel="stylesheet">
    
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
   
</head>

<body class="card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Kondwani</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="index.php" method="post">
                        <h3 class="box-title m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" name="username" type="text" required="" placeholder="username"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="password" type="password" required="" placeholder="password"> </div>
                        </div>

                          <?php echo$message;  ?>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-info pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox" class="filled-in chk-col-light-blue">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit" name="login">Log In</button>
                            </div>
                        </div>
                       
                    </form>
                    <form class="form-horizontal" id="recoverform" action="">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>

                                <br><br>
                               
                                 <a href="index.html" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Login?</a> </div>
                                
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
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    
</body>

</html>