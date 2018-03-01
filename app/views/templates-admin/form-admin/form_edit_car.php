<?php

if(isset($_GET['car_plat']))
{
    $car_plat = $_GET['car_plat'];
}

$query = query("SELECT * FROM cr_car WHERE car_plat = '$car_plat' ");
confirm($query);

while ($row = mysqli_fetch_assoc($query))
{
    $car_plat = $row['car_plat'];
    $car_name = $row['car_name'];
    $car_pass = $row['car_pass'];
    $car_trans = $row['car_trans'];
    $car_rental = $row['car_rental'];
    $car_image = $row['car_image'];
}
?>

<h1 class="page-header">Edit Car</h1>
<div class="col-md-6">
	<div class="list-group-item">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        <?php edit_car(); ?>
        <div class="form-group">
            <label>Car Plat</label>
            <input type="text" class="form-control" name="car_plat" value="<?php echo $car_plat?>">
        </div>
        
        <div class="form-group">
            <label>Car Name</label>
            <input type="text" class="form-control" name="car_name" value="<?php echo $car_name?>">
        </div>
		
		 <div class="form-group">
            <label>Number of Passenger</label>
            <input type="text" class="form-control" name="car_pass" value="<?php echo $car_pass?>">
        </div>
        
		
		</div></div>
	<div class="col-md-6">
	<div class="list-group-item">
       
        <div class="form-group">
            <label>Car Status :</label>
            <select class="form-control" name="car_trans" value""<?php echo $car_trans?>"">
                <option value="MANUAL">MANUAL</option>
				<option value="AUTO">AUTO</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Rental Rate</label>
            <input type="text" class="form-control" name="car_rental" value="<?php echo $car_rental?>">
        </div>
        
        <div class="form-group">
            <label>Car Image</label>
            <a href="#" class="thumbnail" style="width:100px">
                <img src="car_images/<?php echo $car_image?>" alt="<?php echo $car_image?>">
            </a>
            <input type="file" name="file">
        </div>
        <button type="submit" name="edit_car" class="btn btn-default">Update Car</button>
        <button type="reset" class="btn btn-default">Reset Button</button>
    </form>
	</div></div>