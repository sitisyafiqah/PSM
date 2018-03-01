<?php

$car_plat = $_GET['car_plat'];
$username = $_SESSION['username'];

$query = query("SELECT * FROM cr_car WHERE car_plat = '$car_plat' ");
confirm($query);
while ($row = mysqli_fetch_assoc($query))
{
    $car_plat = $row['car_plat'];
    $car_name = $row['car_name'];
    $car_image = $row['car_image'];
}

$query = query("SELECT * FROM cr_user WHERE username = '{$username}'");
confirm($query);
while ($row = mysqli_fetch_assoc($query))
{
    $user_code = $row['user_code'];
    $user_fullname = $row['user_fullname'];
    $user_email = $row['user_email'];
    $address = $row['address'];
    $user_phone = $row['user_phone'];
    
}

?>

    <h1>RESERVATION CAR</h1>
<!--<div class="col-lg-6">-->
    <form role="form" action="" method="post" enctype="multipart/form-data">
        <?php car_reservation(); ?>
		
		<div class="col-md-6">
	 
	<div class="list-group-item">
        <div class="form-group">
            <label>User Code :</label>
            <input type="text" class="form-control" name="user_code" value="<?php echo $user_code ?>" readonly>
        </div>
        <div class="form-group">
            <label>Fullname :</label>
            <input type="text" class="form-control" name="user_fullname" value="<?php echo $user_fullname ?>" readonly>
        </div>

        <div class="form-group">
            <label>Phone Number :</label>
            <input type="tel" class="form-control" name="user_phone" value="<?php echo $user_phone ?>" readonly>
        </div>
        
        <div class="form-group">
            <label>Email :</label>
            <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>" readonly>
        </div>

        <div class="form-group">
            <label>Car Name :</label>
            <input type="text" class="form-control" name="car_name" value="<?php echo $car_name ?>" readonly>
        </div>

        <div class="form-group">
            <label>Car Plat :</label>
            <input type="text" class="form-control" name="car_plat" value="<?php echo $car_plat ?>" readonly>
        </div>
		<div class="form-group">
            <label>Car Image</label>
            <a href="#" class="thumbnail" style="width:100px">
                <img src="../admin/car_images/<?php echo $car_image?>" alt="<?php echo $car_image?>">
            </a>
        </div>
			</div>
		</div>
		<br>
		<div class="col-md-6">
	<div class="list-group-item">
        <div class="form-group">
            <label>Pickup Date :</label>
            <input type="date" class="form-control" name="car_pickup" value="" required>
        </div>

        <div class="form-group">
            <label>Return Date :</label>
            <input type="date" class="form-control" name="car_return"  value="" required>
        </div>

        <div class="form-group">
            <label>Address :  </label>
            <textarea class="form-control" rows="5" cols="30" name="address" value="<?php echo $address ?>" required>
            </textarea>
        </div>
        
        <div class="form-group">
            <label>Total Rent : RM </label>
            <input type="text" class="form-control" name="total_rent" value="" required>
        </div>

        <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Submit">
    </form>
</div>
</div>
</section>