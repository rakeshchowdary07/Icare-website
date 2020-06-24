<?php
    $thisPage="About";
	$subMenu="Other";
    include('includes/header.php');
?>

	<!-- BEGIN MAIN CONTENT -->

	
	<div class="main-content">
        <div class="">
		
            <h2>About Us</h2>
            <p>
                Smart System to create an environment at home or in a hospital room to monitor people’s health. 
                Taking precautions for emergency situations by notifying registered family members or trusted persons to avoid worst-case scenarios. 
                Allows for remote monitoring and gathering of medical data. 
                This is a cost-effective solution for patients and hospitals by automating gathering of health statistics.
                Our system also allows patients to stay in the comfort of their homes instead of being admitted into an expensive hospital. 
            </p>
            
        </div>

        <h2>Roles</h2>

        <h3 class="text-center">Patient</h3>

        <div class="row" style="margin-bottom: 40px;">
            
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/send-message.png">
                <h5>Send Direct Message to Doctor & Admin</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/health-statistics.png">
                <h5>View Sensor Data</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/doctor.png">
                <h5>View Doctor's Comments</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/family.png">
                <h5>Create Guardian Account</h5>
            </div>

        </div>

        <h3 class="text-center">Doctor</h3>

        <div class="row" style="margin-bottom: 40px;">
            
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/health-statistics.png">
                <h5>View Patient's Sensor Data & Medical History</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/message.png">
                <h5>View Messages From Patient & Guardian</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/doctor.png">
                <h5>View + Edit Doctor's Comments</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/send-message.png">
                <h5>Send Direct Message to Admin</h5>
            </div>
        </div>
        
        <h3 class="text-center">Guardian</h3>

        <div class="row" style="margin-bottom: 40px;">
            
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/health-statistics.png">
                <h5>View Patient's Sensor Data</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/doctor.png">
                <h5>View Doctor's Comments</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/send-message.png">
                <h5>Send Direct Message to Doctor & Admin</h5>
            </div>
            
        </div>
		
        
        <h3 class="text-center">Admin</h3>

        <div class="row" style="margin: 15px 0;">
            
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/avatars.png">
                <h5>View User Accounts</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/message.png">
                <h5>View Messages From All Users</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/doctor-avatar.png">
                <h5>Create Doctor Accounts</h5>
            </div>
        </div>
        <div class="row" style="margin-bottom: 40px;">
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/hospital.png">
                <h5>Create Room & Assign to Patient</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/delete.png">
                <h5>Delete User Account</h5>
            </div>
            <div class="col-sm-2 text-center" style="margin:auto;">
                <img src="images/troubleshoot.png">
                <h5>Troubleshoot User Issues</h5>
            </div>
        </div>

        <div>
            <h2>Website Usage</h2>
             <p>
                 Patients can register to create an account and fill in their details, such as their name, contact, medical history, and their emergency contact information. This information can also be added and modified after the patient logged in.  <br>
                 The patient can view the health statistics collected by the sensor at any time. <br>
                 The patient can also view the doctor's comments on their recovery progress at any time<br>
            </p>
            <p>
                The doctor can not register an account by themselves. They must contact the admin for registration.
                Once that is completed they can log in with a temporary password. <br>
                Doctors can view the patient's medical history, thereby giving more accurate medical recommendations. <br>
                He can check the patient's physical condition by looking at the data collected by the sensor. <br>
                He can provide comments on the patient's recovery progress as well as suggestions to the patient.<br>
                
            </p>
            <p>
                The admin is responsible for managing the operation of the entire system. <br>
                There will only be one administrator, whom will have an account created when the system is set up. <br>
                Administrators can view all data from the sensors, as well as the information on all the users. <br>
                Administrator also has the ability to remove patient and doctor accounts, and remove their rights to use the system. <br>
                He is the manager of the entire system and will be the person of contact if there is any issue. <br>
            </p>
        </div>
        
    </div>
</div>
	
<?php
	include('includes/footer.php');
?>
	