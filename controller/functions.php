<?php

if(!isset($_SESSION)){session_start();}
//session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'mydb');

// REGISTER Patient Button
if (isset($_POST['register_btn'])) {
  patient_registeration();
}

// REGISTER Doctor Button
if (isset($_POST['create_temp_doc_ac'])) {
  create_temp_ac();
}

//Create guardian account
if (isset($_POST['create_guardian_ac'])) {

  global $conn, $errors;

  $firstname = mysqli_real_escape_string($conn, $_POST['FirstName']);
  $lastname = mysqli_real_escape_string($conn, $_POST['LastName']);
  $email = mysqli_real_escape_string($conn, $_POST['Email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['Password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['Password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  if (empty($firstname)) { array_push($errors, "First Name is required"); }
  if (empty($lastname)) { array_push($errors, "Last Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	  array_push($errors, "Passwords do not match");
  }

  // first check the database to make sure a user does not already exist with the same email
  $user_check_query = "SELECT * FROM users WHERE Email='$email'";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if email exists
    if ($user['Email'] == $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

    //encrypt the password before saving in the database
  	$password = md5($password_1);
    
    //Insert data into user table
    $query = "INSERT INTO users (FirstName, LastName, Email, user_type, Password) 
  			  VALUES('$firstname', '$lastname', '$email', 'guardian', '$password')";
    mysqli_query($conn, $query);
    
    $query = "SELECT id FROM users WHERE Email='$email'";
    $result = mysqli_query($conn, $user_check_query);
    $temp = mysqli_fetch_assoc($result);
    $id = $temp['id'];

    $PatientID = $_SESSION['user']['id'];


    mysqli_query($conn, "INSERT INTO guardian (GuardianId,  Phone, Street, City , Country, Gender, DOB, PatientID)
      VALUES('$id','', '','', '', '','', '$PatientID')
    ");


    }
}

// Create Room
if (isset($_POST['create_room'])) {

  global $conn, $errors;

  $RoomNo = mysqli_real_escape_string($conn, $_POST['RoomNo']);
  $Location = mysqli_real_escape_string($conn, $_POST['Location']);
  $Occupied = mysqli_real_escape_string($conn, $_POST['Occupied']);
  $HeartRate = mysqli_real_escape_string($conn, $_POST['Heartrate']);
  $Sleep = mysqli_real_escape_string($conn, $_POST['Sleepsensor']);
  $BloodPressure = mysqli_real_escape_string($conn, $_POST['Bloodpressure']);
  $PatientID = mysqli_real_escape_string($conn, $_POST['PatientID']);

  

  $check_query = "SELECT * FROM sensor WHERE RoomNo='$RoomNo'";
  $result = mysqli_query($conn, $check_query);
  $room = mysqli_fetch_assoc($result);

  if ($room) { // if room exists & RoomNo 0 is not accepted
    if ($room['RoomNo'] == $RoomNo) {
      array_push($errors, "Room Number already exists");
    }
    if ($room['RoomNo'] == 0) {
      array_push($errors, "Room Number 0 not allowed");
    }
  }

  if (count($errors) == 0) {

    //Inserting into room table
    $query = "INSERT INTO room (RoomNo, Location, Occupied, PatientID, HeartRateSensor, BloodPressureSensor, SleepSensor) VALUES('$RoomNo', '$Location', '$Occupied', '$PatientID','No' ,'No' ,'No')";
    mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));

    //Insert Sensors into sensor table only if that sensor is picked for the room
    if($HeartRate == "Yes") {
      $query = "INSERT INTO sensor (SensorName, RoomNo) 
            VALUES('Heartrate', '$RoomNo')";
      mysqli_query($conn, $query);
      $query = "SELECT * FROM sensor WHERE RoomNo='$RoomNo' AND SensorName='Heartrate' ";
      $result = mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));
      $temp= mysqli_fetch_assoc($result);
      $HeartRateID = $temp['SensorID'];
      mysqli_query($conn, "UPDATE room SET HeartRateSensor='$HeartRate', HeartRateSensorID = '$HeartRateID' WHERE RoomNo='$RoomNo' ") or die('MySQL Error: ' . mysqli_error($conn));

    }
    if($Sleep== "Yes") {
      $query = "INSERT INTO sensor (SensorName, RoomNo) 
            VALUES('Sleep', '$RoomNo')";
      mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));
      $query = "SELECT * FROM sensor WHERE RoomNo='$RoomNo' AND SensorName='Sleep'";
      $result = mysqli_query($conn, $query);
      $temp= mysqli_fetch_assoc($result);
      $SleepID = $temp['SensorID'];
      mysqli_query($conn, "UPDATE room SET SleepSensor='$Sleep', SleepSensorID = '$SleepID' WHERE RoomNo='$RoomNo' ") or die('MySQL Error: ' . mysqli_error($conn));
    }
    if($BloodPressure == "Yes") {
      $query = "INSERT INTO sensor (SensorName, RoomNo) 
            VALUES('BloodPressure', '$RoomNo')";
      mysqli_query($conn, $query);
      $query = "SELECT * FROM sensor WHERE RoomNo='$RoomNo' AND SensorName='BloodPressure'";
      $result = mysqli_query($conn, $query);
      $temp= mysqli_fetch_assoc($result);
      $BloodPressureID = $temp['SensorID'];
      mysqli_query($conn, "UPDATE room SET BloodPressureSensor='$BloodPressure', BloodPressureSensorID = '$BloodPressureID' WHERE RoomNo='$RoomNo' ") or die('MySQL Error: ' . mysqli_error($conn));
    }

    //Insert roomno into patient table 
    if($RoomNo != 0) {
      mysqli_query($conn, "UPDATE patient SET RoomNo='$RoomNo' WHERE idPatient='$PatientID' ") or die('MySQL Error: ' . mysqli_error($conn));
    }
    

  }

}
// Login Button
if (isset($_POST['login_user'])) {
  login();
}

