<?php
include('../includes/dbconnection.php');
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $uploaddir='../files/elecnoc/';
    $filename1=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s').".jpg";
    $filename2=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s')."1".".jpg";
    $filename3=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s')."2".".jpg";
    $filetype1=$_FILES["houserent"]["type"];
    $filetype2=$_FILES["712"]["type"];
    $filetype3=$_FILES["observation"]["type"];
    $filesize1=$_FILES["houserent"]["size"];
    $filesize2=$_FILES["712"]["size"];
    $filesize3=$_FILES["observation"]["size"];
    $uploadfile1=$uploaddir.$filename1;
    $uploadfile2=$uploaddir.$filename2;
    $uploadfile3=$uploaddir.$filename3;
    $name=$_REQUEST["aname"];
    $email=$_REQUEST["aemail"];
    $mobile=$_REQUEST["amobile"];
    $address=$_REQUEST["address"];
    $type=$_REQUEST["type"];
    $gno=$_REQUEST["gno"];
    $userid= $_SESSION["userid"];
    $status=0;
    $certificateid=null;
    $applicationname="electricitynocregistrationapplication";

    if(move_uploaded_file($_FILES["houserent"]["tmp_name"],$uploadfile1) && move_uploaded_file($_FILES["712"]["tmp_name"],$uploadfile2) && move_uploaded_file($_FILES["observation"]["tmp_name"],$uploadfile3))
    {
        $sql=$conn->prepare('INSERT INTO applications(applicationname,userid,status) values(?,?,?)');
        $sql->bind_param("sii",$applicationname,$userid,$status);
        $sql->execute();

        if($sql->affected_rows>0)
        {
            $applicationid=$conn->insert_id;
            
            $filesql=$conn->prepare('INSERT INTO files(filename,filepath,fileurl,filetype,filesize,applicationid,certificateid) VALUES(?,?,?,?,?,?,?)');
            $filesql->bind_param("ssssiii",$filename1,$uploadfile1,$uploaddir,$filetype1,$filesize1,$applicationid,$certificateid);

            $filesql->execute();

            if($filesql->affected_rows>0)
            {
                $filesql->bind_param("ssssiii",$filename2,$uploadfile2,$uploaddir,$filetype2,$filesize2,$applicationid,$certificateid);
                $filesql->execute();

                if($filesql->affected_rows>0)
                {

                    $filesql->bind_param("ssssiii",$filename3,$uploadfile3,$uploaddir,$filetype3,$filesize3,$applicationid,$certificateid);
                    $filesql->execute();

                    if($filesql->affected_rows>0)
                    {
                        $stmt=$conn->prepare('INSERT INTO elecnoc(applicationid,applicationname,applicantname,applicantemail,applicantmobile,applicantaddress,gno,typeofelec) VALUES(?,?,?,?,?,?,?,?)');
                        $stmt->bind_param("isssisis",$applicationid,$applicationname,$name,$email,$mobile,$address,$gno,$type);
    
                        $stmt->execute();
                        if($stmt->affected_rows>0)
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
                        echo $filesql->error;
                    }
                }
                else
                {
                    echo $filesql->error;
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