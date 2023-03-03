<?php
if(session_status() !== PHP_SESSION_ACTIVE)
{
session_start();
}

if($_SESSION["userloggedin"]==1)
{
  if($_SESSION["adminstatus"]!=1)
  {
    echo "You Dont Have Access to this page";
    die();
  }
}
else
{
  header("Location: http://localhost/DigitalGrampanchayat/login.php");
  exit();
}

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0026)http://schauhan.in/upnrhm/ -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Grampanchayat</title>

    <link rel="stylesheet" type="text/css" href="./Uttar Pradesh National Health Mission_files/bootstrap.min.css">
    <link id="pagestyle" rel="stylesheet" type="text/css"
        href="./Uttar Pradesh National Health Mission_files/style.css">
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
    <link rel="stylesheet" type="text/css" href="./css/dashboard.css">
</head>
<body style="font-size: 100%;">
<?php include('./includes/nav.php'); ?>
<button
    id="sidebartoggle"
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#sidebarMenu"
    aria-controls="sidebarMenu"
    aria-expanded="false"
    aria-label="Toggle navigation"
    >
    <i class="fas fa-bars"></i>
</button>
<div class="container-fluid d-flex flex-row">
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a
          href="./dashboard.php"
          class="list-group-item list-group-item-action py-2 ripple active"
          aria-current="true" 
        >
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>My dashboard</span>
        </a>
        <a href="./adminapplications.php" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-chart-area fa-fw me-3"></i><span>Application Requests</span>
        </a>
        <a href="./adminqueries.php" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-lock fa-fw me-3"></i><span>Create Queries</span></a
        >
        <a href="./admincertificates.php" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-chart-line fa-fw me-3"></i><span>Generate Certificate</span></a
        >
        <a href="./adminapprovals.php" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-chart-line fa-fw me-3"></i><span>Approvals</span></a
        >
      </div>
    </div>
    </nav>
  <div id="applications-content" class="container d-flex flex-row flex-wrap">
    <form class="p-2 m-2" action="./utilityscripts/createquery.php" method="POST">
    <div class="mb-3">
        <label for="applicationidfield" class="form-label">ApplicationID</label>
        <input type="number" class="form-control" id="applicationidfield" value="<?php echo $_REQUEST["applicationid"] ?>" name="applicationid" readonly>
    </div>
    <div class="mb-3">
        <label for="Query" class="form-label">Query Name</label>
        <input type="text" class="form-control" id="Query" name="queryname">
    </div>
    <div class="mb-3">
        <label for="Querycontent" class="form-label">Query Content</label>
        <input type="text" class="form-control" id="Querycontent" name="querycontent">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
</body>
</html>