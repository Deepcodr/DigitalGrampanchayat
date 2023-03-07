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
if($_SERVER["REQUEST_METHOD"]=="GET")
{
    include('../includes/dbconnection.php');
    $applicationid=$_REQUEST["applicationid"];

    $sql=$conn->prepare('UPDATE applications SET status=2 WHERE applicationid=?');
    $sql->bind_param("i",$applicationid);

    $sql->execute();

    if($sql->affected_rows>0)
    {
      $approvesql=$conn->prepare('INSERT INTO approvals(applicationid) VALUES(?)');
      $approvesql->bind_param("i",$applicationid);

      $approvesql->execute();
      if($approvesql->affected_rows>0)
      {
        $_SESSION["approval"]=1;
        header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
        exit();
      }
      else
      {
        $_SESSION["approval"]=0;
        header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
        exit();
      }
    }
    else
    {
        $_SESSION["approval"]=0;
        header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
        exit();
    }
}
else
{
    echo "NON SENSE";
}
?>