// Create Temporary Doctor Account
function create_temp_ac(){

  global $conn, $errors;

  $firstname = mysqli_real_escape_string($conn, $_POST['FirstName']);
  $lastname = mysqli_real_escape_string($conn, $_POST['LastName']);
  $email = mysqli_real_escape_string($conn, $_POST['Email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['Password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['Password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  if (empty($firstname)) { array_push($errors, "First Name is required"); }
  if (empty($lastname)) { array_push($errors, "Last Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	  array_push($errors, "Passwords do not match");
  }

  // first check the database to make sure a user does not already exist with the same email
  $user_check_query = "SELECT * FROM users WHERE Email='$email'";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if email exists
    if ($user['Email'] == $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

    //encrypt the password before saving in the database
  	$password = md5($password_1);
    
    //Insert data into user table
    $query = "INSERT INTO users (FirstName, LastName, Email, user_type, Password) 
  			  VALUES('$firstname', '$lastname', '$email', 'doctor', '$password')";
  	mysqli_query($conn, $query);

    $query = "SELECT * FROM users WHERE Email = '$email'";
    $res = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($res);
    $id = $user['id'];

    $query = "INSERT INTO doctorsdetails
    (DoctorId, FirstName, LastName, Phone, Street, City, Country, Gender, DOB, Nationality, Speciality, Department, Qualifications, Availability)
    VALUES('$id', '$firstname', '$lastname', '', '','', '', '', '', '', '', '', '', 'No') ";
    mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));
    $_SESSION['success'] = "Blank Data Inserted" ;
    header('location: create-doctor.php');
  }
}

//Update Doctor Details
if (isset($_POST['update'])) {

  $id = $_SESSION['user']['id'];
  
	$FirstName    			=  $_POST['FirstName'];
  $LastName    			=  $_POST['LastName'];
  $Phone  			=  $_POST['Phone'];
  $Street   		    =  $_POST['Street'];
  $City   			=  $_POST['City'];
  $Country 			=  $_POST['Country'];
  $Gender 	=  $_POST['Gender'];
  $DOB		=  $_POST['DOB'];
  $Nationality	 	=  $_POST['Nationality'];
  $Speciality    		=  $_POST['Speciality'];
  $Department			=	$_POST['Department'];
  $Qualifications		=	$_POST['Qualifications'];
  $Availability		=	$_POST['Availability'];

  //Inserting data into users table
  mysqli_query($conn, "UPDATE users SET FirstName='$FirstName', Lastname = '$LastName' WHERE id='$id' ") or die('MySQL Error: ' . mysqli_error($conn));

  //Inserting data into doctorsdetails table
	mysqli_query($conn, "UPDATE doctorsdetails SET FirstName='$FirstName', Lastname = '$LastName', Phone= '$Phone', Street='$Street', City = '$City', Country= '$Country', Gender = '$Gender', DOB = '$DOB', Nationality = '$Nationality', Speciality = '$Speciality', Department = '$Department', Qualifications = '$Qualifications', Availability= '$Availability'
   WHERE DoctorId='$id'") or die('MySQL Error: ' . mysqli_error($conn));
	$_SESSION['message'] = "Personal Details Updated!"; 
	header('location: doctor-details.php');
}

//Update Doctor Comments
if (isset($_POST['update-comments'])) {
  $id = $_POST['patient_id'];
  $Doctor_Comments = $_POST['DoctorComments'];
  
  mysqli_query($conn, "UPDATE patient SET DoctorComments = '$Doctor_Comments' WHERE idPatient=$id");
  //$_SESSION['message'] = "Doctor's Comments Updated!"; 
  
}

//Update Guardian Details
if (isset($_POST['update-guardian-details'])) {

  $id = $_SESSION['user']['id'];
  
	//$FirstName    			=  $_POST['FirstName'];
  //$LastName    			=  $_POST['LastName'];
  $Phone  			=  $_POST['Phone'];
  $Street   		    =  $_POST['Street'];
  $City   			=  $_POST['City'];
  $Country 			=  $_POST['Country'];
  $Gender 	=  $_POST['Gender'];
  $DOB		=  $_POST['DOB'];
  

  //Inserting data into users table
 // mysqli_query($conn, "UPDATE users SET FirstName='$FirstName', Lastname = '$LastName' WHERE id='$id' ") or die('MySQL Error: ' . mysqli_error($conn));

  //Updating Guardian details table
	mysqli_query($conn, "UPDATE guardian SET Phone= '$Phone', Street='$Street', City = '$City', Country= '$Country', Gender = '$Gender', DOB = '$DOB'
   WHERE GuardianId='$id'") or die('MySQL Error: ' . mysqli_error($conn));
	$_SESSION['message'] = "Personal Details Updated!"; 
	header('location: guardian-details.php');
}

//Update Room Number
if (isset($_POST['update-roomno'])) { 

  $PatientID = $_POST['patient_id'];
  $RoomNo = $_POST['room_no']; 

   if($RoomNo != 0) {
    //Finding old room and deleting patient ID
    $query = "SELECT RoomNo FROM room WHERE PatientID='$PatientID' ";
    $result = mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));
    $temp = mysqli_fetch_assoc($result);
    $OldRoomNo = $temp['RoomNo'];
    $query = "UPDATE room SET PatientID = 0, Occupied = 'No' WHERE RoomNo='$OldRoomNo'";
    mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));

    //Inserting Patient ID in new room table
     $query = "UPDATE room SET PatientID = '$PatientID', Occupied = 'Yes' WHERE RoomNo='$RoomNo'";
     mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));
   
   //Insert roomno into patient table 
    mysqli_query($conn, "UPDATE patient SET RoomNo='$RoomNo' WHERE idPatient='$PatientID' ") or die('MySQL Error: ' . mysqli_error($conn));
  }

  
}

