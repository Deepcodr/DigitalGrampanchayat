<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0026)http://schauhan.in/upnrhm/ -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uttar Pradesh National Health Mission</title>

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
    <script src="./js/login.js"></script>
    <script src="https://kit.fontawesome.com/f5126202d4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body style="font-size: 100%;">
<?php include('./includes/nav.php')?>
<?php
if(session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}
if(isset($_SESSION['registerstatus']))
{
    if($_SESSION['registerstatus']===1)
    {
        echo '<div id="successtoast" class="alert alert-success container mt-4" role="alert">
        <h4 class="alert-heading">Registration Successful Login to Continue!</h4>
        </div>
        <script>
            setTimeout(hidetoast,5000);
        </script>';
        $_SESSION['registerstatus']=0;
    }
    elseif($_SESSION['registerstatus']===-1)
    {
        echo '<div id="dangertoast" class="alert alert-danger container mt-4" role="alert">
        <h4 class="alert-heading">Registration Unsuccessful . Please Try Again!</h4>
        </div>
        <script>
            setTimeout(hidetoast,5000);
        </script>';
        $_SESSION['registerstatus']=0;
    }
    else
    {
        echo '<script>
        hidetoast();
        </script>';
    }
}
elseif(isset($_SESSION["loginstatus"]))
{
    if($_SESSION["loginstatus"]===2)
    {
        echo '<div id="dangertoast" class="alert alert-danger container mt-4" role="alert">
        <h4 class="alert-heading">User Does Not Exist!</h4>
        </div>
        <script>
            setTimeout(hidetoast,5000);
        </script>';
    }
    elseif($_SESSION["loginstatus"]===-1)
    {
        echo '<div id="dangertoast" class="alert alert-danger container mt-4" role="alert">
        <h4 class="alert-heading">Invalid Username or Password!</h4>
        </div>
        <script>
            setTimeout(hidetoast,5000);
        </script>';
    }
}
else
{
    echo '<script>
    hidetoast();
    </script>';
}
?>
<div id="logreg-forms">
    <form id="login-form" class="form-signin" action="./utilityscripts/loginscript.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
    <div class="form-group">
        <label for="user-type">User Type</label>
        <select name="user-type" class="form-control" id="user-type">
            <option value=1>Admin</option>
            <option selected value=0>User</option>
        </select>
    </div>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="username">
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">
    
    <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
    <a href="#" id="forgot_pswd">Forgot password?</a>
    <hr>
    <!-- <p>Don't have an account!</p>  -->
    <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i><a href="./register.php">Sign up New Account</a></button>
    </form>

    <form action="/reset/password/" class="form-reset">
        <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
        <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
    </form>
</div>
<?php include('./includes/footer.php') ?>
</body>
</html>