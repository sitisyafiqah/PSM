<?php

  $query = query("SELECT * FROM cr_score");
    confirm($query);
?>

<div class='container'>
    <div class='row'>
        <h1 class="page-header">SCORE FROM CUSTOMER
        </h1>
        <div class="panel-body">
            <div class="dataTable_Wrapper">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Score ID</th>
                            <th>Reservation ID</th>
							<th>Car Plat</th>
							<th>User Code</th>
							<th>Fullname</th>
							<th>Score</th>
							<th>Feedback</th>
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $bil = 0;
                        while($row = fetch_array($query))
                        {
                            
							$score_id = $row['score_id'];
                            $reservation_id = $row['reservation_id'];
                            $car_plat = $row['car_plat'];
                            $user_code = $row['user_code'];
							$user_fullname = $row['user_fullname'];
                            $sc_total = $row['sc_total'];
							$sc_feedback = $row['sc_feedback'];
                            
                            $bil++;
                        
                        ?>    
                        
                        <tr class="odd gradex">
							<td><?php echo $bil; ?></td>
                            <td><?php _e($score_id); ?></td>
                            <td><?php echo _e($reservation_id); ?></td>
							<td><?php echo _e($car_plat); ?></td>
                            <td><?php echo _e($user_code); ?></td>
							<td><?php echo _e($user_fullname); ?></td>
                            <td><?php echo _e($sc_total); ?></td>
							<td><?php echo _e($sc_feedback); ?></td>
                            <td class="center">
                                <a class="btn btn-warning btn-xs" href="index.php?pages=view_score&score_id=<?php echo $score_id ?>" role="button">
                                    <span class="glyphicon glyphicon-glyphicon glyphicon-check" aria-hidden="true"></span>
                                </a>
                                
                            </td>

                        </tr>
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
