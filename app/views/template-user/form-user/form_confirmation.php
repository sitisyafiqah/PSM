<?php

if(isset($_GET['car_plat']))
{
    $car_plat = $_GET['car_plat'];
}

$query = query("SELECT * FROM cr_car WHERE car_plat = '{$car_plat}' ");
confirm($query);

while ($row = mysqli_fetch_assoc($query))
{
    $car_plat = $row['car_plat'];
    $car_name = $row['car_name'];
    $car_pass = $row['car_pass'];
    $car_trans = $row['car_trans'];
    $car_rental = $row['car_rental'];
    $car_image = $row['car_image'];
   // $car_pickup = $row['car_pickup'];
   // $car_return = $row['car_return'];
}

?>

<div class="col-md-4 col-md-offset-4">
<h1 class="page-header">Confirmation Car Rental</h1>
    <div class='container-fluid'>
    <div class='row'>
        <div class="dataTable_wrapper">
            <table width="100%" >
                <thead>
                    <tr>
                        <td></td>
                    </tr>
                </thead>

                <?php

//    while($row = fetch_array($query))
//    {
//         $car_name = $row['car_name'];
//        $car_image = $row['car_image'];
//        $car_rental = $row['car_rental'];
//        $car_pass = $row['car_pass'];
//        $car_trans = $row['car_trans'];

                ?>
                <tr>
                    <td>
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <a href="#">
                                    <img src="../admin/car_images/<?php echo $car_image; ?>" style="width: 50%; dislay: block; " width="100%" height="190px"
                                         alt="<?php echo $car_image; ?>">

                                    <div class="mask">
<!--                                        <p><?php //echo ucwords($car_name);?></p>-->
                                        <div class="tools tools-bottom">
                                            <p><?php //echo $car_name;?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="caption">
                                <label><?php echo ucwords($car_name);?></label><br>
							<label><?php echo ucwords($car_plat);?></label><br>
							<label>Rental Rate : <?php echo ucwords($car_rental);?> per day</label><br>
							<label>Number of Passenger : <?php echo ucwords($car_pass);?></label><br>
							<label>Transmission Type : <?php echo ucwords($car_trans);?></label><br>
								
                                <a class="btn btn-info btn pull-right btn-sm col-xs-4 col-md-4"
                                   style="border-radius:0;border:0px;font-weight:bold;color: #fff;
                                          margin-right:0px;font-family: 'Verdana';font-style: normal;"
                                   href="?pages=reservation_car&car_plat=<?php echo $car_plat?>"
                                   role="button">Confirm</a>
                                <p style="visibility: hidden;">
                            </div>
                        </div>

                       
                    </td>
                </tr>
                
    
                <?php

   // } //end of file
                ?>
            </table>
        </div>

        
        
        
                </div>
        
    </div>
</div>
</section>
 