//Update Room Details
if (isset($_POST['modify-room'])) { 

  $RoomId = $_POST['RoomId']; 
  $RoomNo = $_POST['RoomNo'];
  $Location = $_POST['Location'];
  $Occupied = $_POST['Occupied'];
  $HeartRate = $_POST['Heartrate'];
  $Sleep = $_POST['Sleepsensor'];
  $BloodPressure = $_POST['Bloodpressure'];
  $PatientID = $_POST['PatientID'];
  
  $check_query = "SELECT * FROM room WHERE RoomID='$RoomId' AND NOT RoomNo='$RoomNo'";
  $result = mysqli_query($conn, $check_query);
  $room = mysqli_fetch_assoc($result);

  if (isset($room)) { // if room exists & RoomNo 0 is not accepted
    if ($room['RoomNo'] == $RoomNo) {
      array_push($errors, "Room Number already exists");
    }
    if ($room['RoomNo'] == 0) {
      array_push($errors, "Room Number 0 not allowed");
    }
  }

  if (count($errors) == 0) {
 
    $query = "UPDATE room SET RoomNo = '$RoomNo', Occupied = 'Occupied', HeartRateSensor ='$HeartRate', SleepSensor = '$Sleep', BloodPressureSensor = '$BloodPressure' 
    WHERE RoomID='$RoomId'";
    mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));

    if(isset($PatientID)) {
        if($PatientID == 0) {
          $query = "SELECT * FROM room WHERE RoomID='$RoomId' ";
          $result = mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));
          $temp = mysqli_fetch_assoc($result);
          $oldPatientId = $temp['PatientID'];
          
          //Reset Roomno to 0 in patient table
          $query = "UPDATE patient SET RoomNo = 0 WHERE idPatient= '$oldPatientId'";
          mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));

          //Set Patient id to 0 in room table
          $query = "UPDATE room SET PatientID = 0, Occupied = 'No' WHERE RoomID='$RoomId'";
          mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));

        } 
        else {
          $query = "SELECT * FROM room WHERE RoomID='$RoomId' AND NOT PatientID= '$PatientID' ";
          $result = mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));
          $temp = mysqli_fetch_assoc($result);
          $oldPatientId = $temp['PatientID'];

          //Reset Roomno to 0 in old patient's data
          $query = "UPDATE patient SET RoomNo = 0 WHERE idPatient= '$oldPatientId'";
          mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));

          //Inserting New Patient's ID into changed room 
          $query = "UPDATE room SET PatientID = '$PatientID', Occupied = 'Yes' WHERE RoomID='$RoomId'";
          mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));

          //Inserting Roomno in new patient's data
          mysqli_query($conn, "UPDATE patient SET RoomNo='$RoomNo' WHERE idPatient='$PatientID' ") or die('MySQL Error: ' . mysqli_error($conn));
        }

    }
      
      
    }

  
}

