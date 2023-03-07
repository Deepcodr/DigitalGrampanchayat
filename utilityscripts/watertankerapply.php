<?php
include('../includes/dbconnection.php');
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $name=$_REQUEST["name"];
    $email=$_REQUEST["email"];
    $mobile=$_REQUEST["mobile"];
    $address=$_REQUEST["address"];
    $socialamt=$_REQUEST["socialamount"];
    $userid= $_SESSION["userid"];
    $status=0;
    $applicationname="watertankerapplication";
    $dbname="watertanker";

    $sql=$conn->prepare('INSERT INTO applications(dbname,applicationname,userid,status) values(?,?,?,?)');
    $sql->bind_param("ssii",$dbname,$applicationname,$userid,$status);
    $sql->execute();

    if($conn->affected_rows>0)
    {
        $applicationid=$conn->insert_id;
        $stmt=$conn->prepare('INSERT INTO watertanker(applicationid,applicationname,applicantname,applicantemail,applicantmobile,applicantaddress,socialamount) VALUES(?,?,?,?,?,?,?)');
        $stmt->bind_param("isssisi",$applicationid,$applicationname,$name,$email,$mobile,$address,$socialamt);

        $stmt->execute();
        if($conn->affected_rows>0)
        {
            $_SESSION["applicationsapply"]=1;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
        }
        else
        {
            $_SESSION["applicationsapply"]=0;
            header('Location: http://localhost/DigitalGrampanchayat/applications.php');
            exit();
        }
    }
    else
    {
        $_SESSION["applicationsapply"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
    }
}
else
{
    echo "NON SENSE";
}
?>