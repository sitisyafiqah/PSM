<?php

if(isset($_GET['reservation_id']))
{
    $reservation_id = $_GET['reservation_id'];
}

$user_email = $_SESSION['user_email'];

$query = query("SELECT * FROM cr_reservation WHERE user_email = '{$user_email}' AND reservation_id = '{$reservation_id}'");
confirm($query);
while ($row = mysqli_fetch_assoc($query))
{
	$reservation_id = $row['reservation_id'];
	$car_plat = $row['car_plat'];
    $user_code = $row['user_code'];
    $user_fullname = $row['user_fullname'];
    $user_email = $row['user_email'];  
}
?>

<!--<div class="col-md-4 col-md-offset-4">-->
    <h1>PLEASE GIVE REVIEW SCORE</h1>
 <form role="form" action="" method="post" enctype="multipart/form-data">
<div class="col-md-6">
	 <?php calculate_score(); ?>
	<div class="list-group-item">
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
            <select class="form-control" name="sc_service" required>
                <option value=""></option>
                <option value="0.0">0.0</option>
                <option value="1.0">1.0</option>
                <option value="2.0">2.0</option>
                <option value="3.0">3.0</option>
                <option value="4.0">4.0</option>
                <option value="5.0">5.0</option>
                <option value="6.0">2.0</option>
                <option value="7.0">3.0</option>
                <option value="8.0">8.0</option>
                <option value="9.0">9.0</option>
                <option value="10.0">10.0</option>
            </select>
        </div>

        <div class="form-group">
            <label>Value for Money :</label>
            <select class="form-control" name="sc_money" required>
                <option value=""></option>
                <option value="0.0">0.0</option>
                <option value="1.0">1.0</option>
                <option value="2.0">2.0</option>
                <option value="3.0">3.0</option>
                <option value="4.0">4.0</option>
                <option value="5.0">5.0</option>
                <option value="6.0">2.0</option>
                <option value="7.0">3.0</option>
                <option value="8.0">8.0</option>
                <option value="9.0">9.0</option>
                <option value="10.0">10.0</option>
            </select>
        </div>

        <div class="form-group">
            <label>Condition Car :</label>
            <select class="form-control" name="sc_cond" required>
                <option value=""></option>
                <option value="0.0">0.0</option>
                <option value="1.0">1.0</option>
                <option value="2.0">2.0</option>
                <option value="3.0">3.0</option>
                <option value="4.0">4.0</option>
                <option value="5.0">5.0</option>
                <option value="6.0">2.0</option>
                <option value="7.0">3.0</option>
                <option value="8.0">8.0</option>
                <option value="9.0">9.0</option>
                <option value="10.0">10.0</option>
            </select>
        </div>

        <div class="form-group">
            <label>Location :</label>
            <select class="form-control" name="sc_loc" required>
                <option value=""></option>
                <option value="0.0">0.0</option>
                <option value="1.0">1.0</option>
                <option value="2.0">2.0</option>
                <option value="3.0">3.0</option>
                <option value="4.0">4.0</option>
                <option value="5.0">5.0</option>
                <option value="6.0">2.0</option>
                <option value="7.0">3.0</option>
                <option value="8.0">8.0</option>
                <option value="9.0">9.0</option>
                <option value="10.0">10.0</option>
            </select>
        </div>

        <div class="form-group">
            <label>Friendly :</label>
            <select class="form-control" name="sc_friendly" required>
                <option value=""></option>
                <option value="0.0">0.0</option>
                <option value="1.0">1.0</option>
                <option value="2.0">2.0</option>
                <option value="3.0">3.0</option>
                <option value="4.0">4.0</option>
                <option value="5.0">5.0</option>
                <option value="6.0">2.0</option>
                <option value="7.0">3.0</option>
                <option value="8.0">8.0</option>
                <option value="9.0">9.0</option>
                <option value="10.0">10.0</option>
            </select>
        </div>

        <div class="form-group">
            <label>Option of Car :</label>
            <select class="form-control" name="sc_option" required>
                <option value=""></option>
                <option value="0.0">0.0</option>
                <option value="1.0">1.0</option>
                <option value="2.0">2.0</option>
                <option value="3.0">3.0</option>
                <option value="4.0">4.0</option>
                <option value="5.0">5.0</option>
                <option value="6.0">6.0</option>
                <option value="7.0">7.0</option>
                <option value="8.0">8.0</option>
                <option value="9.0">9.0</option>
                <option value="10.0">10.0</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Feedback :  </label>
            <textarea class="form-control" rows="5" cols="30" name="sc_feedback" value="" required>
            </textarea>
        </div>

        <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Submit">
</div>
</div>
	 </form>
</section>