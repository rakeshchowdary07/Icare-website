<?php

    $thisPage = "Dashboard";
    include('controller/functions.php');

    if (!isLoggedIn()) {
      $_SESSION['msg'] = "You must log in first";
      
  	    header('location: login.php');
    }
    include('includes/header.php');

    $id = $_SESSION['user']['id'];
    if(isset($id)) {
        $record = mysqli_query($conn, "SELECT * FROM room WHERE PatientID=$id");
        $n = mysqli_fetch_array($record);

        $sleep    			=  $n['SleepSensor'];
        $bloodpressure    			=  $n['BloodPressureSensor'];
        $heartrate    			=  $n['HeartRateSensor'];

    }
        


?>

<div class="main-content">

    <!-- logged in user information -->

    <h2>
        <?php  if (isset($_SESSION['user'])) : ?>
        <strong>
            <?php echo $_SESSION['user']['FirstName'], " ", $_SESSION['user']['LastName'];?>
        </strong>
        <?php endif ?> - Dashboard</h2>

    <h3 class="text-center">Your Health Statistics</h3>

    <div class="row">
        <?php if($heartrate == "Yes") echo ' 
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
        '; ?>


        <?php if($bloodpressure == "Yes") echo ' 
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
        '; ?>

        <?php if($sleep == "Yes") echo ' 
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
        '; ?>

    </div>
    <?php if(($heartrate == "") && ($bloodpressure == "") && ($sleep == "")) echo '<h5 class="text-center" style="margin-top:20px;">No Sensor Data - Request Admin/Doctor to assign you to a room</h5>'; ?>

    <div class="row" style="padding: 30px 0;">
        <div id="doctor-comments" class="col-md-12" name="doctor-comments">
            <h3 class="text-center">Doctor's Comments</h3>
            <div class="col-md-6" style="margin:auto; padding: 15px; background-color: #70befe;   border-radius: 25px;
                ">
                <p>
                    <?php 
                                $results = mysqli_query($conn, "SELECT * FROM patient WHERE idPatient = '$id'"); 
                                if($row = mysqli_fetch_assoc($results)) { 
                                    echo $row['DoctorComments']; 
                                }
                            ?>

                </p>
            </div>
        </div>
    </div>



</div>

</div>

<?php
	include('includes/footer.php');
?>
