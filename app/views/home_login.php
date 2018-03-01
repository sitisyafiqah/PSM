<?php require MODEL_ROOT . '/admin/functions.php' ;?>

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
        <link rel="shortcut icon" href="<?php echo BASE_URL;?>/admin/image/1.JPG"/>
        <link rel="stylesheet" type="text/css" href="style.css">

        <link href="<?php echo BASE_URL;?>/template_calendar/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_URL;?>/template_calendar/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
                    <a class="navbar-brand" href="<?php echo BASE_URL;?>/visitor/index.php">C_Rent</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="index.php"></a>
                        </li>
						<li class="page-scroll">
                            <a href="?pages=score">Feedback</a>
                        </li>
                        <li class="page-scroll">
                            <a href="?pages=register">Sign Up</a>
                        </li>
                        <li class="page-scroll">
                            <a href="?pages=login">Log In</a>
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
        <?php
            
            if ($pages_url == "register")
            {
                require VIEW_ROOT . '/template-login/form-login/form_register.php';
            }
            else
            {
                require VIEW_ROOT . '/template-login/form-login/form_login.php';
            }
            
            ?>
            
<!--
        <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                       <?php 
                        email_check(); 
                        email_success_register();
                        ?>
                        <form role="form" action="" method="post">
                            <?php login_user(); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="user_password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                 //Change this to a button or input when using this as a form 
                                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
        
        
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