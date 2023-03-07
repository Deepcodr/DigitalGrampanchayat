<?php
include('../includes/dbconnection.php');
session_start();
if($_SERVER["REQUEST_METHOD"]=="GET")
{
    if($_SESSION["userloggedin"]==1)
    {
        if($_SESSION["adminstatus"]!=1)
        {
            $userid=$_SESSION["userid"];
            $sql=$conn->prepare('SELECT * FROM approvals join applications on approvals.applicationid=applications.applicationid  where userid=?');
            $sql->bind_param("i",$userid);

            $sql->execute();

            $result=$sql->get_result();
            $response="";
            $status="";
            while($row=mysqli_fetch_assoc($result))
            {
                $response=$response.'<div class="card m-2" style="width: 18rem;height: fit-content;">
                <div class="card-body">
                <h5 class="card-title">Approval ID : '.$row["applicationid"].'</h5>
                <h6 class="card-subtitle mb-2 text-muted">Application ID :'.$row["applicationid"].'</h6>
                <h6 class="card-subtitle mb-2 text-muted">Application Name :'.$row["applicationname"].'</h6>
                <p class="card-text">approved on '.$row["approvaldate"].'</p>
                </div>
            </div>';
            }
            echo $response;
        }
        else
        {
            $sql=$conn->prepare('SELECT * FROM approvals');

            $sql->execute();

            $result=$sql->get_result();
            $response="";
            $status="";
            while($row=mysqli_fetch_assoc($result))
            {
                $response=$response.'<div class="card m-2" style="width: 18rem;height: fit-content;">
                <div class="card-body">
                <h5 class="card-title">Approval ID : '.$row["approvalid"].'</h5>
                <h6 class="card-subtitle mb-2 text-muted">Application ID :'.$row["applicationid"].'</h6>
                <p class="card-text">approved on '.$row["approvaldate"].'</p>
                </div>
            </div>';
            }
            echo $response;
        }
    }
    else
    {
        header("Location: http://localhost/DigitalGrampanchayat/login.php");
        exit();
    }
}
else
{

}
?>