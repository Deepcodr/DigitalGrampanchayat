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
            $response="";
            $fetchfiles=$conn->prepare('SELECT * from certificates join files on certificates.certificateid=files.certificateid where userid=?');
            $fetchfiles->bind_param("i",$userid);

            $fetchfiles->execute();

            $filesresult=$fetchfiles->get_result();
            if($filesresult->num_rows>0)
            {
                $i=1;
                while($row=mysqli_fetch_assoc($filesresult))
                {
                    $fileurl=ltrim($row["fileurl"],$row["fileurl"][0]);
                    $fileurl=ltrim($fileurl,$fileurl[0]);
            
                    $response=$response.'<div class="card m-2" style="width: 18rem;height: fit-content;">
                    <div class="card-body">
                    <h5 class="card-title">Certificate ID : '.$row["certificateid"].'</h5>
                    <h6 class="card-subtitle mb-2 text-muted">'.$row["certificatename"].'</h6>
                    <br><a href="'.$fileurl.$row["filename"].'">View Certificate</a>
                    </div>
                    </div>';
                }
                echo $response;
            }
            else
            {

            }
        }
        else
        {
            $userid=$_SESSION["userid"];
            $response="";
            $fetchfiles=$conn->prepare('SELECT * from certificates join files on certificates.certificateid=files.certificateid');

            $fetchfiles->execute();

            $filesresult=$fetchfiles->get_result();
            if($filesresult->num_rows>0)
            {
                while($row=mysqli_fetch_assoc($filesresult))
                {
                    $fileurl=ltrim($row["fileurl"],$row["fileurl"][0]);
                    $fileurl=ltrim($fileurl,$fileurl[0]);
            
                    $response=$response.'<div class="card m-2" style="width: 18rem;height: fit-content;">
                    <div class="card-body">
                    <h5 class="card-title">Certificate ID : '.$row["certificateid"].'</h5>
                    <h5 class="card-title">Application ID : '.$row["applicationid"].'</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Certificate Name : '.$row["certificatename"].'</h6>
                    <h6 class="card-subtitle mb-2 text-muted">User ID : '.$row["userid"].'</h6>
                    <br><a href="'.$fileurl.$row["filename"].'">View Certificate</a>
                    </div>
                    </div>';
                }
                echo $response;
            }
            else
            {

            }
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