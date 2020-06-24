<?php
    $thisPage="My Account";
    include_once("controller/functions.php");
    include('includes/header.php');
    
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        
          header('location: login.php');
      }
            
      if (isLoggedIn()) {
        $id = $_SESSION['user']['id'];
        $record = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
      
          $n = mysqli_fetch_array($record);
      
          $FirstName    =  $n['FirstName'];
          $LastName    	=  $n['LastName'];
          $Email    =   $n['Email'];
          $Password =   $n['Password'];
      }
?>
        
    <div class="main-content">

          <form id="user-account" method="post" action="my-account.php" style="padding: 20px;">
            
            <fieldset class="col-md-8 bg-light py-3 px-lg-4" style="margin: auto; border-radius:10px;">
                    
                <h2>Modify - Account Details</h2>
                
                <?php include('controller/errors.php'); ?>


                <div class="input-group">
                    <label class="input-group-text">Full Name</label>
                    <input type="text" readonly class="form-control" value="<?php echo $FirstName,' ' , $LastName ; ?>" name="FullName">
                </div>
                <div class="input-group">
                    <label class="input-group-text">Email</label>
                    <input type="email" class="form-control" value="<?php echo $Email ; ?>" name="Email">
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
                    <button type="submit" style="margin: 10px 0 0 0;" class="btn btn-primary" name="modify-account-details">Modify</button>
                </div>
            </fieldset>    
        </form>
        
         




    <!-- Don't delete both the divs after this comment -->
    </div>
        
</div>

<?php
	include('includes/footer.php');
?>