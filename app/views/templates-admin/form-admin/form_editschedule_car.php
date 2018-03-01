<?php

if(isset($_GET['reservation_id']))
{
    $reservation_id = $_GET['reservation_id'];
}

$query = query("SELECT * FROM cr_reservation WHERE reservation_id='$reservation_id'");
confirm($query);

while ($row = mysqli_fetch_assoc($query))
{
    
    $reservation_id = $row['reservation_id'];
	$user_code = $row['user_code'];
	$user_fullname = $row['user_fullname'];
	$user_email = $row['user_email'];
	$user_phone = $row['user_phone'];
	$car_name = $row['car_name'];
    $car_plat = $row['car_plat'];
    $car_pickup = $row['car_pickup'];
    $car_return = $row['car_return'];
    $car_status = $row['car_status'];
}
?>

<h1 class="page-header">Booking Car</h1>
	<div class="col-md-6">
	<div class="list-group-item">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        <?php editschedule_car(); ?>
        <div class="form-group">
            <label>Reservation Id</label>
            <input type="text" class="form-control" name="reservation_id" value="<?php echo $reservation_id?>" readonly>
        </div>
		
		<div class="form-group">
            <label>User Code</label>
            <input type="text" class="form-control" name="user_code" value="<?php echo $user_code?>" readonly>
        </div>
		
		<div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" name="user_fullname" value="<?php echo $user_fullname?>" readonly>
        </div>
		
		<div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="user_email" value="<?php echo $user_email?>" readonly>
        </div>
        
		<div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="user_phone" value="<?php echo $user_phone?>" readonly>
        </div>
		</div></div>
		<div class="col-md-6">
	 
	<div class="list-group-item">
        <div class="form-group">
            <label>Car Plat</label>
            <input type="text" class="form-control" name="car_plat" value="<?php echo $car_plat?>" readonly>
        </div>
        
        <div class="form-group">
            <label>Date of Pickup</label>
            <input type="text" class="form-control" name="car_pickup" value="<?php echo $car_pickup?>" readonly>
        </div>
        
        <div class="form-group">
            <label>Date of Return</label>
            <input type="text" class="form-control" name="car_return" value="<?php echo $car_return?>" readonly>
        </div>
  
         <div class="form-group">
            <label>Car Status :</label>
            <select class="form-control" name="car_status">
                <option value="NEW">NEW</option>
                <option value="RENTING">RENTING</option>
                <option value="DONE">DONE</option>
                <option value="FINISH">FINISH</option>
                <option value="CANCEL">CANCEL</option>
            </select>
        </div>
        
        <button type="submit" name="editschedule_car" class="btn btn-default">Update Schedule Car</button>
        <button type="reset" class="btn btn-default">Reset Button</button>
		
			</div></div>
    </form>
