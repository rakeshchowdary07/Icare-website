<?php
     $thisPage="Login";
     include('includes/header.php'); 
     //include('controller/functions.php');

?>
        
    <div class="main-content">
    
        <div class="text-center" style="width: 340px; margin: 50px auto;">
            <form action="login.php" method="post" style="margin-bottom: 15px; background:#f7f7f7; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3); padding: 30px;">
                <h2 class="text-center">Log In</h2> 

                    <?php include('controller/errors.php'); ?>

                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="login_user">Log In</button>
                </div>
        
                
            </form>
            <p class="text-center"><a href="patient-registration.php">Create an Account</a></p>

        </div>
        
            
    </div>
        
</div>

<?php
	include('includes/footer.php');
?>

<!--    
        <div class="header">
            <h2>Login</h2>
        </div>
        <form method="post" action="login.php">
        ?php include('controller/errors.php'); ?>
  	        <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" >
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_user">Login</button>
            </div>
            <p>
                Not yet a member? <a href="register.php">Sign up</a>
            </p>
        </form>

         -->