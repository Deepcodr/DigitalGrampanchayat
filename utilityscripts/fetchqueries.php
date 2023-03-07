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
            $sql=$conn->prepare("SELECT * FROM queries join applications on queries.applicationid=applications.applicationid WHERE queries.status=0 and userid=?");
            $sql->bind_param("i",$userid);

            $sql->execute();

            $result=$sql->get_result();
            $response="";
            $status="";
            while($row=mysqli_fetch_assoc($result))
            {
                if($row["status"]==0)
                {
                    $status="Sent";
                }
                elseif($row["status"]==1)
                {
                    $status="Resolved";
                }
                $response=$response.'<div class="card m-2" style="width: 18rem;height: fit-content;">
                <div class="card-body">
                <h5 class="card-title">Application ID : '.$row["applicationid"].'</h5>
                <h6 class="card-subtitle mb-2 text-muted">Query Name:'.$row["queryname"].'</h6>
                <h6 class="card-subtitle mb-2 text-muted">Query Content:'.$row["querycontent"].'</h6>
                <br><h6 class="card-subtitle mb-2 text-muted"><strong></strong><br>'.$status.'</h6>
                <p class="card-text">query submitted on '.$row["querycreationtime"].'</p>
                <a class="btn btn-primary btn-lg m-2" href="./editapplication.php?applicationid='.$row["applicationid"].'" role="button">Edit Application</a></div>
                </div>';
            }
            echo $response;
        }
        else
        {
            $sql=$conn->prepare('SELECT * FROM queries WHERE status in (0,1)');

            $sql->execute();

            $result=$sql->get_result();
            $response="";
            $status="";
            while($row=mysqli_fetch_assoc($result))
            {
                if($row["status"]==0)
                {
                    $status="Sent";
                }
                elseif($row["status"]==1)
                {
                    $status="Resolved";
                }
                $response=$response.'<div class="card m-2" style="width: 18rem;height: fit-content;">
                <div class="card-body">
                <h5 class="card-title">Application ID : '.$row["applicationid"].'</h5>
                <h6 class="card-subtitle mb-2 text-muted">Query Name:'.$row["queryname"].'</h6>
                <h6 class="card-subtitle mb-2 text-muted">Query Content:'.$row["querycontent"].'</h6>
                <br><h6 class="card-subtitle mb-2 text-muted"><strong></strong><br>'.$status.'</h6>
                <p class="card-text">query submitted on '.$row["querycreationtime"].'</p>
                <a class="btn btn-primary btn-lg m-2" href="./applicationdata.php?applicationid='.$row["applicationid"].'">View Application</a>
                <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/cancelquery.php?queryid='.$row["queryid"].'">Cancel Query</a>
                <a class="btn btn-primary btn-lg m-2" href="./utilityscripts/reject.php?applicationid='.$row["applicationid"].'" role="button">Reject Application</a>
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