//Update patient Details
if (isset($_POST['update-patient-details'])) {

    $id = $_SESSION['user']['id'];
  
	  $First_Name               =$_POST['First_Name'];
    $Last_Name                =$_POST['Last_Name'];
	  $Phone_number             =$_POST['Phone_number'];
    $BirthDate                =$_POST['BirthDate'];
    $Address                  =$_POST['Address'];
    $DoctorId                 =$_POST['DoctorId'];
    $EmailID                  =$_POST['EmailID'];
    $Social_Security	      =$_POST['Social_Security'];
    $Gender                   =$_POST['Gender'];
    $Height                   =$_POST['Height'];
    $Weight                   =$_POST['Weight'];
    $Marital_Status           =$_POST['Marital_Status'];
    $Occupation               =$_POST['Occupation'];
    $Cholesterol              =$_POST['Cholesterol'];
    $BloodPressure            =$_POST['BloodPressure'];
    $HeartDisease             =$_POST['HeartDisease'];
    $HepatitisB               =$_POST['HepatitisB'];
    $ChickenPox               =$_POST['ChickenPox'];
    $Measles                  =$_POST['Measles'];
    $Medical_History          =$_POST['Medical_History'];
    $Vaccination_History      =$_POST['Vaccination_History'];
    $OtherHealthIssues        =$_POST['OtherHealthIssues'];
    $Emerg_FirstName          =$_POST['Emerg_FirstName'];
    $Emerg_LastName           =$_POST['Emerg_LastName'];
    $Emerg_Relation            =$_POST['Emerg_Relation'];
    $Emerg_PhoneNumber1       =$_POST['Emerg_PhoneNumber1'];
    $Emerg_PhoneNumber2       =$_POST['Emerg_PhoneNumber2'];
    $Emerg2_FirstName         =$_POST['Emerg2_FirstName'];
    $Emerg2_LastName          =$_POST['Emerg2_LastName'];
    $Emerg2_Relation          =$_POST['Emerg2_Relation'];
    $Emerg2_PhoneNumber1      =$_POST['Emerg2_PhoneNumber1'];
    $Emerg2_PhoneNumber2      =$_POST['Emerg2_PhoneNumber2'];

    //Inserting data into users table
    mysqli_query($conn, "UPDATE users SET FirstName='$First_Name', Lastname = '$Last_Name' WHERE idPatient=$id");

    //Inserting data into patient table
	  mysqli_query($conn, "UPDATE patient SET First_Name='$First_Name', Last_Name = '$Last_Name', Phone_number= '$Phone_number', BirthDate='$BirthDate', Address = '$Address', DoctorId= '$DoctorId', EmailID = '$EmailID', Social_Security = '$Social_Security', Gender = '$Gender', Height = '$Height', Weight = '$Weight', Marital_Status = '$Marital_Status', Occupation= '$Occupation',Cholesterol='$Cholesterol',BloodPressure='$BloodPressure',HeartDisease='$HeartDisease',HepatitisB='$HepatitisB',ChickenPox='$ChickenPox',Measles='$Measles',Medical_History='$Medical_History',Vaccination_History='$Vaccination_History',OtherHealthIssues='$OtherHealthIssues',Emerg_FirstName='$Emerg_FirstName',Emerg_LastName='$Emerg_LastName',Emerg_Relation='$Emerg_Relation',Emerg_PhoneNumber1='$Emerg_PhoneNumber1',Emerg_PhoneNumber2='$Emerg_PhoneNumber2',Emerg2_FirstName='$Emerg2_FirstName',Emerg2_LastName='$Emerg2_LastName',Emerg2_Relation='$Emerg2_Relation',Emerg2_PhoneNumber1='$Emerg2_PhoneNumber1',Emerg2_PhoneNumber2='$Emerg2_PhoneNumber2'
    WHERE idPatient=$id");
	  $_SESSION['message'] = "Patient Details Updated!"; 
	  header('location: patient-details.php');
}

//Patient Registration
function patient_registeration() {

  global $conn, $errors;

  // receive all input values from the form

    $FirstName               =$_POST['First_Name'];
    $LastName                =$_POST['Last_Name'];
    $EmailID                  =$_POST['EmailID'];
    $Phone_number             =$_POST['Phone_number'];
    $BirthDate                =$_POST['BirthDate'];
    $Address                  =$_POST['Address'];
    $Password                =$_POST["Password"];
    $DoctorId                 =$_POST['DoctorId'];
    $Social_Security	      =$_POST['Social_Security'];
    $Gender                   =$_POST['Gender'];
    $Height                   =$_POST['Height'];
    $Weight                   =$_POST['Weight'];
    $Marital_Status           =$_POST['Marital_Status'];
    $Occupation               =$_POST['Occupation'];
    $Cholesterol              =$_POST['Cholesterol'];
    $BloodPressure            =$_POST['BloodPressure'];
    $HeartDisease             =$_POST['HeartDisease'];
    $HepatitisB               =$_POST['HepatitisB'];
    $ChickenPox               =$_POST['ChickenPox'];
    $Measles                  =$_POST['Measles'];
    $Medical_History          =$_POST['Medical_History'];
    $Vaccination_History      =$_POST['Vaccination_History'];
    $OtherHealthIssues        =$_POST['OtherHealthIssues'];
    $Emerg_FirstName          =$_POST['Emerg_FirstName'];
    $Emerg_LastName           =$_POST['Emerg_LastName'];
    $Emerg_Relation            =$_POST['Emerg_Relation'];
    $Emerg_PhoneNumber1       =$_POST['Emerg_PhoneNumber1'];
    $Emerg_PhoneNumber2       =$_POST['Emerg_PhoneNumber2'];
    $Emerg2_FirstName         =$_POST['Emerg2_FirstName'];
    $Emerg2_LastName          =$_POST['Emerg2_LastName'];
    $Emerg2_Relation          =$_POST['Emerg2_Relation'];
    $Emerg2_PhoneNumber1      =$_POST['Emerg2_PhoneNumber1'];
    $Emerg2_PhoneNumber2      =$_POST['Emerg2_PhoneNumber2'];


 

 // first check the database to make sure a user does not already exist with the same username and/or email
 $user_check_query = "SELECT * FROM users WHERE Email='$EmailID' ";
 $result = mysqli_query($conn, $user_check_query);
 $user = mysqli_fetch_assoc($result);
 
 if ($user) { // if user exists
   if ($user['Email'] == $EmailID) {
     array_push($errors, "Email already exists");
   }
 }

 // Finally, register user if there are no errors in the form
 if (count($errors) == 0) {

   //encrypt the password before saving in the database
   $Enc_Password = md5($Password);

   // Inserting data into users table
   $query = "INSERT INTO users (FirstName, LastName, Email, user_type, Password) VALUES('$FirstName', '$LastName', '$EmailID', 'patient', '$Enc_Password')";
   mysqli_query($conn, $query);

  $query = "SELECT * FROM users WHERE Email='$EmailID' ";
  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_assoc($result);
  $id = $user['id'];

  // Inserting data into patients table
  $query = "INSERT INTO patient (idPatient, First_Name, Last_Name, Phone_number, BirthDate, Address, Cholesterol, Emerg_FirstName, Emerg_LastName, Emerg_Relation, Emerg_PhoneNumber1, Emerg2_PhoneNumber2, Emerg_PhoneNumber2, HepatitisB, ChickenPox, Measles, Medical_History, Height, Weight, DoctorId, Gender, Occupation, Marital_Status, EmailID, Social_Security, Emerg2_Relation, Emerg2_FirstName, Emerg2_PhoneNumber1, BloodPressure, HeartDisease, Vaccination_History, OtherHealthIssues, Emerg2_LastName, DoctorComments)
  VALUES('$id','$FirstName', '$LastName', '$Phone_number', '$BirthDate', '$Address', '$Cholesterol', '$Emerg_FirstName', '$Emerg_LastName', '$Emerg_Relation', '$Emerg_PhoneNumber1', '$Emerg2_PhoneNumber2', '$Emerg_PhoneNumber2', '$HepatitisB', '$ChickenPox', '$Measles', '$Medical_History', '$Height', '$Weight', '$DoctorId', '$Gender', '$Occupation', '$Marital_Status', '$EmailID', '$Social_Security', '$Emerg2_Relation', '$Emerg2_FirstName', '$Emerg2_PhoneNumber1', '$BloodPressure', '$HeartDisease', '$Vaccination_History', '$OtherHealthIssues', '$Emerg2_LastName', 'No comments at the moment')" ;
  mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));
    
  
  $_SESSION['user'] = $user;
  $_SESSION['success'] = "You are now registered and logged in";
  header('location: dashboard.php');
    
 }
}

