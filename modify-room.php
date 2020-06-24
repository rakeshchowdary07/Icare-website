<?php
    $thisPage="Modify Room";
    $subMenu="Room";

    include_once("controller/functions.php");
    include('includes/header.php');

    if (!isAdmin()) {
        $_SESSION['msg'] = "You do not have access to this page";
        header('location: login.php');
      }

?>
        
    <div class="main-content" style="margin:auto; width:70%;">
        
        <h2>Admin - Modify Room</h2>

        <div id="accordion">
        <?php 
            $count = 1;
            $records = mysqli_query($conn, "SELECT * FROM room ORDER BY RoomNo ASC");
            while ($row = mysqli_fetch_assoc($records)) {

                $RoomId = $row['RoomID'];
                $RoomNo = $row['RoomNo'];
                $Location = $row['Location'];
                $Occupied = $row['Occupied'];
                $HeartRate = $row['HeartRateSensor'];
                $Sleep = $row['SleepSensor'];
                $BloodPressure = $row['BloodPressureSensor'];
                $PatientID = $row['PatientID'];
                //$record = mysqli_query($conn, "SELECT FirstName, LastName FROM users where id='PatientID'");
                //$row2 = mysqli_fetch_assoc($record);
            ?>
            
            <div class="card">
                <div class="card-header" id="heading<?php echo $count; ?>">
                    <h5 class="mb-0">
                        Room No: <?php echo $RoomNo; ?>
                        <button class="btn btn-primary" data-toggle="collapse" data-target="#collapse<?php echo $count; ?>" aria-expanded="false" aria-controls="collapse<?php echo $count; ?>"
                            style="position: absolute; right: 20px; top:7px;"
                        >
                            Expand
                        </button>
                    </h5>
                </div>

                <div id="collapse<?php echo $count; ?>" class="collapse <?php if($count==1) echo 'show'; ?>" aria-labelledby="heading<?php echo $count; ?>" data-parent="#accordion">
                    <div class="card-body">
                        <form id="modify-room-form" class="row bg-light" method="post" action="modify-room.php" style="padding-top:10px; border-radius:12px;">

                            <fieldset class="col-md-7 bg-light py-3 px-lg-5" style="margin: auto; ">

                                <?php include('controller/errors.php'); ?>

                                <input type="hidden" class="form-control" name="RoomId" value="<?php echo $RoomId; ?>">

                                <div class="input-group">
                                    <label class="input-group-text">Room Number</label>
                                    <input type="number" class="form-control" name="RoomNo" value="<?php echo $RoomNo; ?>">
                                </div>
                                <div class="input-group">
                                    <label class="input-group-text">Location</label>
                                    <input type="text" class="form-control" name="Location" value="<?php echo $Location; ?>">
                                </div>
                                <div class="input-group">
                                    <label class="input-group-text">Occupied</label>
                                    <select class="custom-select" required name="Occupied" required>
                                        <option <?php  if($Occupied == "Yes")echo 'selected'; ?> value="Yes">Yes</option>
                                        <option <?php  if($Occupied == "No")echo 'selected'; ?> value="No">No</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label class="input-group-text">Assign Patient</label>
                                    <select class="custom-select" name="PatientID" required>
                                        <option value="0">No Patient</option>
                                        <?php 
                                            $record = mysqli_query($conn, "SELECT * FROM patient WHERE RoomNo = 0 OR idPatient='$PatientID'");
                                            while ($row2 = mysqli_fetch_assoc($record)) {
                                                $patientid = $row2['idPatient'];
                                                $fname = $row2['First_Name'];
                                                $lname = $row2['Last_Name'];
                                        ?>
                                            <option <?php  if($PatientID == $patientid)echo 'selected'; ?> value="<?php echo $patientid; ?>"><?php echo $fname ," ", $lname; ?></option>
                                        <?php     
                                            }
                                        ?>
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="col-md-5 bg-light py-3 px-lg-5" style="margin: auto; border-radius:10px;">

                                <h4>Sensors</h4>
                                <div class="input-group">
                                    <label class="input-group-text">Heartrate Sensor</label>
                                    <select class="custom-select" required name="Heartrate" required>
                                        <option <?php  if($HeartRate == "Yes")echo 'selected';?> value="Yes">Yes</option>
                                        <option <?php if($HeartRate == "No")echo 'selected'; ?> value="No">No</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label class="input-group-text">Sleep Sensor</label>
                                    <select class="custom-select" required name="Sleepsensor" required>
                                        <option <?php  if($Sleep == "Yes")echo 'selected'; ?> value="Yes">Yes</option>
                                        <option <?php  if($Sleep == "No")echo 'selected'; ?> value="No">No</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label class="input-group-text">Bloodpressure Sensor</label>
                                    <select class="custom-select" required name="Bloodpressure" required>
                                        <option <?php  if($BloodPressure == "Yes")echo 'selected'; ?> value="Yes">Yes</option>
                                        <option <?php  if($BloodPressure == "No")echo 'selected'; ?> value="No">No</option>
                                    </select>
                                </div>
                                
                            </fieldset>
                            <div class="input-group" >
                                <button type="submit" class="btn btn-success btn-md" name="modify-room" style="margin: 0 auto 10px auto;">Modify</button>
                            </div>  
                            
                            
                        </form>
                    </div>
                </div>
            </div>
            <?php 
            $count++;
            } ?>
        </div>
        
          
        
            
    </div>
        
</div>

<?php
	include('includes/footer.php');
?>
