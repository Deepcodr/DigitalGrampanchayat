<?php
include('../includes/dbconnection.php');
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $uploaddir='../files/domicile/';
    $filename1=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s').".jpg";
    $filename2=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s')."1".".jpg";
    $filetype1=$_FILES["aadhaar"]["type"];
    $filetype2=$_FILES["houserent"]["type"];
    $filesize1=$_FILES["aadhaar"]["size"];
    $filesize2=$_FILES["houserent"]["size"];
    $uploadfile1=$uploaddir.$filename1;
    $uploadfile2=$uploaddir.$filename2;
    $name=$_REQUEST["name"];
    $email=$_REQUEST["email"];
    $mobile=$_REQUEST["mobile"];
    $address=$_REQUEST["address"];
    $type=$_REQUEST["type"];
    $userid= $_SESSION["userid"];
    $status=0;
    $certificateid=null;
    $applicationname=$type."registrationapplication";

    if(move_uploaded_file($_FILES["aadhaar"]["tmp_name"],$uploadfile1) && move_uploaded_file($_FILES["houserent"]["tmp_name"],$uploadfile2))
    {
        $dbname="resident";

        $sql=$conn->prepare('INSERT INTO applications(dbname,applicationname,userid,status) values(?,?,?,?)');
        $sql->bind_param("ssii",$dbname,$applicationname,$userid,$status);
        $sql->execute();

        if($conn->affected_rows>0)
        {
            $applicationid=$conn->insert_id;
            
            $filesql=$conn->prepare('INSERT INTO files(filename,filepath,fileurl,filetype,filesize,applicationid,certificateid) VALUES(?,?,?,?,?,?,?)');
            $filesql->bind_param("ssssiii",$filename1,$uploadfile1,$uploaddir,$filetype1,$filesize1,$applicationid,$certificateid);

            $filesql->execute();

            if($filesql->affected_rows>0)
            {
                $filesql->bind_param("ssssiii",$filename2,$uploadfile2,$uploaddir,$filetype2,$filesize2,$applicationid,$certificateid);
                $filesql->execute();

                if($conn->affected_rows>0)
                {
                    $stmt=$conn->prepare('INSERT INTO resident(applicationid,applicationname,applicantname,applicantemail,applicantmobile,applicantaddress,type) VALUES(?,?,?,?,?,?,?)');
                    $stmt->bind_param("isssiss",$applicationid,$applicationname,$name,$email,$mobile,$address,$type);

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
                    echo "2";
                }
            }
            else
            {
                echo $filesql->error;
            }
        }
        else
        {
            echo "Something Went Wrong";
        }
    }
    else
    {
        echo "upload unsuccessful";
    }
}
else
{
    echo "NON SENSE";
}
?>