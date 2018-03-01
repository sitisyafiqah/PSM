<?php  

$user_email = $_SESSION['user_email'];

     $query = query("SELECT * FROM cr_reservation WHERE user_email='{$user_email}'");
        confirm($query); 
?>

                <form method="post" action="" enctype="multipart/form-data">
                    <h1>Status your Reservation</h1>
                    <br>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" > 
                                <thead>
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>Reservation ID</center></th>
										<th><center>Car Plat</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $bil = 0;
                                    while($row = fetch_array($query)) {
                                        $reservation_id = $row['reservation_id'];
                                        $car_plat = $row['car_plat'];
                                        $car_status = $row['car_status'];
                                        $bil++;

                                    ?>
                                    <tr class="odd gradeX">
                                        <td><center><?php echo $bil; ?></center></td>
                                        <td><center><?php _e($reservation_id); ?></center></td>
                                        <td><?php _e($car_plat); ?></td>


                                        <?php if($car_status == "NEW"){
                                        echo"<td><span class='label label-info'>$car_status</span></td>";
                                    }elseif($car_status == "RENTING"){
                                        echo"<td><span class='label label-primary'>$car_status</span></td>";
                                    }elseif($car_status == "DONE"){
                                        echo"<td><span class='label label-success'>$car_status</span></td>";
                                    }elseif($car_status == "CANCEL"){
                                        echo"<td><span class='label label-warning'>$car_status</span></td>";
                                    }elseif($car_status == "FINISH"){
										 echo"<td><span class='label label-success'>$car_status</span></td>";

                                    }?>

                                        <td class="center" style="text-align:center"> 
                                            <form role="form" action="" method="post" enctype="multipart/form-data">
                                                <?php
                                        if ($car_status == 'NEW'){
                                            
                                              echo "<a href='' name='submit' class='btn btn-default btn-md' onclick='$car_status'><i span class='glyphicon glyphicon-ok' aria-hidden='true' disabled></i>Score</a>";
                                        }
                                        elseif ($car_status == 'RENTING')
                                        {
                                             echo "<a href='' name='submit' class='btn btn-default btn-md' onclick='$car_status'><i span class='glyphicon glyphicon-ok' aria-hidden='true' disabled></i>Score</a>";


                                        }
                                         elseif ($car_status == "DONE")
                                        {
                                            echo "<a href='index.php?pages=score&reservation_id=$reservation_id' name='submit2' class='btn btn-warning btn-md'><i span class='glyphicon glyphicon-refresh' aria-hidden='true'></i>Score</a> &nbsp";
                                            

                                        }
                                        elseif ($car_status == 'CANCEL')
                                        {
                                             echo "<a href='' name='submit' class='btn btn-default btn-md' onclick='$car_status'><i span class='glyphicon glyphicon-ok' aria-hidden='true' disabled></i>Score</a>";

                                        }
                                        elseif($car_status == 'FINISH')
                                        {
											echo "<a href='' name='submit' class='btn btn-warning btn-md'><i span class='glyphicon glyphicon-refresh' aria-hidden='true'></i>Score</a> &nbsp";
                                        } 
                                       
                                                ?>
                                                <?php }?>
                                                </td>
                                </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
            </form>
    </div>
</div>
</div>
</div>                           
  </div>
</div>
<br><br>
</section>