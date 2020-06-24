<?php
   $thisPage="Patient Registration";
	
   include('includes/header.php');

?>
<div class="main-content">

    <form id="registration" action="patient-registration.php" method="post" style="padding:20px;">

        <fieldset class="col-md-8" style="margin: auto;">
            <h2 style="margin-bottom: 20px;"> Patient Registration</h2>

            <div class="border bg-light py-3 px-lg-4" style="border-radius:10px; margin-bottom:10px;">

                <h4 style="margin-bottom: 20px;">Personal Details </h4>

                <?php include('controller/errors.php'); ?>


                <div class="input-group">
                    <span class="input-group-text">First Name</span>
                    <input type="text" class="form-control" required value="" name="First_Name">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Last Name</span>
                    <input type="text" class="form-control" required value="" name="Last_Name">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">Email ID</span>
                    <input type="email" class="form-control" required value="" name="EmailID">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Password</span>
                    <input type="password" class="form-control" required value="" name="Password">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Phone number</span>
                    <input type="text" class="form-control" required value="" name="Phone_number">
                </div>

                <div class="input-group">
                    <span for="date-input" class="input-group-text">Date of Birth </span>
                    <input class="form-control" type="date" value="" name="BirthDate">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Address</span>
                    <input type="text" class="form-control" required value="" name="Address">
                </div>

                <div class="input-group">
                    <select class="custom-select" name="DoctorId" required>
                        <option selected>Select Doctor </option>
                        <?php 
                            $records = mysqli_query($conn, "SELECT * FROM doctorsdetails WHERE Availability='Yes'");
                            while ($row = mysqli_fetch_assoc($records)) {
                                $docid = $row['DoctorId'];
                                $fname = $row['FirstName'];
                                $lname = $row['LastName'];
                        ?>
                                <option value="<?php echo $docid; ?>"><?php echo $fname ," ", $lname; ?></option>
                        <?php    
                            }
                        ?>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Social Security number</span>
                    <input type="text" class="form-control" required value="" name="Social_Security">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Gender</span>
                    <select class="custom-select" name="Gender" required>
                        <option  >Select</option>
                        <option  value="Male">Male</option>
                        <option  value="Female">Female</option>
                        <option  value="Other">Other</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Height</span>
                    <input type="text" class="form-control" required value="" name="Height">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Weight</span>
                    <input type="text" class="form-control" required value="" name="Weight">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Marital Status</span>
                    <select class="custom-select" name="Marital_Status" required>
                        <option > Select</option>
                        <option  value="Single">Single</option>
                        <option  value="Married">Married</option>
                        <option  value="Divorced">Divorced</option>
                        <option  value="Widowed">Widowed</option>
                        <option  value="Other">Other</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Occupation</span>
                    <select class="custom-select" name="Occupation" required>
                        <option > Select</option>
                        <option  value="Employed">Employed</option>
                        <option  value="Unemployed">Unemployed</option>
                        <option  value="Retired">Retired</option>
                    </select>
                </div>
            </div>
            <div class="border bg-light py-3 px-lg-4" style="border-radius:10px; margin-bottom:10px;">

                <h4 style="margin-bottom: 20px;"> General Medical History </h4>

                <div class="input-group">
                    <span class="input-group-text">Cholesterol</span>
                    <select class="custom-select" name="Cholesterol" required>
                        <option > Select</option>
                        <option  value="Yes">Yes</option>
                        <option  value="No">No</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">BloodPressure</span>
                    <select class="custom-select" name="BloodPressure" required>
                        <option > Select</option>
                        <option  value="Yes">Yes</option>
                        <option  value="No">No</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">HeartDisease</span>
                    <select class="custom-select" name="HeartDisease" required>
                        <option > Select</option>
                        <option  value="Yes">Yes</option>
                        <option  value="No">No</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Hepatitis B</span>
                    <select class="custom-select" name="HepatitisB" required>
                        <option > Select</option>
                        <option  value="Yes">Yes</option>
                        <option  value="No">No</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">ChickenPox</span>
                    <select class="custom-select" name="ChickenPox" required>
                        <option > Select</option>
                        <option  value="IMMUNE">IMMUNE</option>
                        <option value="NOT IMMUNE">NOT IMMUNE</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Measles</span>
                    <select class="custom-select" name="Measles" required>
                        <option > Select</option>
                        <option  value="IMMUNE">IMMUNE</option>
                        <option  value="NOT IMMUNE">NOT IMMUNE</option>
                    </select>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Medical History</span>
                    <input type="text" class="form-control" required value="" name="Medical_History">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Vaccination History</span>
                    <input type="text" class="form-control" required value="" name="Vaccination_History">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Other Health Issues</span>
                    <input type="text" class="form-control" required value="" name="OtherHealthIssues">
                </div>

            </div>
        
            <div class="col py-3 px-lg-4 border bg-light" style="border-radius:10px; margin-bottom:10px;">
                <h4 style="margin-bottom: 20px;"> Emergency Contact 1: </h4>
                <div class="input-group">
                    <span class="input-group-text">First Name</span>
                    <input type="text" class="form-control" required value="" name="Emerg_FirstName">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">Last Name</span>
                    <input type="text" class="form-control" required value="" name="Emerg_LastName">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">Relationship</span>
                    <input type="text" class="form-control" required value="" name="Emerg_Relation">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">Phone Number 1</span>
                    <input type="text" class="form-control" required value="" name="Emerg_PhoneNumber1">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">Phone Number 2</span>
                    <input type="text" class="form-control" value="" name="Emerg_PhoneNumber2">
                </div>
            </div>       
                    
        
            <div class="col py-3 px-lg-4 border bg-light" style="border-radius:10px;">
                    
                <h4 style="margin-bottom: 20px;">Emergency Contact 2: </h4>
                <div class="input-group">
                    <span class="input-group-text">First Name</span>
                    <input type="text" class="form-control" required value="" name="Emerg2_FirstName">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">Last Name</span>
                    <input type="text" class="form-control" required value="" name="Emerg2_LastName">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">Relationship</span>
                    <input type="text" class="form-control" required value="" name="Emerg2_Relation">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">Phone Number 1</span>
                    <input type="text" class="form-control" required value="" name="Emerg2_PhoneNumber1">
                </div>
                
                <div class="input-group">
                    <span class="input-group-text">Phone Number 2</span>
                    <input type="text" class="form-control" value="" name="Emerg2_PhoneNumber2">
                </div>
            </div>
                
            <div style="text-align: center">
                <input type="submit" name="register_btn" class="btn btn-primary">
            </div>
        </fieldset>


    </form>

</div>
</div>



<?php
 include('includes/footer.php');
?>
