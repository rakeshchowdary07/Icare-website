<?php
    $thisPage= "Dashboard";
    $subPage = "sensor";
	include('includes/header.php');
?>
<div style="background-color: #065596; opacity: 0.9;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="text-align: center;">
                    <h1 style="font-size: 40px;letter-spacing: 5px;text-align: center;color: white;padding: 40px 0;"><strong>Ecg Graph</strong></h1>
                </div>
            </div>
            <img style="display: block; margin-left: auto;margin-right: auto;" src="images/ecg%20gif.gif" alt="" >
            <div class="col-md-12">
                <div style="text-align: center;">
                    <h1 style="font-size: 40px;letter-spacing: 5px;text-align: center;color: white;padding: 40px;"><strong>Blood Pressure</strong></h1>
                </div>
            </div>
            <div class="main-content">
                <div class="rounded" style="background-color: white; text-align: center;">
                    <br><br><br><br>
                    <div style="font-size: 80px" id="demo">
                    <p>mmHg</p> 
                    </div>
                    <br><br><br><br>

                    <script>
                        document.getElementById("demo").innerHTML =Math.floor(Math.random() * (150 - 90)) + 90;
                    </script>
                    
                </div>
            </div>

            <div class="col-md-12">
                <div style="text-align: center;">
                    <h1 style="font-size: 40px;letter-spacing: 5px;text-align: center;color: white;padding: 40px 0;"><strong>Sleep Time</strong></h1>
                </div>
            </div>
            <div class="main-content">
                <div class="rounded" style="background-color: white;text-align: center;">
                    <br><br><br><br>

                    <script>
                        function startTime() {
                            var today = new Date();
                            var h = today.getHours() - 6;
                            var m = today.getMinutes();
                            var s = today.getSeconds();
                            m = checkTime(m);
                            s = checkTime(s);
                            document.getElementById('txt').innerHTML =
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

                    <br><br><br><br>
                </div>
            </div>
        </div>

    </div>
    <br><br><br><br><br><br>
</div>
<?php
	include('includes/footer.php');
?>
