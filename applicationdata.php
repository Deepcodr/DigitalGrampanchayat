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
    <script src="./js/login.js"></script>
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
  <div id="applicationdata-content" class="container">
    <?php
        if(isset($_SESSION["approval"]))
        {
          if($_SESSION["approval"]==1)
          {
            echo '<div id="successtoast" class="alert alert-success container mt-4" role="alert">
            <h4 class="alert-heading">Approval Successful!</h4>
            </div>
            <script>
                setTimeout(hidetoast,5000);
            </script>';
          }
          elseif($_SESSION["approval"]==0)
          {
            echo '<div id="dangertoast" class="alert alert-danger container mt-4" role="alert">
            <h4 class="alert-heading">Approval Unsuccessful . Please Try Again!</h4>
            </div>
            <script>
                setTimeout(hidetoast,5000);
            </script>';
          }
          $_SESSION["approval"]=-1;
        }

        if(isset($_SESSION["querygeneration"]))
        {
          if($_SESSION["querygeneration"]==1)
          {
            echo '<div id="successtoast" class="alert alert-success container mt-4" role="alert">
            <h4 class="alert-heading">Query Created Successfully!</h4>
            </div>
            <script>
                setTimeout(hidetoast,5000);
            </script>';
          }
          elseif($_SESSION["querygeneration"]==0)
          {
            echo '<div id="dangertoast" class="alert alert-danger container mt-4" role="alert">
            <h4 class="alert-heading">Query Not Created . Please Try Again!</h4>
            </div>
            <script>
                setTimeout(hidetoast,5000);
            </script>';
          }
          $_SESSION["querygeneration"]=-1;
        }

        if(isset($_SESSION["certificategeneration"]))
        {
          if($_SESSION["certificategeneration"]==1)
          {
            echo '<div id="successtoast" class="alert alert-success container mt-4" role="alert">
            <h4 class="alert-heading">Certificate Generated Successfully!</h4>
            </div>
            <script>
                setTimeout(hidetoast,5000);
            </script>';
          }
          elseif($_SESSION["certificategeneration"]==0)
          {
            echo '<div id="dangertoast" class="alert alert-danger container mt-4" role="alert">
            <h4 class="alert-heading">Certificate Generation Unsuccessful . Please Try Again!</h4>
            </div>
            <script>
                setTimeout(hidetoast,5000);
            </script>';
          }
          $_SESSION["certificategeneration"]=-1;
        }

        include('./includes/dbconnection.php');

        if($_SERVER["REQUEST_METHOD"]=="GET")
        {
            $userid=$_SESSION["userid"];
            $applicationid= $_REQUEST["applicationid"];
            $sql=$conn->prepare('SELECT * FROM applications WHERE applicationid=?');
            $sql->bind_param("i",intval($applicationid));

            $sql->execute();
            $result=$sql->get_result();

            if($result->num_rows>0){
              $row=mysqli_fetch_assoc($result);
              $dbname=$row["dbname"];
              $fetchdata=$conn->prepare('SELECT * FROM applications join '.$row["dbname"].' on applications.applicationid='.$dbname.'.applicationid WHERE '.$dbname.'.applicationid=?');
                  
              $fetchdata->bind_param("i",$applicationid);
              $fetchdata->execute();

              $applicationdata=$fetchdata->get_result();
              if($applicationdata->num_rows>0)
              {
                $fetchfiles=$conn->prepare('SELECT * from applications join files on applications.applicationid=files.applicationid where applications.applicationid=?');
                $fetchfiles->bind_param("i",$applicationid);

                $fetchfiles->execute();

                $filesresult=$fetchfiles->get_result();
                if($filesresult->num_rows>0)
                {
                  $i=1;
                  $files="";
                  while($row=mysqli_fetch_assoc($filesresult))
                  {
                    $fileurl=ltrim($row["fileurl"],$row["fileurl"][0]);
                    $fileurl=ltrim($fileurl,$fileurl[0]);
                    $files=$files.'<button type="button" class="btn btn-outline-info m-2"><a href='.$fileurl.$row["filename"].'>View Document '.$i.'</a></button>';
                    $i++;
                  }

                  $row=mysqli_fetch_assoc($applicationdata);
                  $status="";
                  if($row["status"]==0)
                  {
                      $status="Under Scrutiny";
                  }
                  elseif($row["status"]==1)
                  {
                      $status="Under Review";
                  }
                  elseif($row["status"]==2)
                  {
                      $status="Approved";
                  }

                  if($dbname=="watertanker")
                  {
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Social Amount To Be Paid : '.$row["socialamount"].'</p>
                      <hr class="my-4">
                      <p class="lead">Application Submitted On : '.$row["applicationdate"].'</p>
                      <hr class="my-4">'
                      .$files.'<hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="deathbirthreg"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Application For : '.$row["type"].'</p>
                      <hr class="my-4">
                      <h5 class="text-primary">Death Person Details</h5>
                      <p class="lead">Person Name : '.$row["personname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Date Of Event : '.$row["dateofevent"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Age : '.$row["Age"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Father/Spouse Name : '.$row["fname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Mothers Name : '.$row["mname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Reason Of Death : '.$row["reasonofdeath"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Permanent Address : '.$row["permanantadd"].'</p>
                      <hr class="my-4">'.$files.'
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="birthcert"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Application For : '.$row["type"].'</p>
                      <hr class="my-4">
                      <h5 class="text-primary">Death Person Details</h5>
                      <p class="lead">Person Name : '.$row["personname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Date Of Event : '.$row["dateofevent"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Father/Spouse Name : '.$row["fname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Mothers Name : '.$row["mname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Permanent Address : '.$row["personperadd"].'</p>
                      <hr class="my-4">'.$files.'
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="busnoc"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Name To Be Printed On Certificate : '.$row["certificatename"].'</p>
                      <hr class="my-4">
                      <p class="lead">Group Number : '.$row["gno"].'</p>
                      <hr class="my-4">
                      '.$files.'
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="cnstpermit"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Group Number : '.$row["gno"].'</p>
                      <hr class="my-4">
                      <p class="lead">Length Of Place : '.$row["lengthofp"].'</p>
                      <hr class="my-4">
                      <p class="lead">Width Of Place : '.$row["widthofp"].'</p>
                      <hr class="my-4">
                      <p class="lead">Construction Type : '.$row["cnsttype"].'</p>
                      <hr class="my-4">'.$files.'
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="elecnoc"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Group Number : '.$row["gno"].'</p>
                      <hr class="my-4">
                      <p class="lead">Type Of Electricity : '.$row["typeofelec"].'</p>
                      <hr class="my-4">'.$files.'
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="resident"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Application Type : '.$row["type"].'</p>
                      <hr class="my-4">'.$files.'
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }
                }
                else
                {
                  $row=mysqli_fetch_assoc($applicationdata);
                  $status="";
                  if($row["status"]==0)
                  {
                      $status="Under Scrutiny";
                  }
                  elseif($row["status"]==1)
                  {
                      $status="Under Review";
                  }
                  elseif($row["status"]==2)
                  {
                      $status="Approved";
                  }

                  if($dbname=="watertanker")
                  {
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Social Amount To Be Paid : '.$row["socialamount"].'</p>
                      <hr class="my-4">
                      <p class="lead">Application Submitted On : '.$row["applicationdate"].'</p>
                      <hr class="my-4">
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="deathbirthreg"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Application For : '.$row["type"].'</p>
                      <hr class="my-4">
                      <h5 class="text-primary">Death Person Details</h5>
                      <p class="lead">Person Name : '.$row["personname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Date Of Event : '.$row["dateofevent"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Age : '.$row["Age"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Father/Spouse Name : '.$row["fname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Mothers Name : '.$row["mname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Reason Of Death : '.$row["reasonofdeath"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Permanent Address : '.$row["permanantadd"].'</p>
                      <hr class="my-4">
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="birthcert"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Application For : '.$row["type"].'</p>
                      <hr class="my-4">
                      <h5 class="text-primary">Death Person Details</h5>
                      <p class="lead">Person Name : '.$row["personname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Date Of Event : '.$row["dateofevent"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Father/Spouse Name : '.$row["fname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Mothers Name : '.$row["mname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Person Permanent Address : '.$row["personperadd"].'</p>
                      <hr class="my-4">
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="busnoc"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Name To Be Printed On Certificate : '.$row["certificatename"].'</p>
                      <hr class="my-4">
                      <p class="lead">Group Number : '.$row["gno"].'</p>
                      <hr class="my-4">
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="cnstpermit"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Group Number : '.$row["gno"].'</p>
                      <hr class="my-4">
                      <p class="lead">Length Of Place : '.$row["lengthofp"].'</p>
                      <hr class="my-4">
                      <p class="lead">Width Of Place : '.$row["widthofp"].'</p>
                      <hr class="my-4">
                      <p class="lead">Construction Type : '.$row["cnsttype"].'</p>
                      <hr class="my-4">
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="elecnoc"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Group Number : '.$row["gno"].'</p>
                      <hr class="my-4">
                      <p class="lead">Type Of Electricity : '.$row["typeofelec"].'</p>
                      <hr class="my-4">
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }elseif($dbname=="resident"){
                    echo '<div class="jumbotron m-2">
                    <h1 class="display-4">Application ID :  '.$applicationid.'</h1>
                    <h4>Application Name :  '.$row["applicationname"].'</h4>
                      <h4 class="text-success">Application Status :  '.$status.'</h4>
                      <hr class="my-4">
                      <p class="lead">Applicant Name : '.$row["applicantname"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Email : '.$row["applicantemail"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Mobile : '.$row["applicantmobile"].'</p>
                      <hr class="my-4">
                      <p class="lead">Applicant Address : '.$row["applicantaddress"].'</p>
                      <hr class="my-4">
                      <p class="lead">Application Type : '.$row["type"].'</p>
                      <hr class="my-4">
                      <hr class="my-4"><a class="btn btn-primary btn-lg m-2" href="./utilityscripts/approve.php?applicationid='.$applicationid.'" role="button">Approve</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatecertificate.php.php?applicationid='.$applicationid.'" role="button">Generate Certificate</a>
                      <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$applicationid.'" role="button">Reject</a>
                      <a class="btn btn-primary btn-lg m-2" href="./generatequery.php?applicationid='.$applicationid.'" role="button">Generate Query</a></div>';
                  }
                }
              }
              else
              {
                echo '<div class="jumbotron m-2">
                  <h1 class="display-4"> No Data Found </h1>
                </div>';
              }
            }
            else
            {
              echo '<div class="jumbotron m-2">
                  <h1 class="display-4"> No Data Found </h1>
                </div>';
            }
        }
        else {
            echo "";
        }
    ?>
  </div>
</div>
</body>
</html>