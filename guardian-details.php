<?php
$thisPage = "Guardian Details";
include_once("controller/functions.php");

if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  
    header('location: login.php');
}

include('includes/header.php');

if (isLoggedIn()) {
  $id = $_SESSION['user']['id'];
  $record = mysqli_query($conn, "SELECT * FROM guardian WHERE GuardianId=$id");

    $n = mysqli_fetch_array($record);
    
    $Phone  			=  $n['Phone'];
    $Street   	 =  $n['Street'];
    $City   			=  $n['City'];
    $Country 			=  $n['Country'];
    $Gender 	=  $n['Gender'];
    $DOB		=  $n['DOB'];
  
    $record = mysqli_query($conn, "SELECT FirstName, LastName FROM users WHERE id=$id");
    $n = mysqli_fetch_array($record);
    $FirstName    			=  $n['FirstName'];
    $LastName    			=  $n['LastName'];
    
}

?>
  <div class="main-content">
  

    <form id="doctor-details-registration" action="doctor-details.php" method="post" style="padding: 20px;" >

      <fieldset class="col-md-8 bg-light py-3 px-lg-4" style="margin: auto; border-radius:10px;">
          <h2 style="margin-bottom: 20px;"> Personal Details </h2>

          <div class="input-group">
                <span class="input-group-text" readonly>First Name</span>
              <input type="text" class="form-control" required value="<?php echo $FirstName ; ?>" name="FirstName">
          </div>
          <div class="input-group">
                <span class="input-group-text" readonly>Last Name</span>
              <input type="text" class="form-control" required value="<?php echo $LastName ; ?>" name="LastName">
          </div>
          <div class="input-group">
              <span class="input-group-text" >Phone</span>
              <input type="text" maxlength="10" class="form-control"  name="Phone" required value="<?php echo $Phone ; ?>">
          </div>
          <div class="input-group">
            <span class="input-group-text" class="optional" id="">Street </span>
            <input type="text" class="form-control" name="Street" required value="<?php echo $Street ; ?>">
          </div>
          <div class="input-group">
            <span class="input-group-text" id="">City 
            </span>
            <input type="text" class="form-control" name="City" required value="<?php echo $City ; ?>" >
          </div>
          <div class="input-group">
            <span class="input-group-text" id="">Country 
            </span>
            <input type="text" class="form-control" name="Country" required value="<?php echo $Country ; ?>">
          </div>
          <div class="input-group">
            <select class="custom-select" name="Gender" required>
              <option <?php if($Gender == "Male")echo "selected" ?>  value="Male">Male</option>
              <option <?php if($Gender == "Female")echo "selected" ?> value="Female">Female</option>
              <option <?php if($Gender == "Other")echo "selected" ?> value="Other">Other</option>
            </select>
          </div>
          <div class="input-group">
              <span for="date-input" class="input-group-text">Date * </span>
              <input class="form-control" type="date" value="<?php echo $DOB ; ?>" name="DOB">
          </div>

          <div style="text-align:center;">
            <button class="btn btn-success" type="submit" name="update-guardian-details" >Update</button>
          </div>

      </fieldset>
        
        
    </form>


  </div> 
</div> 

    <?php
include('includes/footer.php');
?>
