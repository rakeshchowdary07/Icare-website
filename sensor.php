<?php
    $thisPage= "Dashboard";
    $subPage = "sensor";
	include('includes/header.php');
?>
	<div style="background-color: #065596; opacity: 0.9;">
	 <div class="container">
	 	<div class="row" >
	 		<div class="col-md-12">
	 			<div style="text-align: center;">
	 				<h1 style="font-size: 40px;letter-spacing: 5px;text-align: center;color: white;padding: 40px 0;"><strong>SENSOR DATA</strong></h1>
	 			</div>
	 		</div>

	 		<div class="col-md-4 col-sm-7">
	 			<div class="rounded" style="background-color: white;text-align: center;">
	 				<br><br><br><br>
	 				<a href="sensor1.php"><img  src="images/heartrate-sensor.png" alt=""></a>
	 				<br><br><br><br>
	 				<div class="text-left">
						<p class="text-center">
                            <a href="sensor1.php"><button type="button" style="background-color: white;color: #065596;letter-spacing: 5px;" class="btn btn-info btn-md"><b>ECG Graph</b></button></a>
						</p>
						<br><br><br>
					</div>
	 			</div>
	 		</div>

	 		<div class="col-md-4 col-sm-7">
				<div class="rounded" style="background-color: white; text-align: center;">
                    <br><br><br><br>
					<a href="sensor1.php"><img src="images/bloodpressure-sensor.png" alt=""> </a>
                    <br><br><br><br>
					<div class="text-left">
						<p class="text-center">
							<a href="sensor1.php"><button type="button" style="background-color: white;color: #065596;letter-spacing: 5px" class="btn btn-info btn-md" ><b>Blood Pressure </b></button></a>
						</p>
						<br><br><br>
					</div>
				</div>
			</div>	
			<div class="col-md-4 col-sm-7">
				<div class="rounded" style="background-color: white;text-align: center;">
                    <br><br><br><br>
					<a href="sensor1.php"><img src="images/sleep-tracking.png" alt=""></a>
                    <br><br><br><br>
					<div class="text-left">
						<p class="text-center">
						  <a href="sensor1.php"><button type="button" style="background-color: white;color: #065596;letter-spacing: 5px;" class="btn btn-info btn-md"><b>Sleep Timer</b></button></a>
						</p>
						<br><br><br>
					</div>
				</div>
			</div>
	 	</div>
	 	
	 </div>	
		<br><br><br><br><br><br>
	</div>
<?php
	include('includes/footer.php');
?>
