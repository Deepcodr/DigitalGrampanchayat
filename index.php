<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Grampanchayat</title>

    <link rel="stylesheet" type="text/css" href="./Uttar Pradesh National Health Mission_files/bootstrap.min.css">
    <link id="pagestyle" rel="stylesheet" type="text/css"
        href="./Uttar Pradesh National Health Mission_files/style.css">
    <link rel="stylesheet" type="text/css" href="./Uttar Pradesh National Health Mission_files/font-awesome.min.css">
    <script type="text/javascript"
        src="./Uttar Pradesh National Health Mission_files/jquery.slim.min.js.download"></script>
    <script type="text/javascript"
        src="./Uttar Pradesh National Health Mission_files/bootstrap.bundle.min.js.download"></script>
    <script src="./Uttar Pradesh National Health Mission_files/bootstrap.min.js.download"></script>
    <link href="./Uttar Pradesh National Health Mission_files/css" rel="stylesheet">
    <link rel="stylesheet" href="./Uttar Pradesh National Health Mission_files/footer.css">
    <link rel="stylesheet" href="./Uttar Pradesh National Health Mission_files/more_nav.css">


    <link rel="stylesheet" href="./Uttar Pradesh National Health Mission_files/styles.css">
    <script src="./Uttar Pradesh National Health Mission_files/jquery-latest.min.js.download"
        type="text/javascript"></script>
    <script type="text/javascript" src="./Uttar Pradesh National Health Mission_files/script.js.download"></script>

    <script type="text/javascript">
        function changesheet(sheet) {
            document.getElementById('pagestyle').setAttribute('href', sheet);
        }
    </script>
    <script src="https://kit.fontawesome.com/f5126202d4.js" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
</head>
<?php

    if(session_status() !== PHP_SESSION_ACTIVE)
    {
    session_start();
    }

    if(isset($_SESSION["loginstatus"]))
    {
        if($_SESSION["loginstatus"]===1)
        {
            echo '<div id="successtoast" class="alert alert-success container mt-4" role="alert">
            <h4 class="alert-heading">Welcome '.$_SESSION["username"].'!</h4>
            </div>
            <script>
                setTimeout(hidetoast,5000);
            </script>';
            $_SESSION['loginstatus']=0;
        }
    }
