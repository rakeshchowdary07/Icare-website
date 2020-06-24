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
                    <!--
                    <li class="  
                        <?php if ($thisPage=="Home") 
						echo "active"; ?> ">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    -->
                    

                    <li class=" nav-item dropdown
                        <?php if ($thisPage=="Dashboard") 
						echo " active"; ?> ">
                        <a class="nav-link dropdown-toggle" href="dashboard.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Dashboard
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                            <a class="dropdown-item" href="dashboard.php#doctor-comments">Recovery Status</a>
                            <!--
                            <a class="dropdown-item
                                <?php if ($subPage=="Sensor") 
                                    echo " active"; ?>
                            " href="sensor.php">Sensor Data</a>
                            -->
                        </div>
                    </li>

                    <li class=" nav-item dropdown
                        <?php if ($thisPage=="Details") 
						echo " active"; ?>  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Details
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item  
                                <?php if ($thisPage=="Doctor Details") 
                                echo "active"; ?> >" href="doctor-details.php">Doctor Details
                            </a>
                            <a class="dropdown-item
                                <?php if ($subPage=="Patient Details") 
                                        echo " active"; ?>
                                " href="patient-details.php">Patient Details
                            </a>
                        </div>
                    </li>


                    <li class=" nav-item dropdown
                        <?php if ($subMenu=="Other") 
						echo " active"; ?>  ">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" role="button" href="about.php">Other<span class="caret"></span></a>
                        <div id="scrolling" class="dropdown-menu" aria-labelledby="navbarDropdown">     
                            <a class="dropdown-item 
                                  <?php if ($thisPage=="About") 
                                  echo " active"; ?>
                            "href="about.php">About Us</a>
                            <a class="dropdown-item
                                      <?php if ($thisPage=="Contact") 
						echo " active"; ?>
                                      " href="contact.php">Contact Us</a>
                            <!--
                            <a class="dropdown-item"href="#">FAQs</a>     
                            -->
                        </div> 
                    </li>

                    <?php if (isAdmin())
                        echo '
                        <li class="nav-item  
                            if ($thisPage=="Create Doctor") 
						        echo "active"; ">
                            <a class="nav-link" href="create-doctor.php">Create Doctor Account</a>
                        </li>
                        ' 
                    ?>


                </ul>
                <button class="btn btn-outline-danger" type="submit"><a href="index.php?logout='1'" style="color:red">Logout</a></button>
            </div>
	
        </nav>