<?php
include('../includes/dbconnection.php');
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $uploaddir='../files/deathreg/';
    $filename1=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s').".jpg";
    $filename2=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s')."1".".jpg";
    $filetype1=$_FILES["aadhaar"]["type"];
    $filetype2=$_FILES["daadhaar"]["type"];
    $filesize1=$_FILES["aadhaar"]["size"];
    $filesize2=$_FILES["daadhaar"]["size"];
    $uploadfile1=$uploaddir.$filename1;
    $uploadfile2=$uploaddir.$filename2;
    $name=$_REQUEST["aname"];
    $email=$_REQUEST["aemail"];
    $mobile=$_REQUEST["amobile"];
    $address=$_REQUEST["address"];
    $type=$_REQUEST["type"];
    $personname=$_REQUEST["pname"];
    $dob=$_REQUEST["dob"];
    $age=$_REQUEST["age"];
    $fname=$_REQUEST["fname"];
    $mname=$_REQUEST["mname"];
    $reason=$_REQUEST["reason"];
    $paddress=$_REQUEST["paddress"];
    $userid= $_SESSION["userid"];
    $status=0;
    $certificateid=null;
    $applicationname=$type."registrationapplication";

    if(move_uploaded_file($_FILES["aadhaar"]["tmp_name"],$uploadfile1) && move_uploaded_file($_FILES["daadhaar"]["tmp_name"],$uploadfile2))
    {
        $dbname="deathbirthreg";

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
                    $stmt=$conn->prepare('INSERT INTO deathbirthreg(applicationid,applicationname,applicantname,applicantemail,applicantmobile,applicantaddress,type,personname,dateofevent,Age,fname,mname,reasonofdeath,permanantadd) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                    $stmt->bind_param("isssissssissss",$applicationid,$applicationname,$name,$email,$mobile,$address,$type,$personname,$dob,$age,$fname,$mname,$reason,$paddress);

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
?>