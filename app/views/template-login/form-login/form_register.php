
<br>
<br>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign Up</h3>
                    </div>
                    <?php email_exist(); //to check if email exist ?>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <?php register_user();
						
							
							?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="FullName" name="user_fullname" type="text" required>
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="user_email" type="email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone Number" name="user_phone" type="tel" minlength="10" maxlength="11" required>
                                </div>
                                <div class="form-group">
            						<label>Address :  </label>
									<textarea class="form-control" rows="5" cols="30" name="address" value="" required>
            						</textarea>
        						</div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="user_password" type="password" minlength="8" maxlength="12" value="" required>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="register" class="btn btn-lg btn-success btn-block" value="Sign-Up">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>