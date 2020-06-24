<?php
   $thisPage="Patient Details";
    include_once("controller/functions.php");
	if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        
          header('location: login.php');
      }

   include('includes/header.php');

   if (isLoggedIn()) {
  
    $id = $_SESSION['user']['id'];
	$record = mysqli_query($conn, "SELECT * FROM patient WHERE idPatient=$id");
	$n = mysqli_fetch_array($record);
	   
	
	$First_Name               =$n['First_Name'];
    $Last_Name                =$n['Last_Name'];
	$Phone_number             =$n['Phone_number'];
    $BirthDate                =$n['BirthDate'];
    $Address                  =$n['Address'];
    //$Username                 =$n['Username'];
    $DoctorId                 =$n['DoctorId'];
    $EmailID                  =$n['EmailID'];
    $Social_Security	      =$n['Social_Security'];
    $Gender                   =$n['Gender'];
    $Height                   =$n['Height'];
    $Weight                   =$n['Weight'];
    $Marital_Status           =$n['Marital_Status'];
    $Occupation               =$n['Occupation'];
    $Cholesterol              =$n['Cholesterol'];
    $BloodPressure            =$n['BloodPressure'];
    $HeartDisease             =$n['HeartDisease'];
    $HepatitisB               =$n['HepatitisB'];
    $ChickenPox               =$n['ChickenPox'];
    $Measles                  =$n['Measles'];
    $Medical_History          =$n['Medical_History'];
    $Vaccination_History      =$n['Vaccination_History'];
    $OtherHealthIssues        =$n['OtherHealthIssues'];
    $Emerg_FirstName          =$n['Emerg_FirstName'];
    $Emerg_LastName           =$n['Emerg_LastName'];
    $Emerg_Relation            =$n['Emerg_Relation'];
    $Emerg_PhoneNumber1       =$n['Emerg_PhoneNumber1'];
    $Emerg_PhoneNumber2       =$n['Emerg_PhoneNumber2'];
    $Emerg2_FirstName         =$n['Emerg2_FirstName'];
    $Emerg2_LastName          =$n['Emerg2_LastName'];
    $Emerg2_Relation          =$n['Emerg2_Relation'];
    $Emerg2_PhoneNumber1      =$n['Emerg2_PhoneNumber1'];
    $Emerg2_PhoneNumber2      =$n['Emerg2_PhoneNumber2'];
    
   }

	 
	 ?>
    <div class="main-content">

        <form id="patient-details" action="patient-details.php" method="post" style="padding:20px;">

        <fieldset class="col-md-8" style="margin: auto;">

            <div class="border bg-light py-3 px-lg-4" style="border-radius:10px; margin-bottom:10px;">

                <h3 style="margin-bottom: 20px;">Personal Details </h3>


                <div class="input-group">
                    <span class="input-group-text">First Name</span>
                    <input type="text" class="form-control" required value="<?php echo $First_Name ; ?>" name="First_Name">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Last Name</span>
                    <input type="text" class="form-control" required value="<?php echo $Last_Name ; ?>" name="Last_Name">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Phone number</span>
                    <input type="text" class="form-control" required value="<?php echo $Phone_number ; ?>" name="Phone_number">
                </div>

                <div class="input-group">
                    <span for="date-input" class="input-group-text">Date of Birth </span>
                    <input class="form-control" type="date" value="<?php echo $BirthDate ; ?>" name="BirthDate">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Address</span>
                    <input type="text" class="form-control" required value="<?php echo $Address ; ?>" name="Address">
                </div>
                <div class="input-group">
                    <select class="custom-select" name="DoctorId" required>
                        <option>Select Doctor </option>
                        <?php 
                            $records = mysqli_query($conn, "SELECT * FROM doctorsdetails WHERE Availability='Yes'");
                            while ($row = mysqli_fetch_assoc($records)) {
                                $docid = $row['DoctorId'];
                                $fname = $row['FirstName'];
                                $lname = $row['LastName'];
                        ?>
                                <option <?php if($DoctorId == $docid) echo 'selected'; ?> value="<?php echo $docid; ?>"><?php echo $fname ," ", $lname; ?></option>
                        <?php    
                            }
                        ?>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">EmailID</span>
                    <input type="text" class="form-control" required value="<?php echo $EmailID ; ?>" name="EmailID">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Social Security number</span>
                    <input type="text" class="form-control" required value="<?php echo $Social_Security ; ?>" name="Social_Security">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Gender</span>
                    <select class="custom-select" name="Gender" required>
                        <option <?php if($Gender == "Male")echo "selected" ?> value="Male">Male</option>
                        <option <?php if($Gender == "Female")echo "selected" ?> value="Female">Female</option>
                        <option <?php if($Gender == "Other")echo "selected" ?> value="Other">Other</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Height</span>
                    <input type="text" class="form-control" required value="<?php echo $Height ; ?>" name="Height">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Weight</span>
                    <input type="text" class="form-control" required value="<?php echo $Weight ; ?>" name="Weight">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Marital Status</span>
                    <select class="custom-select" name="Marital_Status" required>
                        <option <?php if($Marital_Status == "Single")echo "selected" ?> value="Single">Single</option>
                        <option <?php if($Marital_Status == "Married")echo "selected" ?> value="Married">Married</option>
                        <option <?php if($Marital_Status == "Divorced")echo "selected" ?> value="Divorced">Divorced</option>
                        <option <?php if($Marital_Status == "Widowed")echo "selected" ?> value="Widowed">Widowed</option>
                        <option <?php if($Marital_Status == "Other")echo "selected" ?> value="Other">Other</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Occupation</span>
                    <select class="custom-select" name="Occupation" required>
                        <option <?php if($Occupation == "Employed")echo "selected" ?> value="Employed">Employed</option>
                        <option <?php if($Occupation == "Unemployed")echo "selected" ?> value="Unemployed">Unemployed</option>
                        <option <?php if($Occupation == "Retired")echo "selected" ?> value="Retired">Retired</option>
                    </select>
                </div>
            </div>
            <div class="border bg-light py-3 px-lg-4" style="border-radius:10px; margin-bottom:10px;">
                <h3 style="margin-bottom: 20px;"> General Medical History </h3>

                <div class="input-group">
                    <span class="input-group-text">Cholesterol</span>
                    <select class="custom-select" name="Cholesterol" required>
                        <option <?php if($Cholesterol == "Yes")echo "selected" ?> value="Yes">Yes</option>
                        <option <?php if($Cholesterol == "No")echo "selected" ?> value="No">No</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">BloodPressure</span>
                    <select class="custom-select" name="BloodPressure" required>
                        <option <?php if($BloodPressure == "Yes")echo "selected" ?> value="Yes">Yes</option>
                        <option <?php if($BloodPressure == "No")echo "selected" ?> value="No">No</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">HeartDisease</span>
                    <select class="custom-select" name="HeartDisease" required>
                        <option <?php if($HeartDisease == "Yes")echo "selected" ?> value="Yes">Yes</option>
                        <option <?php if($HeartDisease == "No")echo "selected" ?> value="No">No</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Hepatitis B</span>
                    <select class="custom-select" name="HepatitisB" required>
                        <option <?php if($HepatitisB == "Yes")echo "selected" ?> value="Yes">Yes</option>
                        <option <?php if($HepatitisB == "No")echo "selected" ?> value="No">No</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">ChickenPox</span>
                    <select class="custom-select" name="ChickenPox" required>
                        <option <?php if($ChickenPox == "IMMUNE")echo "selected" ?> value="IMMUNE">IMMUNE</option>
                        <option <?php if($ChickenPox == "NOT IMMUNE")echo "selected" ?> value="NOT IMMUNE">NOT IMMUNE</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Measles</span>
                    <select class="custom-select" name="Measles" required>
                        <option <?php if($Measles == "IMMUNE")echo "selected" ?> value="IMMUNE">IMMUNE</option>
                        <option <?php if($Measles == "NOT IMMUNE")echo "selected" ?> value="NOT IMMUNE">NOT IMMUNE</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Medical History</span>
                    <input type="text" class="form-control" required value="<?php echo $Medical_History ; ?>" name="Medical_History">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Vaccination History</span>
                    <input type="text" class="form-control" required value="<?php echo $Vaccination_History ; ?>" name="Vaccination_History">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Other Health Issues</span>
                    <input type="text" class="form-control" required value="<?php echo $OtherHealthIssues ; ?>" name="OtherHealthIssues">
                </div>
                
            </div>
            <div class="col py-3 px-lg-4 border bg-light" style="border-radius:10px; margin-bottom:10px;">
                    <h3 style="margin-bottom: 20px;"> Emergency Contact 1: </h3>
                    <div class="input-group">
                        <span class="input-group-text">First Name</span>
                        <input type="text" class="form-control" required value="<?php echo $Emerg_FirstName ; ?>" name="Emerg_FirstName">
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-text">Last Name</span>
                        <input type="text" class="form-control" required value="<?php echo $Emerg_LastName ; ?>" name="Emerg_LastName">
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-text">Relationship</span>
                        <input type="text" class="form-control" required value="<?php echo $Emerg_Relation ; ?>" name="Emerg_Relation">
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-text">PhoneNumber1</span>
                        <input type="text" class="form-control" required value="<?php echo $Emerg_PhoneNumber1 ; ?>" name="Emerg_PhoneNumber1">
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-text">PhoneNumber2</span>
                        <input type="text" class="form-control" value="<?php echo $Emerg_PhoneNumber2 ; ?>" name="Emerg_PhoneNumber2">
                    </div>
            </div>

            <div class="col py-3 px-lg-4 border bg-light" style="border-radius:10px;">
                
                <h3 style="margin-bottom: 20px;">Emergency Contact 2: </h3>
                <div class="input-group">
                    <span class="input-group-text">First Name</span>
                    <input type="text" class="form-control" required value="<?php echo $Emerg2_FirstName ; ?>" name="Emerg2_FirstName">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">Last Name</span>
                    <input type="text" class="form-control" required value="<?php echo $Emerg2_LastName ; ?>" name="Emerg2_LastName">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">Relationship</span>
                    <input type="text" class="form-control" required value="<?php echo $Emerg2_Relation ; ?>" name="Emerg2_Relation">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">PhoneNumber1</span>
                    <input type="text" class="form-control" required value="<?php echo $Emerg2_PhoneNumber1 ; ?>" name="Emerg2_PhoneNumber1">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">PhoneNumber2</span>
                    <input type="text" class="form-control" value="<?php echo $Emerg2_PhoneNumber2 ; ?>" name="Emerg2_PhoneNumber2">
                </div>
                

            </div>
            <div style="text-align:center; margin-top:20px;">    
                <button class="btn btn-success" type="submit" name="update-patient-details" style="" >Update</button>
            </div>
        </fieldset>


    </form>

</div>
</div>
        

<?php
 include('includes/footer.php');
?>

