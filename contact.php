<?php
    $thisPage="Contact";
	$subMenu="Other";
    include('includes/header.php');

    if (isLoggedIn()) {
        $id = $_SESSION['user']['id'];
        $fname = $_SESSION['user']['FirstName'];
        $lname = $_SESSION['user']['LastName'];
        $email = $_SESSION['user']['Email'];

    }
?>

	<!-- BEGIN MAIN CONTENT -->

    <div class="main-content">
        <form id="contact-form" method="post" action="contact.php">
        <fieldset>
        <div class="row">
            <div class="col-md-8 col-sm-12 align-self-start">
                    <h2>Find Us Here</h2>
                    <div>
                        If you would like to meet us in person and if you would like to cooperate with us, you can find us at the address below.
                    </div>	
                    <iframe class="maps-iframe" 
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d24990.77652870845!2d2.2819006046529973!3d48.823270627250544!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe0d3eb2ad501cb27!2sISEP!5e0!3m2!1sen!2sfr!4v1573554461872!5m2!1sen!2sfr" 
                    width="100%" height="600px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
               
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="sidebar-header">Collaboration</div>
                <div>
                    <p>
                        We would like to spread our technology as far as possible. <br>
                        Please contact us if you would like to collaborate or seek further information regarding our Smart System. <br>
                        We hope to help as many people as possible and this will only be possible with your help. <br>
                        We look forward to hearing from you 
                    </p>
                </div>
                <div class="sidebar-header">Contact Us By</div>
                <p id="pre-method-text">If you would like to speak to us directly or schedule an appointment, you can contact us through any of the following methods:</p>
                <ul id="contact-method">
                    <li id="contact-telephone">
                        (telephone:) <br /><span>+33-76-581-25</span>
                    </li>
                    <li id="contact-email">
                        (email:) <br /><span>icaretech.isep@gmail.com</span>
                    </li>
                    <li id="contact-skype">
                        (skype:) <br /><span>isep-Paris</span>
                    </li>
                </ul>

		  </div>
            <div class="col-md-8 col-sm-12 contact-page" style="">
			
                <h2 style="float:left;">Contact Us</h2>
                <img src="images/contact-mail-img.png" height="50px" style="margin:5px 10px;"/>
                <br>
                <div>
                    In order to make the website better, we may need your help.
                    If you have any suggestions for our website, or if you need to contact us, please send us a message below.
                </div>
   

                <!-- form -->
                <div style="margin-top:25px; border:1px inset #f0f8ec6b; padding:15px; border-radius:13px; background-color:#f0f8ec6b;">
                    <form >
                        <?php if(userType()==3 || userType()==4){ echo ' 
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" type="text" readonly class="form-control" name="name" value="',$fname,' ', $lname , '">
                            </div>
                        '; } else echo '
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" type="text" class="form-control" name="name" placeholder="Full Name">
                            </div>
                        ' ?>
                        <div class="form-group">
                            <label>Subject</label>
                            <input class="form-control" name="subject" placeholder="Subject">
                        </div>
                        <?php if(userType()==3 || userType()==4) echo ' 
                        <div class="form-group">
                            <label>Recepient</label>
                            <select class="custom-select" name="Recepient" required>
                                <option value="admin">Admin</option>
                                <option value="doctor">Doctor</option>
                            </select>
                        </div>
                        <input type="hidden" name="userid" value="', $id , '">
                        ' ?>
                        <?php if(userType()==3 || userType()==4){ echo ' 
                            <div class="form-group">
                                <label for="EmailInput">Email address</label>
                                <input type="email" class="form-control" name="emailid" aria-describedby="emailHelp" value="', $email,'" readonly>
                            </div>
                        '; } else echo '
                            <div class="form-group">
                                <label for="EmailInput">Email address</label>
                                <input type="email" class="form-control" name="emailid" aria-describedby="emailHelp" placeholder="Example@email.com">
                            </div>
                        ' ?>
                        <div class="form-group">
                            <label for="MessageInput">Enter Message Here</label>
                            <textarea class="form-control" name="message" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name="contact_us">Send</button>

                    </form>
                </div>


            </div>
        </fieldset>
    </form>
</div>
<?php
	include('includes/footer.php');
?>
