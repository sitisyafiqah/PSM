<div class="col-md-4 col-md-offset-4">
<h1 class="page-header">Search Your Car</h1>
<!--<div class="col-lg-6">-->
    <form role="form" action="" method="POST" enctype="multipart/form-data">
        <?php user_search(); ?>
        
        <div class="form-group">
            <label>Pickup Date</label>
            <input type="date" class="form-control" name="car_pickup" value="" required> 
        </div>
        <div class="form-group">
            <label>Return Date</label>
            <input type="date" class="form-control" name="car_return" value="" required>
        </div>
        
        <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Search">
       
    </form>
</div>
</section>


<!--					 startdate and enddate validation in javascript-->
                    
                       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>



    <script type="text/javascript">
        $('#car_pickup').datepicker({
            minDate: 0,
    onSelect: function(dateText, inst){
        $('#car_return').datepicker('option', 'minDate', new Date(dateText));
    },
	
	
});

$('#car_return').datepicker({
    minDate: 0,
    onSelect: function(dateText, inst){
        $('#car_pickup').datepicker('option', 'maxDate', new Date(dateText));
    }
	
	
});
    </script>      