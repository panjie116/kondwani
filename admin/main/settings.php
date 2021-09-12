<?php 
include '../includes/conn.php';

//error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../index.php');
} else {

    $error ="";
    $msg="";


    if(isset($_POST['update']))
{
        $user= $_SESSION['username'];


        $fname=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $query=mysqli_query($con,"update tbladmin set fname='$fname', email='$email', phone ='$phone', address='$address' where username='$user'");
        if($query)
        {
            $msg="Profile updated ";
        }
        else{
               $error="Something went wrong . Please try again.";    
            } 

        }


        if(isset($_POST['password'])){
           $q=mysqli_query($con,"select * from tbladmin where username='".$_SESSION['username']."'");
           $n=  mysqli_fetch_assoc($q);

           $user= $_SESSION['username'];
           $oldPass=$_POST['currentPassword'];
           $newpass=$_POST['newPassword'];
           
          

           if ($oldPass == $n["password"]) {
                $query= mysqli_query($con, "UPDATE tbladmin set password= '$newpass' WHERE username='".$_SESSION['username']."'");
                if($query){
                   $msg = "Password Changed";  
                }
                else{
                    $error = "Something went wrong . Please try again.";
                }
               
            } else{
                $error = "Current Password is not correct";

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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Portfolio</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="../assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="css/pages/dashboard1.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
   
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Kho</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                    
                       
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                                             <?php 
                                             $user= $_SESSION['username'];
                                                $query=mysqli_query($con,"SELECT * FROM tbladmin WHERE username = '$user' ");

                                                  while($row=mysqli_fetch_array($query)){

                                             ?>
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/<?php
                                                echo htmlentities($row['picture']);?>" alt="<?php echo htmlentities($row['picture']); ?>" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="../assets/images/users/<?php
                                                echo htmlentities($row['picture']);?>" alt="<?php echo htmlentities($row['picture']); ?>"></div>
                                            <div class="u-text">
                                                <h4> <?php echo htmlentities($row['username']); ?> </h4>
                                                <p class="text-muted"> <?php echo htmlentities($row['email']) ?> </p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>

                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="profile.php"><i class="ti-user"></i> My Profile</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="settings.php"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php 
                         $user= $_SESSION['username'];
                            $query=mysqli_query($con,"SELECT * FROM tbladmin WHERE username = '$user' ");

                              while($row=mysqli_fetch_array($query)){

                         ?>
                        <li class="user-profile"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><img src="../assets/images/users/<?php
                         echo htmlentities($row['picture']);?>" alt="<?php echo htmlentities($row['picture']); ?>" /><span class="hide-menu"> <?php echo htmlentities($row['username']) ?> </span></a>
                           <?php   } ?>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="profile.php">My Profile </a></li>
                                <li><a href="settings.php">Account Setting</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">Admin</li>
                        <li> <a class="has-arrow waves-effect waves-dark active" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Home <span class="label label-rouded label-themecolor pull-right">3</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Dashboard </a></li>
                                <li><a  href="profile.php">Profile</a></li>
                                <li><a class="active" href="setting.php">Settings</a></li>
                            </ul>
                        </li>

                          </li>
                          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Categories <span class="label label-rouded label-themecolor pull-right">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add-category.php">Add category</a></li>
                                <li><a href="list-categories.php">List Categories</a></li>
                            </ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Posts <span class="label label-rouded label-themecolor pull-right">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add-post.php">Add Post</a></li>
                                <li><a href="list-posts.php">List Posts</a></li>
                            </ul>
                        </li>


                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Auto-Biography<span class="label label-rouded label-themecolor pull-right">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add-update.php">Add update</a></li>
                                <li><a href="list-updates.php">List updates</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Comments<span class="label label-rouded label-themecolor pull-right">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="unapproved.php">To-be approved</a></li>
                                <li><a href="approved.php">Approved</a></li>
                            </ul>
                        </li>

                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Ads <span class="label label-rouded label-themecolor pull-right">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add-ad.php">Add Ad</a></li>
                                 <li><a href="manage-adds.php">Manage Ads</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid r-aside">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"> Account settings</h3>
                    </div>
                   
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                <div class="col-lg-12 col-xlg-12 col-md-5">
                    
             
                 <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab">Update Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Change Password</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                <!--first tab-->
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                        <?php 
                                         $user= $_SESSION['username'];
                                         $query=mysqli_query($con,"SELECT * FROM tbladmin WHERE username = '$user' ");
                                        
                                        while ($row= mysqli_fetch_array($query)) {
                                            
                                    

                                         ?>

                                            <div class="row">
                                            <div class="col-sm-6">  
                                            <!---Success Message--->  
                                            <?php if($msg){ ?>
                                            <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                                            </div>
                                            <?php } ?>

                                            <!---Error Message--->
                                            <?php if($error){ ?>
                                            <div class="alert alert-danger" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
                                            <?php } ?>


                                            </div>
                                            </div>
                                         <form class="form-horizontal form-material"  name="updatepost" action="settings.php" method="post">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="name" name="name" placeholder="<?php echo $row['fname'] ?>" class="form-control form-control-line" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" id="email" name="email" placeholder="<?php echo $row['email'] ?>" class="form-control form-control-line" name="example-email" id="example-email" required>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="phone" name="phone" placeholder="<?php echo $row['phone'] ?>" class="form-control form-control-line" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Adress</label>
                                                <div class="col-md-12">
                                                    <input type="text"id="address" name="address" placeholder="<?php echo $row['address'] ?>" class="form-control form-control-line" required>
                                                </div>
                                            </div>
                                            
                                          
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="update" class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>

                                    <?php } ?>
                                    </div>
                                </div>
                                 <!--second tab-->
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                         <div class="row">
                                            <div class="col-sm-6">  
                                            <!---Success Message--->  
                                            <?php if($msg){ ?>
                                            <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                                            </div>
                                            <?php } ?>

                                            <!---Error Message--->
                                            <?php if($error){ ?>
                                            <div class="alert alert-danger" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
                                            <?php } ?>


                                            </div>
                                            </div>
                                        <form class="form-horizontal form-material" name="frmChange" method="post" action="#" onSubmit="return validatePassword()">
                                           <div class="form-group">
                                                <label class="col-md-12"> Old Password*</label>
                                                <div class="col-md-12">
                                                    <input type="password" id="currentPassword"  name="currentPassword" value="" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">New Password*</label>
                                                <div class="col-md-12">
                                                    <input type="password" id="newPassword" name="newPassword" value="" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Re-type Password*</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="" id="confirmPassword" name="confirmPassword" class="form-control form-control-line">
                                                </div>
                                            </div>
                                          
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" type="submit" name="password" >Update Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



               </div>    
                

                </div>
                    <!-- Column -->
                <!-- ============================================================== -->
              
                <!-- ============================================================== -->
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2021 Panjie.dev </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
   
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>



    <script type="text/javascript">
         <script>
                function validatePassword() {
                var currentPassword,newPassword,confirmPassword,output = true;

                currentPassword = document.frmChange.currentPassword;
                newPassword = document.frmChange.newPassword;
                confirmPassword = document.frmChange.confirmPassword;

                if(!currentPassword.value) {
                  currentPassword.focus();
                  document.getElementById("currentPassword").innerHTML = "required";
                  output = false;
                }

                
                else if(!newPassword.value) {
                  newPassword.focus();
                  document.getElementById("newPassword").innerHTML = "required";
                  output = false;
                }

                 else if(newPassword.value.length<6) {
                  newPassword.focus();
                  document.getElementById("newPassword").innerHTML = "password must be at least 6 characters long";
                  output = false;
                }

                else if(!confirmPassword.value) {
                  confirmPassword.focus();
                  document.getElementById("confirmPassword").innerHTML = "required";
                  output = false;
                }
                if(newPassword.value != confirmPassword.value) {
                  newPassword.value="";
                  confirmPassword.value="";
                  newPassword.focus();
                  document.getElementById("confirmPassword").innerHTML = "not same";
                  output = false;
                }   
              return output;
                }
      </script>
    </script>
</body>



</html>

<?php } ?>