//Update Account Details
if (isset($_POST['modify-account-details'])) {

  $email = mysqli_real_escape_string($conn, $_POST['Email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['Password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['Password_2']);

  $id = $_SESSION['user']['id'];

  $user_check_query = "SELECT * FROM users WHERE Email='$email' AND NOT id='$id' ";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { //Check if email exists and ignores users old email id
    if ($user['Email'] == $email) { 
      array_push($errors, "Email already exists");
    }
  }
  if ($user) { // Check if passwords match
    if ($password_1 != $password_2) {
      array_push($errors, "Passwords do not match");
    }
  }

  if (count($errors) == 0) {
    //encrypt the password before saving in the database
  	$password = md5($password_1);
    
    //Update data into user table
    $query = "UPDATE users SET Email = '$email', Password = '$password' WHERE id='$id' "; 
    mysqli_query($conn, $query);
  }
}

//Delete User
if (isset($_POST['delete-user'])) {
  global $conn, $errors;
     
  $id = $_POST['userId'];
  
  if(isset($id)) {
    $query = "SELECT * FROM users WHERE id = '$id'";
    $sql= mysqli_query($conn, $query)  or die('MySQL Error: ' . mysqli_error($conn));
    $temp = mysqli_fetch_assoc($sql);
    $userType = $temp['user_type'];

    $query = "DELETE FROM users WHERE id = '$id'";
    $sql= mysqli_query($conn, $query)  or die('MySQL Error: ' . mysqli_error($conn));

    if($userType == "doctor") {
      $query = "DELETE FROM doctorsdetails WHERE doctorId = '$id'";
      $sql= mysqli_query($conn, $query)  or die('MySQL Error: ' . mysqli_error($conn));
      //Set Doctor id to 0 for their patients
      $query = "UPDATE patient SET DoctorId = '0'  WHERE DoctorId = '$id'";
      $sql= mysqli_query($conn, $query)  or die('MySQL Error: ' . mysqli_error($conn));

    } else if($userType == "patient") {
      //Remove patient id from Room and set to not occupied
      $query = "UPDATE room SET PatientID = 0, Occupied = 'No' WHERE PatientID='$id'";
      mysqli_query($conn, $query) or die('MySQL Error: ' . mysqli_error($conn));

      $query = "DELETE FROM patient WHERE idPatient = '$id'";
      $sql= mysqli_query($conn, $query)  or die('MySQL Error: ' . mysqli_error($conn));

      //Remove guardians of that patient
      $query = "SELECT * FROM guardian WHERE PatientID = '$id'";
      $sql= mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($sql)) {
        $guardianId = $row['GuardianId'];
        mysqli_query($conn, "DELETE FROM guardian WHERE GuardianId = '$guardianId'");
        mysqli_query($conn, "DELETE FROM users WHERE id = '$guardianId'");

      }
    } else if($userType == "guardian") {
      $query = "DELETE FROM guardian WHERE GuardianId = '$id'";
      $sql= mysqli_query($conn, $query)  or die('MySQL Error: ' . mysqli_error($conn));
    }
    
  }
}


