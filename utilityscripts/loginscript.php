<?php
include('../includes/dbconnection.php');
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $usertype=$_REQUEST['user-type'];

    $sql;
    $sql=$conn->prepare("SELECT * FROM users WHERE username=? AND usertype=?");
    $sql->bind_param("si",$username,$usertype);   
    $sql->execute();
    $result=$sql->get_result();

    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            if($row["password"]==$password)
            {
                $_SESSION["username"]=$row['email'];
                $_SESSION["userid"]=$row['userid'];
                $_SESSION["userloggedin"]=true;
                $_SESSION["loginstatus"]=1;
                if($usertype==1)
                {
                    $_SESSION["adminstatus"]=1;
                    header("Location: http://localhost/DigitalGrampanchayat/admindashboard.php");
                    exit();
                }
                else
                {
                    $_SESSION["adminstatus"]=0;
                    header("Location: http://localhost/DigitalGrampanchayat/dashboard.php");
                    exit();
                }
            }
            else
            {
                $_SESSION["userloggedin"]=false;
                $_SESSION["loginstatus"]=-1;
                header("Location: http://localhost/DigitalGrampanchayat/login.php");
                exit();
            }
        }
    }
    else
    {
        $_SESSION["userloggedin"]=false;
        $_SESSION["loginstatus"]=2;
        header("Location: http://localhost/DigitalGrampanchayat/login.php");
        exit();
    }
}
?>