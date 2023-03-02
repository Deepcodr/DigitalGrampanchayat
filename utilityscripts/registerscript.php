<?php
session_start();
include('../includes/dbconnection.php');

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_REQUEST['fullname'];
    $phone=$_REQUEST['phone'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];

    $sql=$conn->prepare('INSERT INTO users(username,phone,email,password,name) VALUES (?,?,?,?,?)');
    $sql->bind_param("sssss",$email,$phone,$email,$password,$name);

    $sql->execute();
    
    if($conn->affected_rows===1)
    {
        $_SESSION['registerstatus']=1;
    }
    else
    {
        $_SESSION['registerstatus']=-1;
    }
    header("Location: http://localhost/DigitalGrampanchayat/login.php");
    exit();
}
else
{
    $_SESSION['registerstatus']=0;
    echo "NON SENSE";
}
?>