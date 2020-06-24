    <footer id="myfooter" class="page-footer text-center border-top" style="padding: 20px 0 10px 0;">
        <div class="row" style="padding: 0 80px;">
            <div class="col-md-5 text-left">
                <h4>Our Aim</h4>
                <p>
                    To revolutionize the health industry <br>
                    Using technology to have provide better service <br>
                    To help our patients recover faster <br>
                    Ensure our doctors have the best facilities at hand

                </p>
            </div>
            <div class="col-md-2">
                <h4>Useful Links</h4>
                <ul style="list-style:none; padding:0;">
                    <li><a href="about.php"> About Us </a> </li>
                    <li><a href="patient-registration.php"> Registration</a></li>
                    <li><a href="contact.php"> Contact Us</a></li>

                </ul>
            </div>
            <div class="col-md-4 offset-sm-1 text-left">
                <h4>Address:</h4>
                <p>
                    28 Rue Notre Dame des Champs, 75006 Paris <br>
                    10 Rue de Vanves, 92130 Issy-les-Moulineaux
                </p>
                <h5>Subscribe to our Newsletter</h5>
                <input type="email" placeholder=" youremail@email.com" size="20" style="border-radius: 5px; padding:1px;">
                <button class="btn btn-primary btn-sm" type="submit">Subscribe</button>

            </div>
        </div>
        <div class="row" style="margin-bottom: 15px;"> 
            <div class="col-sm-12">
                <h4>Social Media</h4>
                <div>
                    <a href="#">
                        <img src="images/social_icon3.png" height="40px"/>
                    </a> 
                </div>
            </div>
        </div>

        <div class="border-top" style="padding:5px; margin-top: 5px;">
            <a href="#" target="_blank">&copy; <?php  $fromYear = 2019;   $thisYear = (int)date('Y'); 
              echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?> 
            </a>
            <a href="#" class="verticalLine" target="_blank"> ICare </a>
        </div>
    </footer>
     
    </div> 

    <script src='https://code.jquery.com/jquery-1.12.4.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js'></script>
    <!--
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    -->
    <script src="js/script.js"></script>

</body>

</html>