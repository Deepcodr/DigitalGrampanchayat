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
            $sql=$conn->prepare('SELECT * FROM applications where userid=?');
            $sql->bind_param("i",$userid);

            $sql->execute();

            $result=$sql->get_result();
            $response="";
            $status="";
            while($row=mysqli_fetch_assoc($result))
            {
                if($row["status"]==0)
                {
                    $status="Under Scrutiny";
                }
                elseif($row["status"]==1)
                {
                    $status="Under Review";
                }
                elseif($row["status"]==2)
                {
                    $status="Approved";
                }
                else
                {
                    $status="Rejected";
                }
                $response=$response.'<div class="card m-2" style="width: 18rem;height: fit-content;">
                <div class="card-body">
                <h5 class="card-title">Application ID : '.$row["applicationid"].'</h5>
                <h6 class="card-subtitle mb-2 text-muted">'.$row["applicationname"].'</h6>
                <br><h6 class="card-subtitle mb-2 text-muted"><strong>Application Status</strong><br>'.$status.'</h6>
                <p class="card-text">application submitted on '.$row["applicationdate"].'</p>
                </div>
            </div>';
            }
            echo $response;
        }
        else
        {
            $sql=$conn->prepare('SELECT * FROM applications WHERE status in (0,1)');

            $sql->execute();

            $result=$sql->get_result();
            $response="";
            $status="";
            while($row=mysqli_fetch_assoc($result))
            {
                if($row["status"]==0)
                {
                    $status="Under Scrutiny";
                }
                elseif($row["status"]==1)
                {
                    $status="Under Review";
                }
                elseif($row["status"]==2)
                {
                    $status="Approved";
                }
                else
                {
                    $status="Rejected";
                }
                $response=$response.'<div class="card m-2" style="width: 18rem;height: fit-content;">
                <div class="card-body">
                <h5 class="card-title">Application ID : '.$row["applicationid"].'</h5>
                <h6 class="card-subtitle mb-2 text-muted">'.$row["applicationname"].'</h6>
                <br><h6 class="card-subtitle mb-2 text-muted"><strong>Application Status</strong><br>'.$status.'</h6>
                <p class="card-text">application submitted on '.$row["applicationdate"].'</p>
                <a href="./applicationdata.php?applicationid='.$row["applicationid"].'">View Application</a>
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
    echo "NON SENSE";
}
?>