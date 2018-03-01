<?php
if(isset($_GET['score_id']))
{
    $score_id = $_GET['score_id'];
}

$query = query("SELECT * FROM cr_score WHERE score_id = '{$score_id}'");
confirm($query);
while ($row = mysqli_fetch_assoc($query))
{
		$score_id = $row['score_id'];
		$reservation_id = $row['reservation_id'];
		$car_plat = $row['car_plat'];
		$user_code = $row['user_code'];
		$user_fullname = $row['user_fullname'];
		$user_email = $row['user_email'];
		$sc_service = $row['sc_service'];
		$sc_money = $row['sc_money'];
		$sc_cond = $row['sc_cond'];
		$sc_loc = $row['sc_loc'];
		$sc_friendly = $row['sc_friendly'];
		$sc_option = $row['sc_option'];
		$sc_total = $row['sc_total'];
		$sc_feedback = $row['sc_feedback'];  
}
?>

<!--<div class="col-md-4 col-md-offset-4">-->
    <h1>REVIEW SCORE</h1>
 <form role="form" action="" method="post" enctype="multipart/form-data">
<div class="col-md-6">
	 <?php calculate_score(); ?>
	<div class="list-group-item">
	<div class="form-group">
            <label>Score Id :</label>
            <input type="text" class="form-control" name="score_id" value="<?php echo $score_id ?>" readonly>
	</div>
	<div class="form-group">
            <label>Reservation Id :</label>
            <input type="text" class="form-control" name="reservation_id" value="<?php echo $reservation_id ?>" readonly>
	</div>
	<div class="form-group">
            <label>Car PLat :</label>
            <input type="text" class="form-control" name="car_plat" value="<?php echo $car_plat ?>" readonly>
    </div>
    <div class="form-group">
            <label>User Code :</label>
            <input type="text" class="form-control" name="user_code" value="<?php echo $user_code ?>" readonly>
     </div>
	<div class="form-group">
            <label>Full Name :</label>
            <input type="text" class="form-control" name="user_fullname" value="<?php echo $user_fullname ?>" readonly>
        </div>
	<div class="form-group">
            <label>Email :</label>
            <input type="text" class="form-control" name="user_email" value="<?php echo $user_email ?>" readonly>
    </div>
	</div>
</div>
    <div class="col-md-6">
		<div class="list-group-item">
   
        <div class="form-group">
            <label>Service :</label>
            <input type="text" class="form-control" name="sc_service" value="<?php echo $sc_service ?>" readonly>
	</div>
	<div class="form-group">
            <label>Value 0f Money :</label>
            <input type="text" class="form-control" name="sc_money" value="<?php echo $sc_money ?>" readonly>
    </div>
    <div class="form-group">
            <label>Condition :</label>
            <input type="text" class="form-control" name="sc_cond" value="<?php echo $sc_cond ?>" readonly>
     </div>
	<div class="form-group">
            <label>Location :</label>
            <input type="text" class="form-control" name="sc_loc" value="<?php echo $sc_loc ?>" readonly>
        </div>
	<div class="form-group">
            <label>Friendly :</label>
            <input type="text" class="form-control" name="sc_friendly" value="<?php echo $sc_friendly ?>" readonly>
        </div>
			<div class="form-group">
            <label>Option of Car:</label>
            <input type="text" class="form-control" name="sc_option" value="<?php echo $sc_option ?>" readonly>
        </div>
        <div class="form-group">
            <label>Feedback :  </label>
            <textarea class="form-control" rows="5" cols="30" name="sc_feedback" value="<?php echo $sc_feedback ?>" readonly>
            </textarea>
        </div>
</div>
</div>
	 </form>
</section>