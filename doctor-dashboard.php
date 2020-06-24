<?php

    $thisPage = "Doctor Dashboard";
    include('controller/functions.php');

    if (!isLoggedIn()) {
      $_SESSION['msg'] = "You must log in first";
      
  	    header('location: login.php');
    }
    include('includes/header.php');

    $docid = $_SESSION['user']['id'];
    $docfname = $_SESSION['user']['FirstName'];
    $doclname = $_SESSION['user']['LastName'];
    

?>
        
    <div class="main-content">
        
        <!-- logged in user information -->

        <h2> Welcome Dr.
        <?php  if (isset($_SESSION['user'])) : ?>
            <strong>
                <?php echo "$docfname $doclname";?> 
            </strong>
        <?php endif ?> </h2>   
        <br>
        <h3 class="text-center">Your Patients</h3>
        <div class="container-fluid">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner row w-100 mx-auto">
                    <?php 
                        $results = mysqli_query($conn, "SELECT * FROM patient WHERE DoctorId = '$docid'"); 
                        while ($row = mysqli_fetch_assoc($results)) { 
                            $str = strtok($row['DoctorComments'], "\n");
                        ?>
                        
                        <div class="carousel-item col-md-4">
                            <div class="card" style="margin: 20px;">
                                <img class="card-img-top" src="images/avatar1.png" alt="Patient Image" style="padding: 20px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['First_Name'] ," ", $row['Last_Name']; ?></h5>
                                    <h6><strong><?php if($row['RoomNo'] !=0 )echo "Room Number: ",$row['RoomNo'] ?> </strong> </h6>
                                    <h6><strong><?php if($row['RoomNo'] == 0 )echo "Room Not Assigned" ?> </strong></h6>
                                    <p class="card-text"><?php echo $str , "..."?></p>
                                    <a href="view-patient-dashboard.php?id=<?php echo $row['idPatient']?>" class="btn btn-info btn-sm">View Patient Dashboard</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!--Controls-->
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
                <!--/.Inner-->

        </div>


        <div class="row" style="">
            
                <h3 class="text-center" style="flex: auto;">Messages</h3>
                <div class="col-md-12 " style="margin:auto; padding: 15px; background-color: #70befe;   border-radius: 25px;">
                    <div class="row row-cols-5 form-group" style="font-weight:bold; text-align:center;">
                        <div class="col-md-1">Name</div>
                        <div class="col-md-2" style="text-align:center;">Subject</div>
                        <div class="col-md-3">Email ID</div>
                        <div class="col-md-4">Message</div>
                        <div class="col-md-1"> </div>
                        <div class="col-md-1"> </div>
                    </div>
                        <?php
                        
                        $sql = "SELECT * FROM contact WHERE recepient='doctor' AND recepientId='$docid'";
                        $result = mysqli_query($conn, $sql);
                        
                        if ($result) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $messageID = $row["id"];
                                echo '
                                <form id="contact-us-messages" class="" action="doctor-dashboard.php" method="post" >
                                    <div class="row" style="border-top: 1px solid #8c8b8b; margin:10px auto; padding-top:10px;">
                                        <input type="hidden" name="messageID" readonly value="', $messageID ,'">
                                        <div class="col-md-1">', $row["name"]  ,'</div>
                                        <div class="col-md-2" style="text-align:center;">', $row["subject"] ,'</div>
                                        <div class="col-md-3">', $row["emailid"] ,'</div>
                                        <div class="col-md-4 text-justify">', $row["message"],'</div>
                                        <div class="col-md-1" style="align-self: center;">
                                            <a href="mailto:" ', $row["emailid"] ,' " class="btn btn-primary btn-sm" style="margin:auto;">
                                                Reply</a>
                                        </div>
                                        <div class="col-md-1" style="align-self: center;">
                                            <button class="btn btn-danger btn-sm" type="submit" name="delete-message">Delete</button>
                                        </div>
                                        <br>
                                    </div>
                                </form>
                                ';
                        
                            }
                        } else { echo '<div class="col-md-12"> 
                                <p style="margin:auto";>No Messages</p>
                            </div>'; }
                        ?>

                </div>
            
        </div>      


    </div>
        
</div>

<?php
	include('includes/footer.php');
?>