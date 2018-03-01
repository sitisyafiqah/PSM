<?php

//helper function

function _e($string)
{
    echo htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function last_id()
{
    global $con;

    return mysqli_insert_id($con);
}

function set_message($msg)
{
    if(!empty($msg))
    {
        $_SESSION['message'] = $msg;
    }else
    {
        $msg = "";
    }
}

function display_message()
{
    if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset ($_SESSION['message']);
    }
}

function redirect($location)
{
    header("Location: $location");
}

function query ($sql)
{
    global $con;
    return mysqli_query($con, $sql);
}

function confirm($result)
{
    global $con;
    if(!$result)
    {
        die("QUERY FAILED" . mysqli_error($con));
    }
}

function escape_string($string)
{
    global $con;
    return mysqli_real_escape_string($con, $string);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

function EncryptData($source) 
{ 
 $fp=fopen(BASE_URL."/app/controllers/encryption/public.pem","r");
  $pub_key=fread($fp,8192); 
  fclose($fp); 

  openssl_public_encrypt($source,$crypttext,$pub_key); 

  return base64_encode($crypttext); 
} 

function DecryptData($encrypted_data)
{
	$fp=fopen(BASE_URL."/app/controllers/encryption/private.pem","r");
	$priv_key=fread($fp,8192);
	fclose($fp);
	
	openssl_private_decrypt(base64_decode($encrypted_data),$decrypted_data,$priv_key);
	
	return $decrypted_data;
}
///////////////////////////////////////////////////car//////////////////////////////////////////////////////////////////////////////////

function all_car()
{
    $query = query("SELECT * FROM cr_car");
    confirm($query);
}

/////////////////////////////////////////////////////////////////add car////////////////////////////////////////////////////////////////

function add_car()  //add car
{
    if(isset($_POST['register']))
    {
        $car_plat = escape_string($_POST['car_plat']);
        $car_name = escape_string($_POST['car_name']);



        $car_pass = $_POST['car_pass'];
        $car_rental = $_POST['car_rental'];
        $car_trans = escape_string($_POST['car_trans']);

        $car_image = $_FILES['file']['name'];
        $image_temp_location = $_FILES['file']['tmp_name'];


        //        $sub_num_length = 5;
        //        $charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        //        
        //        for ($x=1; $x<=$sub_num_length; $x++)
        //        {
        //            $rand = rand() % strlen($charset);
        //            $temp = substr($charset, $rand, 1);
        //            
        //            $car_id = $car_id . $temp;
        //        }
        //        
        //        $new_car_id = "C" . $car_id;

        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $car_image);

        $query = query("INSERT INTO cr_car(car_plat,car_name,car_pass,car_rental,car_trans,car_image)

        VALUES('{$car_plat}','{$car_name}','{$car_pass}','{$car_rental}','{$car_trans}','{$car_image}')");
        confirm($query);
        set_message("New Car Just Added");
        redirect("index.php?pages=add_car");

    }
}


////////////////////////////////////////////////////////manage car//////////////////////////////////////////////////////////////////////

function manage_car()
{
    $query = query("SELECT * FROM cr_car");
    confirm($query);


?>

<div class='container'>
    <div class='row'>
        <h1 class="page-header">Car
            <small>Management</small>
        </h1>
        <div class="panel-body">
            <div class="dataTable_Wrapper">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Car Plat</th>
                            <th>Car Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
    $bil = 0;
    while($row = fetch_array($query))
    {

        $car_plat = $row['car_plat'];
        $car_name = $row['car_name'];

        $bil++;

                        ?>    

                        <tr class="odd gradex">
                            <td><?php echo $bil; ?></td>

                            <td><?php _e($car_plat); ?></td>
                            <td><?php _e($car_name); ?></td>


                            <td class="center">
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $car_plat;?>">
                                    <span class="glyphicon glyphicon-glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>

                                <!--modal-->
                                <div class="modal fade" id="myModal<?php echo $car_plat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" ara-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to DELETE this car?<br>"<?php echo $car_plat;?>"
                                            </div>
                                            <div class="modal-footer">
                                                <form class="form-horizontal" role="form" action="" method="post">
                                                    <input type="hidden" name="car_plat" value="<?php echo $car_plat?>"/>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="delete_car" class="btn btn-primary">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-warning btn-xs" href="index.php?pages=edit_car&car_plat=<?php echo $car_plat ?>" role="button">
                                    <span class="glyphicon glyphicon-glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
								<a class="btn btn-warning btn-xs" href="index.php?pages=detail_car&car_plat=<?php echo $car_plat ?>" role="button">
                                    <span class="glyphicon glyphicon-glyphicon glyphicon-check" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                        <?php
    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
<?php

}


////////////////////////////////delete car /////////////////////////////////////////////////////////////////////////////////////////////

function delete_car()
{
    if(isset($_POST['delete_car']))
    {
        $car_plat = $_POST['car_plat'];
        $query = query("DELETE FROM cr_car WHERE car_plat = '{$car_plat}'");
        confirm($query);
        redirect("index.php?pages=no page");
    }
}

///////////////////////////////////////edit car/////////////////////////////////////////////////////////////////////////////////////////

function edit_car()
{
    if(isset($_POST['edit_car']))
    {
        $car_plat = $_GET['car_plat'];
        $car_name = $_POST['car_name'];
        $car_pass = $_POST['car_pass'];
        $car_trans = $_POST['car_trans'];
        $car_rental = $_POST['car_rental'];

        $car_image = $_FILES['file']['name'];
        $image_temp_location = $_FILES['file']['temp_name'];

        move_uploaded_file($image_temp_location , UPLOAD_DIRECTORY . DS . $car_image);

        if(empty($car_image))
        {
            $query_img = query("SELECT * FROM cr_car WHERE car_plat = '$car_plat' ");
            confirm($query_img);

            while($row = mysqli_fetch_assoc($query_img))
            {
                $car_image = $row['car_image'];
            }
        }

        $query = query("UPDATE cr_car SET car_plat ='{$car_plat}',car_name = '{$car_name}', car_pass = '{$car_pass}', car_trans = '{$car_trans}', car_rental = '{$car_rental}', car_image = '{$car_image}' WHERE car_plat = '{$car_plat}' ");
        confirm($query);

        redirect("index.php?pages = edit_car&car_plat={$car_plat}");
    }
}


////////////////////////////////////////////////schedule car////////////////////////////////////////////////////////////////////////////

function schedule_car()
{

    $query = query("SELECT * FROM cr_reservation");
    confirm($query);
?>


<div class='container'>
    <div class='row'>
        <h1 class="page-header">Car
            <small>Management</small>
        </h1>
        <div class="panel-body">
            <div class="dataTable_Wrapper">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Reservation Id</th>
                            <th>Car Plat</th>                            
                            <th>Date of Pickup</th>
                            <th>Date of Return</th>
                            <th>Status</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
    $bil = 0;
    while($row = fetch_array($query))
    {
        $reservation_id = $row['reservation_id'];
        $car_plat = $row['car_plat'];
        $car_pickup = $row['car_pickup'];
        $car_return = $row['car_return'];
        $car_status = $row['car_status'];

        $bil++;

                        ?>    

                        <tr class="odd gradex">
                            <td><?php echo $bil; ?></td>
                            <td><?php _e($reservation_id);?></td>
                            <td><?php echo _e($car_plat); ?></td>
                            <td><?php echo _e($car_pickup); ?></td>
                            <td><?php echo _e($car_return); ?></td>
                            <td><?php echo _e($car_status); ?></td>

                            <td class="center">
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $reservation_id;?>">
                                    <span class="glyphicon glyphicon-glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>

                                <!--modal-->
                                <div class="modal fade" id="myModal<?php echo $reservation_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" ara-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to DELETE this car?<br>"<?php echo $reservation_id;?>"
                                            </div>
                                            <div class="modal-footer">
                                                <form class="form-horizontal" role="form" action="" method="post">
                                                    <input type="hidden" name="reservation_id" value="<?php echo $reservation_id?>"/>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="deleteschedule_car" class="btn btn-primary">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-warning btn-xs" href="index.php?pages=editschedule_car&reservation_id=<?php echo $reservation_id ?>" role="button">
                                    <span class="glyphicon glyphicon-glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                            </td>

                        </tr>
                        <?php
    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
<?php
}

//////////////////////////////////////////delete schedule //////////////////////////////////////////////////////////////////////////////

function deleteschedule_car()
{
    if(isset($_POST['deleteschedule_car']))
    {

        $reservation_id = $_POST['reservation_id'];
        $query = query("DELETE FROM cr_reservation WHERE reservation_id = '{$reservation_id}' ");
        confirm($query);
        redirect("index.php?pages=schedule_car");
    }

}

////////////////////////////////////////////////edit schedule //////////////////////////////////////////////////////////////////////////

function editschedule_car()
{
    if(isset($_POST['editschedule_car']))
    {
        $reservation_id = $_GET['reservation_id'];
        $car_plat = $_POST['car_plat'];
        $car_pickup = $_POST['car_pickup'];
        $car_return = $_POST['car_return'];
        $car_score = $_POST['car_score'];
        $car_status = $_POST['car_status'];

        $query = query("UPDATE cr_reservation SET  car_status = '{$car_status}' WHERE reservation_id = '{$reservation_id}' ");
        confirm($query);
        redirect("index.php?pages=schedule_car");
    }
}

///////////////////////////////////////////reservation car//////////////////////////////////////////////////////////////////////////////

function car_reservation()
{
    if(isset($_POST['submit']))
    {
       
        $user_fullname = $_POST['user_fullname'];
        $user_code = $_POST['user_code'];
        $user_phone =$_POST['user_phone'];
		$user_email = $_POST['user_email'];
        $car_name = $_POST['car_name'];
        $car_plat = escape_string($_POST['car_plat']);
        $car_pickup = $_POST['car_pickup'];
        $car_return = $_POST['car_return'];
        $address = $_POST['address'];
        $total_rent =$_POST['total_rent'];
        $car_status = "NEW";

                       $sub_num_length = 5;
        $charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

        for ($x=1; $x<=$sub_num_length; $x++)
        {
            $rand = rand() % strlen($charset);
            $temp = substr($charset, $rand, 1);

            $reservation_id = $reservation_id . $temp;

        }

        $new_reservation_id = "CR_R" . $reservation_id;

        

        $query = query("INSERT INTO cr_reservation (reservation_id,user_fullname,user_code,user_phone,user_email,car_name,car_plat,car_pickup,car_return,address,total_rent,car_status)

        VALUES('{$new_reservation_id}','{$user_fullname}','{$user_code}','{$user_phone}','{$user_email}','{$car_name}','{$car_plat}','{$car_pickup}','{$car_return}','{$address}','{$total_rent}', '{$car_status}')");
        confirm($query);

        redirect("index.php?pages=no page");
    }
}

///////////////////////////////////////////////user search//////////////////////////////////////////////////////////////////////////////

function user_search()
{
    if(isset($_POST['submit']))
    {
        $car_pickup=$_POST['car_pickup'];
        $car_return=$_POST['car_return'];


        $query = query("SELECT * FROM cr_car WHERE car_plat NOT IN (SELECT car_plat FROM cr_reservation WHERE car_pickup = '{$car_pickup}' AND car_return = '{$car_return}') ");
        
        confirm($query);
        
        redirect("index.php?pages=display_car");
    }

}

//////////////////////////////////////////////////score////////////////////////////////////////////////////////////////////////////////////

function calculate_score()
{
	if(isset($_POST['submit']))
    {
		$reservation_id = $_POST['reservation_id'];
		$car_plat = $_POST['car_plat'];
		$user_code = $_POST['user_code'];
		$user_fullname = $_POST['user_fullname'];
		$user_email = $_POST['user_email'];
		$sc_service = $_POST['sc_service'];
		$sc_money = $_POST['sc_money'];
		$sc_cond = $_POST['sc_cond'];
		$sc_loc = $_POST['sc_loc'];
		$sc_friendly = $_POST['sc_friendly'];
		$sc_option = $_POST['sc_option'];
		$sc_total = $_POST['sc_total'];
		$sc_feedback = $_POST['sc_feedback'];
		$car_status ="FINISH";

		$sc_total =($sc_service + $sc_money + $sc_cond + $sc_loc + $sc_friendly + $sc_option)/6;
		
		$sub_num_length = 5;
        $charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

        for ($x=1; $x<=$sub_num_length; $x++)
        {
            $rand = rand() % strlen($charset);
            $temp = substr($charset, $rand, 1);

            $score_id = $score_id . $temp;

        }

        $new_score_id = "CR_S" . $score_id;
		
		
		$query = query("INSERT INTO cr_score (score_id,reservation_id,car_plat,user_code,user_fullname,user_email,sc_service,sc_money,sc_cond,sc_loc,sc_friendly,sc_option,sc_feedback,sc_total)

        VALUES('{$new_score_id}','{$reservation_id}','{$car_plat}','{$user_code}','{$user_fullname}','{$user_email}','{$sc_service}','{$sc_money}','{$sc_cond}','{$sc_loc}','{$sc_friendly}','{$sc_option}','{$sc_feedback}','{$sc_total}')");
        confirm($query);
		
		$query1 = query("UPDATE cr_reservation SET car_status = '{$car_status}' WHERE reservation_id ='{$reservation_id}'");
		confirm($query1);
		
		redirect("index.php?pages=no page");
	}
		
}

//////////////////////////////////////////display score ///////////////////////////////////////////////////////////////////////////////////

function display_score()
{

    $query = query("SELECT * FROM cr_score");
    confirm($query);
?>


<div class='container'>
    <div class='row'>
        <h1 class="page-header">Review Score
        </h1>
        <div class="panel-body">
            <div class="dataTable_Wrapper">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Reservation Id</th>
                            <th>Num Ic</th>                            
                            <th>Name</th>
                            <th>Total Score</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
    $bil = 0;
    while($row = fetch_array($query))
    {
        $reservation_id = $row['reservation_id'];
        $user_ic = $row['user_ic'];
        $user_name = $row['user_name'];
        $sc_total = $row['sc_total'];

        $bil++;

                        ?>    

                        <tr class="odd gradex">
                            <td><?php echo $bil; ?></td>
                            <td><?php _e($reservation_id);?></td>
                            <td><?php echo _e($user_ic); ?></td>
                            <td><?php echo _e($user_name); ?></td>
                            <td><?php echo _e($sc_total); ?></td>

                            <td class="center">
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $reservation_id;?>">
                                    <span class="glyphicon glyphicon-glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>

                                <!--modal-->
                                <div class="modal fade" id="myModal<?php echo $reservation_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" ara-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to DELETE this car?<br>"<?php echo $reservation_id;?>"
                                            </div>
                                            <div class="modal-footer">
                                                <form class="form-horizontal" role="form" action="" method="post">
                                                    <input type="hidden" name="reservation_id" value="<?php echo $reservation_id?>"/>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="deleteschedule_car" class="btn btn-primary">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-warning btn-xs" href="index.php?pages=editschedule_car&reservation_id=<?php echo $reservation_id ?>" role="button">
                                    <span class="glyphicon glyphicon-glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                            </td>

                        </tr>
                        <?php
    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
<?php
}


////////////////////////////////////////////// register user///////////////////////////////////////////////////////////////////////////////

function register_user()
{
    if(isset($_POST['register']))
    {
        //$user_code = $_POST['user_code'];
        $user_fullname = $_POST['user_fullname'];
        $username = $_POST['username'];
        $user_phone = $_POST['user_phone'];
        $user_email = $_POST['user_email'];
        $address = $_POST['address'];
        $user_password = $_POST['user_password'];
        $user_role = "customer";

        $email_query = query("SELECT * FROM cr_user WHERE user_email = '{$user_email}'");
        //check email to make sure email is not exist
        if(mysqli_num_rows($email_query) == 1)
        {
            //if there is existed email, registeration failed
            $_SESSION['existed_email'] = $user_email;
            email_exist();

            //if email existd, asign email inside session. this session will allow a message to display
            //"Email already registered". this session is related to email_exist() function.
            //redirect("index.php?pages=registeration");
            //redirect back to register page
        }
        else
		{
           $query_count = query("SELECT * FROM cr_user");
        $result_count = confirm($query_count);
        $row_count = mysqli_num_rows($query_count);

        $user_no_count = '1000';
        for($i=0; $i<=$row_count; $i++)
        {
            $user_no_count++;
        }


        if($row_count==0) //buang 
        {
            $show_years = date("Y");
            $short_years = substr($show_years,2);
            $count = $user_no_count;
            $result1 = $short_years . $count;
            $user_code = "CR_C" . $result1;
        }
        else
        {
            $show_years = date("Y");
            $short_years = substr($show_years,2);
            $count = $user_no_count;
            $result1 = $short_years . $count;
            $user_code = "CR_C" . $result1;
        }

        $query_count_2 = query("SELECT * FROM cr_user WHERE user_code='$user_code'");
        $result_count_2 = confirm($query_count_2);
        $row_count_2 = mysqli_num_rows($query_count_2);

        if($row_count_2==1)
        {
            $user_no_count++;

            $show_years = date("Y");
            $short_years = substr($show_years,2);
            $count = $user_no_count;
            $result1 = $short_years . $count;
            $user_code = "CR_C" . $result1;
        }

        //for first time user, we will set their username based on email and password based on phone number. later on, they are encourage to change their password
$pass = EncryptData($user_password);

        $query = query("INSERT INTO cr_user(user_code,user_fullname,username,user_phone,user_email,address,user_password,user_role)
        VALUES('$user_code','$user_fullname','$username','$user_phone','$user_email','$address','$pass','$user_role')");

        confirm($query);
        
        $_SESSION['success_register'] = 'success';

        redirect("../user/index.php");
        }
    }
}
//////////////////////////////////////////////login user ///////////////////////////////////////////////////////////////////////////////

function login_user()
{
    global $con;

    if(isset($_POST['submit']))
    {
        $user_email = $_POST['user_email'];

        $email_query = query("SELECT * FROM cr_user WHERE user_email = '{$user_email}'");

        if(mysqli_num_rows($email_query) == 0)
        {
            //if there is no similar email with the one that user submitted through form,
            //then we will set a session to tell user the email is not valid registered

            $_SESSION['email_not_valid'] = $user_email;
            redirect("index.php");
        }
        else
        {

            $user_email = $_POST['user_email'];
            $user_password = escape_string($_POST['user_password']);

            $query = query("SELECT * FROM cr_user WHERE user_email = '{$user_email}'");

            confirm($query);

            while($row = fetch_array($query))
            {
                $db_user_email = $row['user_email'];
                $db_user_password1 = $row['user_password'];
                $db_username = $row['username'];
                $db_user_role = $row['user_role'];
            }
			
			 $db_user_password = DecryptData($db_user_password1);

            if($user_email == $db_user_email && $user_password == $db_user_password && $db_user_role == "admin")
            {
                $_SESSION['user_email'] = $db_user_email;
                $_SESSION['username'] = $db_username;
                $_SESSION['user_role'] = $db_user_role;

                //go to the right page if password and email is correct and user role is admin

                redirect("../admin/index.php");
            }
            elseif($user_email == $db_user_email && $user_password == $db_user_password && $db_user_role == "customer")
            {
                $_SESSION['user_email'] = $db_user_email;
                $_SESSION['username'] = $db_username;
                $_SESSION['user_role'] = $db_user_role;

                //go to the right page if password and email is correct and user role is student

                redirect("../user/index.php");
            }
            elseif($user_email !== $db_user_email && $user_password !== $db_user_password)
            {
                //go to login page if password or email is incorrect

                redirect("index.php");
				
            }
            else
            {
                //go to login page if two IF above not satisfied

                redirect("index.php");
            }
        }
    }
}


////////////////////////////////////////////////////admin session //////////////////////////////////////////////////////////////////////

function admin_session()
{
    if (isset($_SESSION['user_email']) && $_SESSION['user_role'] == "admin")
    {
        //stay in admin page

    }
    else
    {
        redirect("../login/index.php");
    }

}

////////////////////////////////////////////////admin logout ///////////////////////////////////////////////////////////////////////////

function admin_logout()
{
    unset($_SESSION['user_email']);
    unset($_SESSION['username']);
    unset($_SESSION['user_role']);

    //delete all session variables
    //session_destroy();

    //jump to login page
    redirect("../visitor/index.php");

}


///////////////////////////////////////////////////user session ////////////////////////////////////////////////////////////////////////

function user_session() //check if user is a student
{
    if (isset($_SESSION['user_email']) && $_SESSION['user_role'] == "customer")
    {
        //stay in user page

    }
    else
    {
        redirect("../login/index.php");
    }

}


////////////////////////////////////////////////////user logout/////////////////////////////////////////////////////////////////////////

function user_logout() //remove all session for student
{
    unset($_SESSION['user_email']);
    unset($_SESSION['user_role']);
    unset($_SESSION['username']);

    //delete all session variables
    //session_destroy();

    //jump to login page
    redirect("../visitor/index.php");

}


/////////////////////////////////////////////////////////email check////////////////////////////////////////////////////////////////////

function email_check()
{
    if(empty($_SESSION['email_not_valid']))
    {
        //if session is not empty, then display message
    }else
    {

?>      
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Sorry :</strong> <b><?php echo $_SESSION['email_not_valid'] ?></b> is not registered into this system.
</div>
<?php
        unset($_SESSION['email_not_valid']);
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function email_exist(){


    if(empty($_SESSION['existed_email'])) // if email not exist,display nothing
    { 

    }
    else  
    {
?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Sorry :</strong> <b><?php echo $_SESSION['existed_email'] ?></b> already registered.
</div>

<?php
        unset($_SESSION['existed_email']);
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function email_success_register()
{
    if(empty($_SESSION['success_register'])) //if user_comment from cms_class is empty
    {

    }
    else
    {
?>    
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    You has been registered!
</div>

<?php
        unset($_SESSION['success_register']);

    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////