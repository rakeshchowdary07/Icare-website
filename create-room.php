<?php
    $thisPage="Create Room";
    $subMenu="Room";

    include_once("controller/functions.php");
    include('includes/header.php');

    if (!isAdmin()) {
        $_SESSION['msg'] = "You do not have access to this page";
        header('location: login.php');
      }

?>
        
    <div class="main-content">
        
        
        <form id="create-room-form" method="post" action="create-room.php" style="padding: 20px;">

            <fieldset class="col-md-8 bg-light py-3 px-lg-5" style="margin: auto; border-radius:10px;">

                <?php include('controller/errors.php'); ?>
                    
                    <h2>Admin - Create Room</h2>

                <div class="input-group">
                    <label class="input-group-text">Room Number</label>
                    <input type="number" class="form-control" name="RoomNo">
                </div>
                <div class="input-group">
                    <label class="input-group-text">Location</label>
                    <input type="text" class="form-control" name="Location">
                </div>
                <div class="input-group">
                    <select class="custom-select" required name="Occupied" required>
                        <option selected>Occupied</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="input-group">
                    <select class="custom-select" name="PatientID" required>
                        <option selected value="0">Assign Patient</option>
                        <?php 
                            $records = mysqli_query($conn, "SELECT * FROM patient WHERE RoomNo = 0");
                            while ($row = mysqli_fetch_assoc($records)) {
                                $patientid = $row['idPatient'];
                                $fname = $row['First_Name'];
                                $lname = $row['Last_Name'];
                        ?>
                                <option value="<?php echo $patientid; ?>"><?php echo $fname ," ", $lname; ?></option>
                        <?php    
                            }
                        ?>
                    </select>
                </div>
                <fieldset>
                    <h4>Sensors</h4>
                    <div class="input-group">
                        <select class="custom-select" required name="Heartrate" required>
                            <option selected>Heartrate Sensor</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <select class="custom-select" required name="Sleepsensor" required>
                            <option selected>Sleep Sensor</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <select class="custom-select" required name="Bloodpressure" required>
                            <option selected>Bloodpressure Sensor</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </fieldset>
                
                
                <div class="input-group">
                    <button type="submit" class="btn btn-primary btn-md" name="create_room">Create Room</button>
                </div>
            </fieldset>    
        </form>
          
        
            
    </div>
        
</div>

<?php
	include('includes/footer.php');
?>
