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

    $sql=$conn->prepare('UPDATE applications SET status=3 WHERE applicationid=?');
    $sql->bind_param("i",$applicationid);

    $sql->execute();

    if($sql->affected_rows>0)
    {
        $_SESSION["rejection"]=1;
        header('Location: http://localhost/DigitalGrampanchayat/adminapplications.php');
        exit();
    }
    else
    {
        $_SESSION["rejection"]=0;
        header('Location: http://localhost/DigitalGrampanchayat/adminapplications.php');
        exit();
    }
}
else
{
    echo "NON SENSE";
}
?>