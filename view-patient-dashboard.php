<?php

    $thisPage = "View Patient Dashboard";
    include('controller/functions.php');
    global $patient_id;

    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";      
        header('location: login.php');  
    }

    include('includes/header.php');

    //$id = $_SESSION['user']['id'];
    if(isset($_GET['id'])) {
		$patient_id = $_GET['id'];
	}

    if(isset($patient_id)) {
        $record = mysqli_query($conn, "SELECT * FROM patient WHERE idPatient=$patient_id");

        $n = mysqli_fetch_array($record);

        $FirstName    			=  $n['First_Name'];
        $LastName    			=  $n['Last_Name'];
        $Comments               =  $n['DoctorComments'];
        $RoomNo               =  $n['RoomNo'];

        $record = mysqli_query($conn, "SELECT * FROM room WHERE PatientID=$patient_id");
        $n = mysqli_fetch_array($record);

        $sleep    			=  $n['SleepSensor'];
        $bloodpressure    			=  $n['BloodPressureSensor'];
        $heartrate    			=  $n['HeartRateSensor'];

        //Check if sensor data is shown
        $count=0;
    }

?>
        
    <div class="main-content">
        
        <!-- logged in user information -->

        <h2> Patient - 
        <?php  if (isset($patient_id)) : ?>
            <strong>
                <?php echo $FirstName, " ", $LastName;?> 
            </strong>'s Dashboard <?php endif ?>
        </h2>   
        
        <h3 class="text-center">Health Statistics</h3>

        <div class="row" >
            <?php if($heartrate == "Yes"){ $count++; echo ' 
                <div class="col">
                    <div class="rounded" style="background-color: #1082df; opacity: 0.9; text-align: center;">
                        <br><br><br><br>
                        <a><img src="images/heartrate-sensor.png" alt=""></a>
                        <br><br><br><br>
                        <div class="text-left">
                            <p class="text-center">
                                <a href="#"><button type="button" style="background-color: white;color: #065596;letter-spacing: 5px;" class="btn btn-info btn-md" data-toggle="modal" data-target="#ecg"><b>Heart Rate</b></button></a>
                            </p>
                            <br><br><br>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ecg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Heart Rate </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img style="max-width: 100%;" src="images/ecg%20gif.gif" alt="">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            '; }?>

            <?php if($bloodpressure == "Yes"){ $count++; echo ' 
                <div class="col">
                    <div class="rounded" style="background-color: #1082df; opacity: 0.9; text-align: center;">
                        <br><br><br><br>
                        <a><img src="images/bloodpressure-sensor.png" alt=""> </a>
                        <br><br><br><br>
                        <div class="text-left">
                            <p class="text-center">
                                <a href="#"><button type="button" style="background-color: white;color: #065596;letter-spacing: 5px" class="btn btn-info btn-md" data-toggle="modal" data-target="#exampleModalCenter"><b>Blood Pressure </b></button></a>
                            </p>
                        </div>
                        <br><br><br>

                    </div>
                </div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Blood Pressure</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="rounded" style="background-color: white; text-align: center;">
                                    <div style="font-size: 80px" id="demo">
                                        <script>
                                            document.getElementById("demo").innerHTML = Math.floor(Math.random() * (150 - 90)) + 90;

                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            '; }?>

            <?php if($sleep == "Yes"){ $count++; echo ' 
                <div class="col">
                    <div class="rounded" style="background-color: #1082df; opacity: 0.9;text-align: center;">
                        <br><br><br><br>
                        <a><img src="images/sleep-tracking.png" alt=""></a>
                        <br><br><br><br>
                        <div class="text-left">
                            <p class="text-center">
                                <a href="#"><button type="button" style="background-color: white;color: #065596;letter-spacing: 5px;" class="btn btn-info btn-md" data-toggle="modal" data-target="#sleep"><b>Sleep Tracker</b></button></a>
                            </p>
                            <br><br><br>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="sleep" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Sleep Time </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="text-align: center">
                                <script>
                                function startTime() {
                                    var today = new Date();
                                    var h = today.getHours() - 6;
                                    var m = today.getMinutes();
                                    var s = today.getSeconds();
                                    m = checkTime(m);
                                    s = checkTime(s);
                                    document.getElementById("txt").innerHTML =
                                        h + ":" + m + ":" + s;
                                    var t = setTimeout(startTime, 500);
                                }

                                function checkTime(i) {
                                    if (i < 10) {
                                        i = "0" + i
                                    }; // add zero in front of numbers < 10
                                    return i;
                                }
                            </script>
                                <body onload="startTime()">
                                <div style="font-size: 80px;" id="txt"></div>
                                </body>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            ';} ?>

        </div>
        <?php if($count==0) echo '<h5 class="text-center">No Sensor Data - First Assign Patient to a room</h5>'; ?>

        <div class="row" style="padding: 30px 0;"> 
            <form class="col-md-12" action="view-patient-dashboard.php?id=<?php echo $patient_id?>" method="post">
                <h3 class="text-center">Doctor's Comments</h3>
                <div class="input-group col-md-6" style="margin:auto; padding: 15px; background-color: #70befe;   border-radius: 25px;">
                    <input type="hidden" name="patient_id" readonly value="<?php echo $patient_id ; ?>">
                    <textarea class="form-control" rows="3" <?php if(userType()!=2) echo 'readonly'?> name="DoctorComments"><?php echo $Comments ; ?></textarea>
                </div>
                <?php if(userType()==2) echo ' 
                <div style="text-align:center; margin-top:15px;">
                    <button class="btn btn-success" type="submit" name="update-comments" >Update</button>
                </div>
                '?>
            </form>
        </div>
        <div class="row" style="padding-top:30px;"> 
            <h3 style="margin:10px auto;">Room</h3>
            <form class="col-md-12 row" action="view-patient-dashboard.php?id=<?php echo $patient_id?>" method="post" style="margin:auto; padding: 20px; background-color: #70befe;   border-radius: 25px;">
                <div class="input-group col-md-5" >
                    <?php if(userType()==4) {
                        echo '
                            <h4 style="margin: 0 auto 10px auto;">Patient Room</h4>
                        ';} else {
                        echo '
                            <h4 style="margin: 0 auto 10px auto;">Select Room</h4>
                        '; }
                    ?>
                    <div class="input-group">
                        <input type="hidden" name="patient_id" readonly value="<?php echo $patient_id ; ?>">
                        <select class="custom-select" name="room_no" <?php if(userType()==4){ echo 'disabled';}  ?> required>
                            <option <?php if($RoomNo == 0){echo "selected";}?> value="0">Assign Room</option>
                            <option selected><?php echo $RoomNo; ?></option>
                            <!-- if($RoomNo == $roomno)echo "selected";  -->
                            <?php 
                                $records = mysqli_query($conn, "SELECT * FROM room WHERE Occupied = 'No'");
                                while ($row = mysqli_fetch_assoc($records)) {
                                    $roomid = $row['RoomID'];
                                    $roomno = $row['RoomNo'];
                            ?>
                                <option value="<?php echo $roomno; ?>"><?php echo $roomno; ?></option>
                            <?php    
                                }
                            ?>
                        </select>
                        <br>
                        <?php if(userType()==2) echo '
                            <div style="margin: 0 5px;">
                                <button class="btn btn-success" type="submit" name="update-roomno" >Select</button>
                            </div>
                        '?>
                    </div>
                </div>
                <?php if(($RoomNo==0) && (userType()!=4)) {
                    echo "
                    <div class='input-group col-md-6 offset-md-1' >
                        <h4 style='margin: 0 auto 10px auto;'>Room Details</h4>
                        <div class='input-group ml-5'>
                            <ul>
                                <li>First Assign Room to Patient</li>
                            <ul>
                        </div>
                    </div>
                    ";
                } else {
                    echo ''
                ?>
                <div class="input-group col-md-6 offset-md-1" >
                    <h4 style="margin: 0 auto 10px auto;">Room Details</h4>
                    <div class="input-group">
                        <ul>
                            <?php 
                                    $records = mysqli_query($conn, "SELECT * FROM room WHERE RoomNo = '$RoomNo'");
                                    while ($row = mysqli_fetch_assoc($records)) {
                                        $HeartRateSensor = $row['HeartRateSensor'];
                                        $BloodPressureSensor = $row['BloodPressureSensor'];
                                        $SleepSensor = $row['SleepSensor'];
                                        $Location = $row['Location'];

                                ?>
                                    <li>Heartrate Sensor - <?php echo $HeartRateSensor; ?></li>
                                    <li>Bloodpressure Sensor - <?php echo $BloodPressureSensor; ?></li>
                                    <li>Sleep Sensor - <?php echo $SleepSensor; ?></li>
                                    <li>Location -  <?php echo $Location; ?> </li>
                                <?php    
                                    }
                                ?>
                        </ul>
                    </div>
                </div>
                <?php 
                        }
                ?>
                
            </form>
        </div>
                


    </div>
        
</div>

<?php
	include('includes/footer.php');
?>