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

<div class="col-md-4 col-md-offset-4">
    <h1> Detail of Car </h1>
<!--<div class="col-lg-6">-->
    <form role="form" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Car Plat</label>
            <input type="text" class="form-control" name="car_plat" value="<?php echo $car_plat ?>" readonly>
        </div>
        
        <div class="form-group">
            <label>Car Name</label>
            <input type="text" class="form-control" name="car_name" value="<?php echo $car_name ?>" readonly>
        </div>
        
        <div class="form-group">
            <label>Number of Passenger</label>
            <input type="text" class="form-control" name="car_pass" value="<?php echo $car_pass ?>" readonly>
        </div>
        
        <div class="form-group">
            <label>Transmission Type</label>
            <input type="text" class="form-control" name="car_trans" value="<?php echo $car_trans ?>" readonly>
        </div>
        
        <div class="form-group">
            <label>Rental Rate</label>
            <input type="text" class="form-control" name="car_rental" value="<?php echo $car_rental ?>" readonly>
        </div>
        
         <div class="form-group">
            <label>Car Image</label>
            <a href="#" class="thumbnail" style="width:100px">
                <img src="car_images/<?php echo $car_image?>" alt="<?php echo $car_image?>" >
            </a>
        </div>
    </form>
</div>