//Login
function login() {
  global $conn, $username, $errors;

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {

    $password = md5($password);
    
  	$query = "SELECT * FROM users WHERE Email='$email' AND Password='$password'";
    $results = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($results) == 1) { // user found
      
      // check user type
      $logged_in_user = mysqli_fetch_assoc($results);
      $usertype = $logged_in_user['user_type'];
      $userid = $logged_in_user['id'];

      $_SESSION['user'] = $logged_in_user;
			if ($usertype == 'admin') {
        $_SESSION['success']  = "You are now logged in";
        header('location: admin-dashboard.php');		  
			}else if ($usertype == 'patient') {
				$_SESSION['success']  = "You are now logged in";
				header('location: dashboard.php');
			} else if ($usertype == 'doctor'){
        $_SESSION['success']  = "You are now logged in";
        $query = "SELECT * FROM doctorsdetails WHERE DoctorId='$userid' ";
        $res = mysqli_query($conn, $query);
        $temp = mysqli_fetch_assoc($res);
        $phone = $temp['Phone'];
        if($phone == "") { 
          header('location: doctor-details.php');
        } else {
          header('location: doctor-dashboard.php');
        }
      } else if ($usertype == 'guardian'){
        $_SESSION['success']  = "You are now logged in";
        $query = "SELECT * FROM guardian WHERE GuardianId='$userid' ";
        $res = mysqli_query($conn, $query);
        $logged_in_user = mysqli_fetch_assoc($res);
        $PatientID = $logged_in_user['PatientID'];
        $phone = $logged_in_user['Phone'];
        if($phone == "") { 
          header('location: guardian-details.php');
        } else {
          header("location: view-patient-dashboard.php?id='$PatientID'");
        }
      }
		}else {
			array_push($errors, "Wrong username/password combination");
    }
    
    /*
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: dashboard.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
    }
    */

  }
}

