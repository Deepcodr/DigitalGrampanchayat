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
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include('../includes/dbconnection.php');

    $notice=$_REQUEST["noticecontent"];
    $noticelink=$_REQUEST["noticelink"];
    
    $stmt=$conn->prepare("INSERT INTO notices(noticecontent,noticelink) VALUES(?,?)");
    $stmt->bind_param("ss",$notice,$noticelink);

    $stmt->execute();

    //echo $stmt->affected_rows;
    if($stmt->affected_rows>0)
    {
            $_SESSION["noticegeneration"]=1;
            header('Location: http://localhost/DigitalGrampanchayat/adminnotices.php');
            exit();
    }
    else
    {
        $_SESSION["noticegeneration"]=0;
        header('Location: http://localhost/DigitalGrampanchayat/adminnotices.php');
        exit();
    }
}
else
{
    echo "NON SENSE";
}
?>