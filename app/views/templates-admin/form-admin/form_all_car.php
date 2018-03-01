<?php

  $query = query("SELECT * FROM cr_car");
    confirm($query);
?>

<div class='container'>
    <div class='row'>
        <? all_car(); ?>
        <h1 class="page-header">CAR RENT
        </h1>
        <div class="panel-body">
            <div class="dataTable_Wrapper">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Car Plat</th>
                            <th>Car Name</th>
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
                            <td><?php echo _e($car_name); ?></td>
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
