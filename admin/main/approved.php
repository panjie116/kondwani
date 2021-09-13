<?php 
include '../includes/conn.php';
//error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../index.php');
} else{
if( $_GET['disid'])
{
    $id=intval($_GET['disid']);
    $query=mysqli_query($con,"update tblcomments set status='0' where id='$id'");
    $msg="Comment unapproved";
}
// Code for restore
if($_GET['appid'])
{
    $id=intval($_GET['appid']);
    $query=mysqli_query($con,"update tblcomments set status='1' where id='$id'");
    $msg="Comment approved";
}

// Code for deletion
if($_GET['action']=='del' && $_GET['rid'])
{
    $id=intval($_GET['rid']);
    $query=mysqli_query($con,"delete from  tblcomments  where id='$id'");
    $delmsg="Comment deleted forever";
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

      <!-- Bootstrap responsive table CSS -->
    <link href="../assets/plugins/tablesaw-master/dist/tablesaw.css" rel="stylesheet">
   
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
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                           <i class="wi wi-sunset"></i>      
                           
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
                                <li><a class="active" href="#">Profile</a></li>
                                <li><a href="setting.php">Settings</a></li>
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
            <div class="container-fluid ">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"> Approved comments</h3>
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
                   <div class="col-12">
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Comments List</h4>
                                <table class="tablesaw table-bordered table-hover table"  data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                                    <thead>
                                        <tr>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">#</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Name</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Email</th>
                                            <th scope="col" data-tablesaw-sortable-col  data-tablesaw-priority="3" width="200">Comment</th>
                                            <th scope="col" data-tablesaw-sortable-col  data-tablesaw-priority="3">Status</th>
                                            <th scope="col" data-tablesaw-sortable-col  data-tablesaw-priority="3">News</th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="2">Date</th>
                                            <th scope="col"  data-tablesaw-priority="4">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                    <?php 
                    $query=mysqli_query($con,"Select tblcomments.id,  tblcomments.name,  tblcomments.status ,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle from  tblcomments join tblposts on tblposts.id=tblcomments.postId where tblcomments.status=1");
                    $cnt=1;
                    while($row=mysqli_fetch_array($query))
                    {
                    ?>

                     <tr>
                    <th scope="row"><?php echo htmlentities($cnt);?></th>
                    <td><?php echo htmlentities($row['name']);?></td>
                    <td><?php echo htmlentities($row['email']);?></td>
                    <td><?php echo htmlentities($row['comment']);?></td>
                    <td> 
                    <span class="label label-success">
                        
                         <?php $st=$row['status'];
                    if($st=='0'):
                    echo "Unapproved";

                    else:
                    echo "Approved";
                    endif;
                    ?>
                    </span>

                    </td>


                <td><a href="edit-post.php?pid=<?php echo htmlentities($row['postid']);?>"><?php echo htmlentities($row['PostTitle']);?></a> </td>
                <td><?php echo htmlentities($row['postingDate']);?></td>
                <td>
                <?php if($st=='0'):?>
                    <a href="unapprove-comment.php?disid=<?php echo htmlentities($row['id']);?>" title="Disapprove this comment"><i class="fa fa-trash-o" style="color: #29b6f6;"></i></a> 
                <?php else :?>
                  <a href="unapprove-comment.php?appid=<?php echo htmlentities($row['id']);?>" title="Approve this comment"><i class="fa fa-trash-o" style="color: green;"></i></a> 
                <?php endif;?>

                    &nbsp;<a href="unapprove-comment.php?rid=<?php echo htmlentities($row['id']);?>&&action=del"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
                </tr>
                <?php
            $cnt++;
             } ?>

                                    </tbody>
                                </table>
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

      <!-- jQuery peity -->
    <script src="../assets/plugins/tablesaw-master/dist/tablesaw.js"></script>
    <script src="../assets/plugins/tablesaw-master/dist/tablesaw-init.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
</body>



</html>

<?php } ?>