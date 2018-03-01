<?php

if(isset($_GET["car_pickup"]))
{

$car_pickup=$_GET['car_pickup'];
echo $car_pickup;
   // $output ='';
    
       $query = query("SELECT * FROM cr_car WHERE car_plat IN (SELECT car_plat FROM cr_reservation WHERE car_pickup = '{$car_pickup}') ");

     confirm($query);
    
     if (mysql_num_rows($query) == true) 
    { 
        echo "<script language=javascript type=text/javascript>
	alert('Maaf, Tempahan tidak dibenarkan'); 
	history.go(-1);
	</script>";
    }


}


//$query = query("SELECT car_plat FROM cr_reservation WHERE car_pickup = '{$car_pickup}' AND car_return = '{$car_return}' ");


$query = query("SELECT * FROM cr_car");
        confirm($query);

//}
?>
<div class='container-fluid'>
    <div class='row'>
        <h1 class="page-header">AVAILABLE CAR       
        </h1>
    
        <?php //user_search(); ?>
        <div id="display">
        <div class="dataTable_wrapper">
            <table width="100%" class="table table-borderless text-center" id="dataTables-example">
                <thead>
                    <tr>
                        <td></td>
                    </tr>
                </thead>

                <?php

    while($row = fetch_array($query))
    {
         $car_name = $row['car_name'];
        $car_plat = $row['car_plat'];
        $car_image = $row['car_image'];
        $car_rental = $row['car_rental'];
        $car_pass = $row['car_pass'];
        $car_trans = $row['car_trans'];

                ?>
                <tr class="col-md-4">
                    <td>
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <a href="#">
                                    <img src="../admin/car_images/<?php echo $row['car_image']?>" style="width: 100%; dislay: block; " width="100%" height="190px"
                                         alt="<?php echo $car_name;?>">

                                    <div class="mask">
<!--                                        <p><?php //echo ucwords($car_name);?></p>-->
                                        <div class="tools tools-bottom">
                                            <p><?php //echo $car_name;?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="caption">
                                <p><b><?php echo ucwords($car_name);?></b></p>
                                <p><?php echo ucwords($car_plat);?></p>
                                <p>Rental Rate : <?php echo ucwords($car_rental);?> per day</p>
                                <p>Number of Passenger : <?php echo ucwords($car_pass);?> of Passenger</p>
                                <p>Transmission Type : <?php echo ucwords($car_trans);?></p>

                                <a class="btn btn-info btn pull-right btn-sm col-xs-4 col-md-4"
                                   style="border-radius:0;border:0px;font-weight:bold;color: #fff;
                                          margin-right:0px;font-family: 'Verdana';font-style: normal;"
                                   href="?pages=confirmation&car_plat=<?php echo $car_plat?>"
                                   role="button">Select</a>
                                <p style="visibility: hidden;"><?php //echo $shop_desc;?></p>
<!--                                <input type="submit" name="Select" class="btn btn-lg btn-success btn-block">-->
                                
                            </div>
                        </div>
                    </td>
                </tr>
                <?php

    } //end of file
                ?>
            </table>
        </div>
    </div>
    </div>
</div>
</section>