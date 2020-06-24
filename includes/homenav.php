<nav id="myNavbar" class="navbar navbar-expand-lg navbar-light" role="navigation" >
        <!--navbar navbar-default navbar-fixed-top    -->
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand d-flex flex-row" href="index.php">
            <!--<img src="images/Logo.jpeg" height="40" alt="ICare Logo">-->
             <h3 id="nav-title">𝓘𝓒𝓪𝓻𝓮</h3> 
        </a>
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto ">
                    <li class="  
                        <?php if ($thisPage=="Home") 
						echo "active"; ?> ">
                        <a class="nav-link"href="index.php">Home</a>
                    </li>
                    <li class="  
                        <?php if ($subPage=="About") 
						echo "active"; ?> ">
                        <a class="nav-link"href="about.php">About Us</a>
                    </li>
                    <li class="  
                        <?php if ($subPage=="Contact") 
						echo "active"; ?> ">
                        <a class="nav-link"href="contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success mr-sm-4" type="submit"><a href="login.php">Login</a></button>
                <button class="btn btn-outline-primary" type="submit"><a href="patient-registration.php">Register</a></button>
            </form>
        </nav>