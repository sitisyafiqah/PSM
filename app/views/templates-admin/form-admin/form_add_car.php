

   <h1 class="page-header">Add Car</h1>
<div class="col-md-6">
	<div class="list-group-item">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        <?php add_car(); ?>
        <div class="form-group">
            <label>Car Plat</label>
            <input type="text" class="form-control" name="car_plat">
        </div>
        
        <div class="form-group">
            <label>Car Name</label>
            <input type="text" class="form-control" name="car_name">
        </div>
        
        <div class="form-group">
            <label>Number of Passenger</label>
            <input type="text" class="form-control" name="car_pass">
        </div>
		</div></div>
	<div class="col-md-6">
	<div class="list-group-item">
        <div class="form-group">
            <label>Car Status :</label>
            <select class="form-control" name="car_trans">
                <option value="MANUAL">MANUAL</option>
				<option value="AUTO">AUTO</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Rental Rate</label>
            <input type="text" class="form-control" name="car_rental">
        </div>
        
        <div class="form-group">
            <label>Car Image</label>
            <a href="#" class="thumbnail" style="width:100px">
                <img src="car_images" alt="">
            </a>
            <input type="file" name="file">
        </div>
        
        <button type="submit" name="register" class="btn btn-default">Register Car</button>
        <button type="reset" class="btn btn-default">Reset Button</button>
    </form>
	</div></div>