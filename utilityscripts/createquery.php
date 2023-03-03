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

    $applicationid=$_REQUEST["applicationid"];
    $queryname=$_REQUEST["queryname"];
    $querycontent=$_REQUEST["querycontent"];
    $status=0;
    
    $stmt=$conn->prepare("UPDATE applications SET status=1 WHERE applicationid=?");
    $stmt->bind_param("i",$applicationid);

    $stmt->execute();

    //echo $stmt->affected_rows;
    if($stmt->affected_rows>0)
    {
        $sql=$conn->prepare('INSERT INTO queries(applicationid,queryname,querycontent,status) VALUES(?,?,?,?)');
        $sql->bind_param("issi",$applicationid,$queryname,$querycontent,$status);
    
    
        $sql->execute();
    
        if($sql->affected_rows>0)
        {
            $_SESSION["querygeneration"]=1;
            header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
            exit();
        }
        else
        {
            $_SESSION["querygeneration"]=0;
            header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
            exit();
        }
    }
    else
    {
        $_SESSION["querygeneration"]=0;
        header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
        exit();
    }
}
else
{
    echo "NON SENSE";
}
?>