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

    $sql=$conn->prepare('INSERT INTO applications(applicationname,userid,status) values(?,?,?)');
    $sql->bind_param("sii",$applicationname,$userid,$status);

    $sql->execute();

    if($conn->affected_rows>0)
    {
        $applicationid=$conn->insert_id;
        $stmt=$conn->prepare('INSERT INTO watertanker(applicationid,applicantname,applicantemail,applicantmobile,applicantaddress,socialamount) VALUES(?,?,?,?,?,?)');
        $stmt->bind_param("issisi",$applicationid,$name,$email,$mobile,$address,$socialamt);

        $stmt->execute();
        if($conn->affected_rows>0)
        {
            echo "application successful";
        }
        else
        {
            echo "Failed to create application";
        }
    }
    else
    {
        echo "Something Went Wrong";
    }
}
else
{
    echo "NON SENSE";
}
?>