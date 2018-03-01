<?php require MODEL_ROOT . '/admin/functions.php' ;

 admin_session();

?>

<?php

if(isset ($_GET['pages']))
{
    $pages_url = $_GET['pages'];
}else
{
    $pages_url = "no page";
}

?>



<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Car Rent</title>
        <link rel="shortcut icon" href="image/1.JPG"/>
        <link rel="stylesheet" type="text/css" href="style.css">

     
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo BASE_URL;?>/template_user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="<?php echo BASE_URL;?>/template_user/css/freelancer.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo BASE_URL;?>/template_user/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL;?>/template_user/https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL;?>/template_user/https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!--DataTable CSS -->
    <link href="<?php echo BASE_URL;?>/template_admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    
    <!--DataTable Responsive CSS -->

<link href="<?php echo BASE_URL;?>/template_admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
        
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

        <style>
    a.list-group-item {
    height:auto;
    min-height:220px;
}
a.list-group-item.active small {
    color:#fff;
}
</style>
        
        
    </head>
    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="?pages=no page">C_Rent</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="?pages=no page"></a>
                        </li>
                        <li class="dropdown">
                         <li class="page-scroll">
                            <a href="?pages=add_car">Add Car</a>
                        </li>
<!--
                        <li class="page-scroll">
                            <a href="?pages=manage_car">Manage Car</a>
                        </li>
-->
                        <li class="page-scroll">
                            <a href="?pages=display_score">Score</a>
                        </li>
                        <li class="page-scroll">
                            <a href="?pages=schedule_car">Booking Car</a>
                        </li>
                         <li class="page-scroll">
                            <a href="?pages=logout">Logout</a>
                        </li>
                        <li class="page-scroll">
                            <a href="">Welcome <?php echo $_SESSION['username']?></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        


        <!-- Header -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="intro-text">
                            <span class="name">Car Rent</span>
                            <hr class="star-light">
                            <span class="skills">WE GIVE BEST SERVICE FOR OUR CUSTOMERS</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- About Section -->

<div class="container">
    <div class="row">
        <br>

        
        
        <?php 
                        
                        if ($pages_url == "add_car")
                        {
                            require VIEW_ROOT . '/templates-admin/form-admin/form_add_car.php';
                            
                        }elseif($pages_url == "no page")
                        {
                           //require VIEW_ROOT . '/templates-admin/form-admin/form_all_car.php';
							manage_car();
                            delete_car();
							
                            
                        }elseif($pages_url == "logout")
                        {
                            admin_logout();
                        }
                        elseif($pages_url == "manage_car")
                        {
//                           manage_car();
//                            delete_car();
                            
                        }elseif($pages_url == "edit_car")
                        {
                            require VIEW_ROOT . '/templates-admin/form-admin/form_edit_car.php';
                            
                        }elseif($pages_url == "schedule_car")
                        {
                             schedule_car();
                             deleteschedule_car();
                            
                        }elseif($pages_url == "editschedule_car")
                        {
                            require VIEW_ROOT . '/templates-admin/form-admin/form_editschedule_car.php';
                            
                        }elseif($pages_url == "display_score")
                        {
                          
                            require VIEW_ROOT . '/templates-admin/form-admin/form_displayscore.php';
							
                        }elseif($pages_url == "view_score")
                        {
                          
                            require VIEW_ROOT . '/templates-admin/form-admin/form_viewscore.php';
							
                        }elseif($pages_url == "detail_car")
                        {
                          
                            require VIEW_ROOT . '/templates-admin/form-admin/form_detailcar.php';
                        }
								
                        ?>
        
    </div>
</div>        
        
        <!-- Footer -->
        <footer class="text-center">

            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-4">

                        </div>
                        <div class="footer-col col-md-4">

                        </div>
                        <div class="footer-col col-md-4">

                        </div>
       </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <!-- jQuery -->
        <script src="<?php echo BASE_URL;?>/template_user/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo BASE_URL;?>/template_user/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="<?php echo BASE_URL;?>/template_user/https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="<?php echo BASE_URL;?>/template_user/js/jqBootstrapValidation.js"></script>
        <script src="<?php echo BASE_URL;?>/template_user/js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="<?php echo BASE_URL;?>/template_user/js/freelancer.min.js"></script>
        
        <!-- DataTable JavaScript -->
<script src="<?php echo BASE_URL;?>/template_admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

<script src="<?php echo BASE_URL;?>/template_admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<script src="<?php echo BASE_URL;?>/template_admin/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

<!--page level demo script - table - use for references -->

<script>
    $(document).ready(function()
                     {
                         $('#dataTables-example').DataTable({ responsive: true});
                     });
</script>
        
        
    </body>
    
    </html>