//Logout
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: login.php");
}

// Checks if user is the Admin
function isAdmin() {
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
  }
  

// return user array from their id
function getUserById($id){
  global $conn;
  $query = "SELECT * FROM users WHERE id= '$id'";
  $result = mysqli_query($conn, $query);

  $user = mysqli_fetch_assoc($result);
  return $user;
}

//Returns User Type - Doctor/Patient
function userType() {
  if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'doctor' ) {
		return 2;
	}else if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'patient' ) {
    return 3;
  }else if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'guardian' ) {
    return 4;
  }
}

//contact-us
if (isset($_POST['contact_us'])) {
 global $conn, $errors;
  
  if(isset($_POST['userid'])){
    $userid      = $_POST['userid'];
  }
  $name         = $_POST['name'];
  $subject      = $_POST['subject'];
  if(isset($_POST['Recepient'])) {
    $recepient         = $_POST['Recepient'];
  }
  $emailid      = $_POST['emailid'];
  $message      = $_POST['message'];
  
  if(isset($recepient)){
    $sql= mysqli_query($conn, "SELECT * from users WHERE id='$userid'");
    $check = mysqli_fetch_assoc($sql);
    if($check['user_type']== 'patient'){
      $sql= mysqli_query($conn, "SELECT * from patient WHERE idPatient='$userid'");
      $row = mysqli_fetch_assoc($sql);
      $recepientId = $row['DoctorId'];
    } else if($check['user_type']== 'guardian'){
      $sql= mysqli_query($conn, "SELECT * from guardian WHERE GuardianId='$userid'");
      $row = mysqli_fetch_assoc($sql);
      $patientId = $row['PatientID'];
      $sql= mysqli_query($conn, "SELECT * from patient WHERE idPatient='$patientId'");
      $row = mysqli_fetch_assoc($sql);
      $recepientId = $row['DoctorId'];
    }
      $query = "INSERT INTO contact (name, subject, emailid, message, recepient, recepientId) VALUES('$name','$subject','$emailid','$message', '$recepient', '$recepientId')";

  } else {
    $query = "INSERT INTO contact (name, subject, emailid, message) VALUES('$name','$subject','$emailid','$message')";
  }
   $sql= mysqli_query($conn, $query);

}

if (isset($_POST['delete-message'])) {
  global $conn, $errors;
     
   $id = $_POST['messageID'];
     
    $query = "DELETE FROM contact WHERE id = '$id'";
    $sql= mysqli_query($conn, $query)  or die('MySQL Error: ' . mysqli_error($conn));
}
 
?>