<?php
include('../includes/dbconnection.php');
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $name=$_REQUEST["aname"];
    $email=$_REQUEST["aemail"];
    $mobile=$_REQUEST["amobile"];
    $address=$_REQUEST["address"];
    $type=$_REQUEST["type"];
    $personname=$_REQUEST["pname"];
    $doe=$_REQUEST["doe"];
    $fname=$_REQUEST["fname"];
    $mname=$_REQUEST["mname"];
    $paddress=$_REQUEST["paddress"];
    $userid= $_SESSION["userid"];
    $status=0;
    $applicationname=$type."registrationapplication";

    $dbname="birthcert";

    $sql=$conn->prepare('INSERT INTO applications(dbname,applicationname,userid,status) values(?,?,?,?)');
    $sql->bind_param("ssii",$dbname,$applicationname,$userid,$status);
    $sql->execute();

    if($conn->affected_rows>0)
    {
        $applicationid=$conn->insert_id;
        
        $stmt=$conn->prepare('INSERT INTO birthcert(applicationid,applicationname,applicantname,applicantemail,applicantmobile,applicantaddress,type,personname,dateofevent,fname,mname,personperadd) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param("isssisssssss",$applicationid,$applicationname,$name,$email,$mobile,$address,$type,$personname,$doe,$fname,$mname,$paddress);

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