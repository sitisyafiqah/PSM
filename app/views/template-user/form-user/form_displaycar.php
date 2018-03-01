<?php

$query = query("SELECT * FROM cr_car");
confirm($query);

   
?>
<div class='container-fluid'>
    <div class='row'>
        <h1 class="page-header">AVAILABLE CAR       
        </h1>
        <div id="display">
        <div class="dataTable_wrapper">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                        <div class="tools tools-bottom">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="caption">
							<label><?php echo ucwords($car_name);?></label><br>
							<label><?php echo ucwords($car_plat);?></label>
							<label>Rental Rate : <?php echo ucwords($car_rental);?> per day</label>
							<label>Number of Passenger : <?php echo ucwords($car_pass);?></label>
							<label>Transmission Type : <?php echo ucwords($car_trans);?></label>
							

                                <a class="btn btn-info btn pull-right btn-sm col-xs-4 col-md-4"
                                   style="border-radius:0;border:0px;font-weight:bold;color: #fff;
                                          margin-right:0px;font-family: 'Verdana';font-style: normal;"
                                   href="?pages=confirmation&car_plat=<?php echo $car_plat?>"
                                   role="button">Select</a>
             
                                
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