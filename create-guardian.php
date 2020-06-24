<?php
    $thisPage="Create Guardian Account";
    include_once("controller/functions.php");
    include('includes/header.php');
?>
        
    <div class="main-content">
        
        
        <form id="create-guardian-form" method="post" action="create-guardian.php" style="padding: 20px;">
            
            <fieldset class="col-md-8 bg-light py-3 px-lg-4" style="margin: auto; border-radius:10px;">

                <?php include('controller/errors.php'); ?>
                    
                    <h2>Create Guardian Account</h2>

                <div class="input-group">
                    <label class="input-group-text">First Name</label>
                    <input type="text" class="form-control" name="FirstName">
                </div>
                <div class="input-group">
                    <label class="input-group-text">Last Name</label>
                    <input type="text" class="form-control" name="LastName">
                </div>
                <div class="input-group">
                    <label class="input-group-text">Email</label>
                    <input type="email" class="form-control" name="Email">
                </div>
                <div class="input-group">
                    <label class="input-group-text">Password</label>
                    <input type="password" name="Password_1" class="form-control">
                </div>
                <div class="input-group">
                    <label class="input-group-text">Confirm password</label>
                    <input type="password" name="Password_2" class="form-control">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn btn-primary btn-md" name="create_guardian_ac">Create Account</button>
                </div>
            </fieldset>    
        </form>
          
        
            
    </div>
        
</div>

<?php
	include('includes/footer.php');
?>
