<?php
if(session_status() !== PHP_SESSION_ACTIVE)
{
session_start();
}
?>
<div class="header">
        <div class="container">
            <div class="row">
                <a style="text-decoration:none;" href="http://localhost/DigitalGrampanchayat/#"><h1 style="color:black"><strong>Digital Grampanchayat</strong></h1></a>
                
            </div>
        </div>
    </div>



    <div id="myheader" class="main_navigation">
        <div class="container">
            <div class="row">
                <div id="cssmenu">
                    <ul>
                        <li><a href="/DigitalGrampanchayat">Home</a></li>
                        <li><a href="/DigitalGrampanchayat/aboutus.php">About Us</a></li>
                        <li><a href="/DigitalGrampanchayat/services.php">Services</a></li>
                        <li><a href="/DigitalGrampanchayat/contactus.php">Contact Us </a></li>
                        <?php
                            if(isset($_SESSION["userloggedin"]))
                            {
                                if($_SESSION["userloggedin"]!=1)
                                {
                                    echo '<li class="float-right"><a href="/DigitalGrampanchayat/login.php"><i class="fa-solid fa-right-to-bracket"></i>Login</a></li>';
                                }
                                else
                                {
                                    if($_SESSION["adminstatus"]==1)
                                    {
                                        echo '
                                            <li class="float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION["username"].'</li>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="/DigitalGrampanchayat/adminprofile.php">My Profile</a>
                                                <a class="dropdown-item" href="/DigitalGrampanchayat/admindashboard.php">Dashboard</a>
                                                <a class="dropdown-item" href="/DigitalGrampanchayat/utilityscripts/logout.php">Logout</a>
                                            </div>';
                                    }
                                    else
                                    {
                                        echo '
                                            <li class="float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION["username"].'</li>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="/DigitalGrampanchayat/profile.php">My Profile</a>
                                                <a class="dropdown-item" href="/DigitalGrampanchayat/dashboard.php">Dashboard</a>
                                                <a class="dropdown-item" href="/DigitalGrampanchayat/utilityscripts/logout.php">Logout</a>
                                            </div>';
                                    }
                                }
                            }
                            else
                            {
                                echo '<li class="float-right"><a href="/DigitalGrampanchayat/login.php"><i class="fa-solid fa-right-to-bracket"></i>Login</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>