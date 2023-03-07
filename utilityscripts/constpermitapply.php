<?php
include('../includes/dbconnection.php');
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $uploaddir='../files/constpermit/';
    $filename1=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s').".jpg";
    $filename2=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s')."1".".jpg";
    $filename3=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s')."2".".jpg";
    $filename4=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s')."3".".jpg";
    $filename5=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s')."4".".jpg";
    $filename6=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s')."5".".jpg";
    $filetype1=$_FILES["houserent"]["type"];
    $filetype2=$_FILES["712"]["type"];
    $filetype3=$_FILES["map"]["type"];
    $filetype4=$_FILES["plan"]["type"];
    $filetype5=$_FILES["consent"]["type"];
    $filetype6=$_FILES["observation"]["type"];
    $filesize1=$_FILES["houserent"]["size"];
    $filesize2=$_FILES["712"]["size"];
    $filesize3=$_FILES["map"]["size"];
    $filesize4=$_FILES["plan"]["size"];
    $filesize5=$_FILES["consent"]["size"];
    $filesize6=$_FILES["observation"]["size"];
    $uploadfile1=$uploaddir.$filename1;
    $uploadfile2=$uploaddir.$filename2;
    $uploadfile3=$uploaddir.$filename3;
    $uploadfile4=$uploaddir.$filename4;
    $uploadfile5=$uploaddir.$filename5;
    $uploadfile6=$uploaddir.$filename6;
    $name=$_REQUEST["aname"];
    $email=$_REQUEST["aemail"];
    $mobile=$_REQUEST["amobile"];
    $address=$_REQUEST["address"];
    $type=$_REQUEST["type"];
    $gno=$_REQUEST["gno"];
    $length=$_REQUEST["length"];
    $width=$_REQUEST["width"];
    $userid= $_SESSION["userid"];
    $status=0;
    $certificateid=null;
    $applicationname="constpermitregistrationapplication";

    if(move_uploaded_file($_FILES["houserent"]["tmp_name"],$uploadfile1) && move_uploaded_file($_FILES["712"]["tmp_name"],$uploadfile2) && move_uploaded_file($_FILES["map"]["tmp_name"],$uploadfile3) && move_uploaded_file($_FILES["plan"]["tmp_name"],$uploadfile4) && move_uploaded_file($_FILES["consent"]["tmp_name"],$uploadfile5) && move_uploaded_file($_FILES["observation"]["tmp_name"],$uploadfile6))
    {
        $dbname="cnstpermit";

        $sql=$conn->prepare('INSERT INTO applications(dbname,applicationname,userid,status) values(?,?,?,?)');
        $sql->bind_param("ssii",$dbname,$applicationname,$userid,$status);
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
                        $filesql->bind_param("ssssiii",$filename4,$uploadfile4,$uploaddir,$filetype4,$filesize4,$applicationid,$certificateid);
                        $filesql->execute();

                        if($filesql->affected_rows>0)
                        {
                            $filesql->bind_param("ssssiii",$filename5,$uploadfile5,$uploaddir,$filetype5,$filesize5,$applicationid,$certificateid);
                            $filesql->execute();
                            if($filesql->affected_rows>0)
                            {
                                $filesql->bind_param("ssssiii",$filename6,$uploadfile6,$uploaddir,$filetype6,$filesize6,$applicationid,$certificateid);
                                $filesql->execute();
                                if($filesql->affected_rows>0)
                                {
                                    $stmt=$conn->prepare('INSERT INTO cnstpermit(applicationid,applicationname,applicantname,applicantemail,applicantmobile,applicantaddress,gno,lengthofp,widthofp,cnsttype) VALUES(?,?,?,?,?,?,?,?,?,?)');
                                    $stmt->bind_param("isssisiiis",$applicationid,$applicationname,$name,$email,$mobile,$address,$gno,$length,$width,$type);
                
                                    $stmt->execute();
                                    if($stmt->affected_rows>0)
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
    echo "NON SENSE";
}
?>