?>
<body style="font-size: 100%;">
    <?php include('./includes/nav.php')?>
    <div class="main_slider">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./Uttar Pradesh National Health Mission_files/3.jpg"
                        alt="Digital Grampanchayat" width="100%">
                </div>
                <div class="carousel-item">
                    <img src="./Uttar Pradesh National Health Mission_files/2.jpg"
                        alt="Digital Grampanchayat" width="100%">
                </div>
                <div class="carousel-item">
                    <img src="./Uttar Pradesh National Health Mission_files/1.jpg"
                        alt="Digital Grampanchayat" width="100%">
                </div>
                <div class="carousel-item">
                    <img src="./Uttar Pradesh National Health Mission_files/4.jpg"
                        alt="Digital Grampanchayat" width="100%">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="http://schauhan.in/upnrhm/#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="http://schauhan.in/upnrhm/#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>



    <!--Top Content-->

    <div class="top_content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 pd-40 bg1">
                    <div class="chairperson">
                        <h2><i class="fa fa-angle-right ic" aria-hidden="true"></i> Sri Pratikraj Sutar</h2>
                        <p>Sarpanch &amp;
                            Kodoli Grampanchayat</p>
                    </div>
                </div>
                <br>
                <div class="col-md-4 col-12 pd-40 bg2">
                    <div class="chairperson">
                        <h2><i class="fa fa-angle-right ic" aria-hidden="true"></i> Dr. Sunny Sutar</h2>
                        <p>Gramsevak &amp; Kodoli Grampanchayat</p>
                    </div>
                </div>

                <div class="col-md-4 col-12 pd-40 bg1">
                    <div class="chairperson">
                        <h2> <i class="fa fa-angle-right ic" aria-hidden="true"></i> Sri Rushi Powar</h2>
                        <p>Observation Officer
                            &amp;Kodoli Grampanchayat</p>
                    </div>
                </div>

                <div class="col-md-4 col-12 pd-40 bg1">
                    <div class="chairperson">
                        <h2> <i class="fa fa-angle-right ic" aria-hidden="true"></i> Sri Omkar Tikudve</h2>
                        <p>Survey Officer
                            &amp;Kodoli Grampanchayat</p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--Event & Important Links-->

    <div class="events mt-80 mb-5">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="event_container">
                        <h2><i class="fa fa-angle-right ic" aria-hidden="true"></i> Latest News &amp; Event<br></h2>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item carousel-item active">
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-2 col-2"><img
                                                    src="./Uttar Pradesh National Health Mission_files/1.png"
                                                    class="img-fluid" width="100%"></div>
                                            <div class="col-md-10 col-10">
                                                <p><a href="http://schauhan.in/upnrhm/#">Release of Offer Letter for CHO
                                                        January 2020 Session (April 20-Sep20)</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-2 col-2"><img
                                                    src="./Uttar Pradesh National Health Mission_files/1.png"
                                                    width="100%"></div>
                                            <div class="col-md-10 col-10">
                                                <p><a href="http://schauhan.in/upnrhm/#">Release of Offer Letter for CHO
                                                        January 2020 Session (April 20-Sep20)</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-2 col-2"><img
                                                    src="./Uttar Pradesh National Health Mission_files/1.png"
                                                    width="100%"></div>
                                            <div class="col-md-10 col-10">
                                                <p><a href="http://schauhan.in/upnrhm/#">Release of Offer Letter for CHO
                                                        January 2020 Session (April 20-Sep20)</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item carousel-item">
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-2 col-2"><img
                                                    src="./Uttar Pradesh National Health Mission_files/1.png"
                                                    width="100%"></div>
                                            <div class="col-md-10 col-10">
                                                <p><a href="http://schauhan.in/upnrhm/#">Release of Offer Letter for CHO
                                                        January 2020 Session (April 20-Sep20)</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-2 col-2"><img
                                                    src="./Uttar Pradesh National Health Mission_files/1.png"
                                                    width="100%"></div>
                                            <div class="col-md-10 col-10">
                                                <p><a href="http://schauhan.in/upnrhm/#">Release of Offer Letter for CHO
                                                        January 2020 Session (April 20-Sep20)</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-2 col-2"><img
                                                    src="./Uttar Pradesh National Health Mission_files/1.png"
                                                    width="100%"></div>
                                            <div class="col-md-10 col-10">
                                                <p><a href="http://schauhan.in/upnrhm/#">Release of Offer Letter for CHO
                                                        January 2020 Session (April 20-Sep20)</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item carousel-item">
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-2 col-2"><img
                                                    src="./Uttar Pradesh National Health Mission_files/1.png"
                                                    width="100%"></div>
                                            <div class="col-md-10 col-10">
                                                <p><a href="http://schauhan.in/upnrhm/#">Release of Offer Letter for CHO
                                                        January 2020 Session (April 20-Sep20)</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-2 col-2"><img
                                                    src="./Uttar Pradesh National Health Mission_files/1.png"
                                                    width="100%"></div>
                                            <div class="col-md-10 col-10">
                                                <p><a href="http://schauhan.in/upnrhm/#">Release of Offer Letter for CHO
                                                        January 2020 Session (April 20-Sep20)</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-2 col-2"><img
                                                    src="./Uttar Pradesh National Health Mission_files/1.png"
                                                    width="100%"></div>
                                            <div class="col-md-10 col-10">
                                                <p><a href="http://schauhan.in/upnrhm/#">Release of Offer Letter for CHO
                                                        January 2020 Session (April 20-Sep20)</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Carousel controls -->
                            <a class="carousel-control left carousel-control-prev"
                                href="http://schauhan.in/upnrhm/#myCarousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="carousel-control right carousel-control-next"
                                href="http://schauhan.in/upnrhm/#myCarousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="latest_videos">
                        <h2><i class="fa fa-angle-right ic" aria-hidden="true"></i> Related Links</h2>
                        <div class="row">
                            <div class="col-md-3 col-6"><img
                                    src="./Uttar Pradesh National Health Mission_files/1(1).png" width="100%"></div>
                            <div class="col-md-3 col-6"><img src="./Uttar Pradesh National Health Mission_files/2.png"
                                    width="100%"></div>
                            <div class="col-md-3 col-6"><img src="./Uttar Pradesh National Health Mission_files/3.png"
                                    width="100%"></div>
                            <div class="col-md-3 col-6"><img src="./Uttar Pradesh National Health Mission_files/4.png"
                                    width="100%"></div>
                            <div class="col-md-3 col-6"><img src="./Uttar Pradesh National Health Mission_files/5.png"
                                    width="100%"></div>
                            <div class="col-md-3 col-6"><img src="./Uttar Pradesh National Health Mission_files/6.png"
                                    width="100%"></div>
                            <div class="col-md-3 col-6"><img src="./Uttar Pradesh National Health Mission_files/7.png"
                                    width="100%"></div>
                            <div class="col-md-3 col-6"><img src="./Uttar Pradesh National Health Mission_files/8.png"
                                    width="100%"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include('./includes/footer.php') ?>
    <script>
        window.onscroll = function () { myFunction() };

        var header = document.getElementById("myheader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>



    <script src="./Uttar Pradesh National Health Mission_files/main.js.download"></script>
    <script src="./Uttar Pradesh National Health Mission_files/font.js.download"></script>
    <script src="./Uttar Pradesh National Health Mission_files/jquery.min.js.download"></script>


</body>

</html>