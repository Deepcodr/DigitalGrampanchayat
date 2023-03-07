<?php
session_start();

if($_SESSION["userloggedin"]==1)
{
  if($_SESSION["adminstatus"]!=0)
  {
    echo "You Dont Have Access to this page";
    die();
  }
}
else
{
  header("Location: http://localhost/DigitalGrampanchayat/login.php");
  exit();
}

include('../includes/dbconnection.php');
$applicationid=$_REQUEST["applicationid"];
$userid=$_SESSION["userid"];
$sql=$conn->prepare('SELECT * FROM applications WHERE applicationid=?');
$sql->bind_param("i",$applicationid);

$sql->execute();

$result=$sql->get_result();

if($result->num_rows>0)
{
    $row=mysqli_fetch_assoc($result);

    if($row["userid"]==$userid)
    {
        $dbname=$row["dbname"];
        if($dbname=="watertanker")
        {
            $name=$_REQUEST["name"];
            $email=$_REQUEST["email"];
            $mobile=$_REQUEST["mobile"];
            $address=$_REQUEST["address"];
            $socialamt=$_REQUEST["socialamount"];
            $status=1;
            $applicationname="watertankerapplication";
            $dbname="watertanker";

            $applicationid=$conn->insert_id;
            $stmt=$conn->prepare('UPDATE watertanker SET applicantname=?,applicantemail=?,applicantmobile=?,applicantaddress=?,socialamount=? WHERE applicationid=?');
            $stmt->bind_param("ssisii",$name,$email,$mobile,$address,$socialamt,$applicationid);

            $stmt->execute();
            if($conn->affected_rows>0)
            {
                $querysql=$conn->prepare('UPDATE queries SET status=? WHERE applicationid=?');
                $querysql->bind_param("ii",$status,$applicationid);

                $querysql->execute();
                if($querysql->affected_rows>0)
                {
                    $_SESSION["applicationsedit"]=1;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                }
                else
                {
                    $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                }
            }
            else
            {
                $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
            }
        }elseif($dbname=="deathbirthreg"){
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
            $status=1;
            $certificateid=null;
            $applicationname=$type."registrationapplication";

            if(move_uploaded_file($_FILES["aadhaar"]["tmp_name"],$uploadfile1) && move_uploaded_file($_FILES["daadhaar"]["tmp_name"],$uploadfile2))
            {
                $filesql=$conn->prepare('UPDATE files SET filename=?,filepath=?,fileurl=?,filetype=?,filesize=? WHERE applicationid=?');
                $filesql->bind_param("ssssii",$filename1,$uploadfile1,$uploaddir,$filetype1,$filesize1,$applicationid);

                $filesql->execute();

                if($filesql->affected_rows>0)
                {
                    $filesql->bind_param("ssssii",$filename2,$uploadfile2,$uploaddir,$filetype2,$filesize2,$applicationid);
                    $filesql->execute();

                    if($conn->affected_rows>0)
                    {
                        $stmt=$conn->prepare('UPDATE deathbirthreg SET applicantname=?,applicantemail=?,applicantmobile=?,applicantaddress=?,personname=?,dateofevent=?,Age=?,fname=?,mname=?,reasonofdeath=?,permanantadd=? WHERE applicationid=?');
                        $stmt->bind_param("ssisssissssi",$name,$email,$mobile,$address,$personname,$dob,$age,$fname,$mname,$reason,$paddress,$applicationid);

                        $stmt->execute();
                        if($conn->affected_rows>0)
                        {
                            $querysql=$conn->prepare('UPDATE queries SET status=? WHERE applicationid=?');
                            $querysql->bind_param("ii",$status,$applicationid);

                            $querysql->execute();
                            if($querysql->affected_rows>0)
                            {
                                $_SESSION["applicationsapply"]=1;
            header('Location: http://localhost/DigitalGrampanchayat/applications.php');
            exit();
                            }
                            else
                            {
                                $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                            }
                        }
                        else
                        {
                            $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                        }
                    }
                    else
                    {
                        $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                    }
                }
                else
                {
                    $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                }
            }
            else
            {
                $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
            }
        }elseif($dbname=="birthcert"){
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
            $status=1;
            $applicationname=$type."registrationapplication";

            $dbname="birthcert";

            $stmt=$conn->prepare('UPDATE birthcert SET applicantname=?,applicantemail=?,applicantmobile=?,applicantaddress=?,personname=?,dateofevent=?,fname=?,mname=?,personperadd=? WHERE applicationid=?');
            $stmt->bind_param("ssissssssi",$name,$email,$mobile,$address,$type,$personname,$doe,$fname,$mname,$paddress,$applicationid);

            $stmt->execute();
            if($conn->affected_rows>0)
            {
                $querysql=$conn->prepare('UPDATE queries SET status=? WHERE applicationid=?');
                $querysql->bind_param("ii",$status,$applicationid);

                $querysql->execute();
                if($querysql->affected_rows>0)
                {
                    $_SESSION["applicationsapply"]=1;
            header('Location: http://localhost/DigitalGrampanchayat/applications.php');
            exit();
                }
                else
                {
                    $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                }
            }
            else
            {
                $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
            }
        }elseif($dbname=="busnoc"){
            $uploaddir='../files/businessnoc/';
            $filename1=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s').".jpg";
            $filename2=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s')."1".".jpg";
            $filename3=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s')."2".".jpg";
            $filetype1=$_FILES["houserent"]["type"];
            $filetype2=$_FILES["712"]["type"];
            $filetype3=$_FILES["map"]["type"];
            $filesize1=$_FILES["houserent"]["size"];
            $filesize2=$_FILES["712"]["size"];
            $filesize3=$_FILES["map"]["size"];
            $uploadfile1=$uploaddir.$filename1;
            $uploadfile2=$uploaddir.$filename2;
            $uploadfile3=$uploaddir.$filename3;
            $name=$_REQUEST["aname"];
            $email=$_REQUEST["aemail"];
            $mobile=$_REQUEST["amobile"];
            $address=$_REQUEST["address"];
            $certname=$_REQUEST["certname"];
            $gno=$_REQUEST["gno"];
            $status=1;
            $certificateid=null;
            $applicationname="businessnocregistrationapplication";

            if(move_uploaded_file($_FILES["houserent"]["tmp_name"],$uploadfile1) && move_uploaded_file($_FILES["712"]["tmp_name"],$uploadfile2) && move_uploaded_file($_FILES["map"]["tmp_name"],$uploadfile3))
            {
                $dbname="busnoc";

                $filesql=$conn->prepare('UPDATE files SET filename=?,filepath=?,fileurl=?,filetype=?,filesize=? WHERE applicationid=?');
                $filesql->bind_param("ssssii",$filename1,$uploadfile1,$uploaddir,$filetype1,$filesize1,$applicationid);

                $filesql->execute();

                if($filesql->affected_rows>0)
                {
                    $filesql->bind_param("ssssii",$filename2,$uploadfile2,$uploaddir,$filetype2,$filesize2,$applicationid);
                    $filesql->execute();

                    if($filesql->affected_rows>0)
                    {

                        $filesql->bind_param("ssssii",$filename3,$uploadfile3,$uploaddir,$filetype3,$filesize3,$applicationid);
                    $filesql->execute();

                        if($filesql->affected_rows>0)
                        {
                            $stmt=$conn->prepare('UPDATE busnoc SET applicantname=?,applicantemail=?,applicantmobile=?,applicantaddress=?,certificatename=?,gno=? WHERE applicationid=?');
                            $stmt->bind_param("ssissii",$name,$email,$mobile,$address,$certname,$gno,$applicationid);
        
                            $stmt->execute();
                            if($stmt->affected_rows>0)
                            {
                                $querysql=$conn->prepare('UPDATE queries SET status=? WHERE applicationid=?');
                                $querysql->bind_param("ii",$status,$applicationid);

                                $querysql->execute();
                                if($querysql->affected_rows>0)
                                {
                                    $_SESSION["applicationsapply"]=1;
            header('Location: http://localhost/DigitalGrampanchayat/applications.php');
            exit();
                                }
                                else
                                {
                                    $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                                }
                            }
                            else
                            {
                                $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                            }
                        }
                        else
                        {
                            $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                        }
                    }
                    else
                    {
                        $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                    }
                }
                else
                {
                    $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                }
            }
            else
            {
                $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
            }
        }elseif($dbname=="cnstpermit"){
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
            $status=1;
            $certificateid=null;
            $applicationname="constpermitregistrationapplication";

            if(move_uploaded_file($_FILES["houserent"]["tmp_name"],$uploadfile1) && move_uploaded_file($_FILES["712"]["tmp_name"],$uploadfile2) && move_uploaded_file($_FILES["map"]["tmp_name"],$uploadfile3) && move_uploaded_file($_FILES["plan"]["tmp_name"],$uploadfile4) && move_uploaded_file($_FILES["consent"]["tmp_name"],$uploadfile5) && move_uploaded_file($_FILES["observation"]["tmp_name"],$uploadfile6))
            {
                $dbname="cnstpermit";
                    
                $filesql=$conn->prepare('UPDATE files SET filename=?,filepath=?,fileurl=?,filetype=?,filesize=? WHERE applicationid=?');
                $filesql->bind_param("ssssii",$filename1,$uploadfile1,$uploaddir,$filetype1,$filesize1,$applicationid);

                $filesql->execute();

                if($filesql->affected_rows>0)
                {
                    $filesql->bind_param("ssssii",$filename2,$uploadfile2,$uploaddir,$filetype2,$filesize2,$applicationid);
                    $filesql->execute();

                    if($filesql->affected_rows>0)
                    {

                        $filesql->bind_param("ssssii",$filename3,$uploadfile3,$uploaddir,$filetype3,$filesize3,$applicationid);
                        $filesql->execute();

                        if($filesql->affected_rows>0)
                        {
                            $filesql->bind_param("ssssii",$filename4,$uploadfile4,$uploaddir,$filetype4,$filesize4,$applicationid);
                            $filesql->execute();

                            if($filesql->affected_rows>0)
                            {
                                $filesql->bind_param("ssssii",$filename5,$uploadfile5,$uploaddir,$filetype5,$filesize5,$applicationid);
                                $filesql->execute();
                                if($filesql->affected_rows>0)
                                {
                                    $filesql->bind_param("ssssii",$filename6,$uploadfile6,$uploaddir,$filetype6,$filesiz6,$applicationid);
                                    $filesql->execute();
                                    if($filesql->affected_rows>0)
                                    {
                                        $stmt=$conn->prepare('UPDATE cnstpermit SET applicantname=?,applicantemail=?,applicantmobile=?,applicantaddress=?,gno=?,lengthofp=?,widthofp=?,cnsttype=? WHERE applicationid=?');
                                        $stmt->bind_param("ssisiiisi",$name,$email,$mobile,$address,$gno,$length,$width,$type,$applicationid);
                    
                                        $stmt->execute();
                                        if($stmt->affected_rows>0)
                                        {
                                            $querysql=$conn->prepare('UPDATE queries SET status=? WHERE applicationid=?');
                                            $querysql->bind_param("ii",$status,$applicationid);

                                            $querysql->execute();
                                            if($querysql->affected_rows>0)
                                            {
                                                $_SESSION["applicationsapply"]=1;
            header('Location: http://localhost/DigitalGrampanchayat/applications.php');
            exit();
                                            }
                                            else
                                            {
                                                $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                                            }
                                        }
                                        else
                                        {
                                            $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                                        }
                                    }
                                    else
                                    {
                                        $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                                    }
                                }
                                else
                                {
                                    $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                                }
                            }
                            else
                            {
                                $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                            }
                        }
                        else
                        {
                            $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                        }
                    }
                    else
                    {
                        $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                    }
                }
                else
                {
                    $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                }
            }
            else
            {
                $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
            }
        }elseif($dbname=="resident"){
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
            $status=1;
            $certificateid=null;
            $applicationname=$type."registrationapplication";

            if(move_uploaded_file($_FILES["aadhaar"]["tmp_name"],$uploadfile1) && move_uploaded_file($_FILES["houserent"]["tmp_name"],$uploadfile2))
            {
                $filesql=$conn->prepare('UPDATE files SET filename=?,filepath=?,fileurl=?,filetype=?,filesize=? WHERE applicationid=?');
                $filesql->bind_param("ssssii",$filename1,$uploadfile1,$uploaddir,$filetype1,$filesize1,$applicationid);

                $filesql->execute();

                if($filesql->affected_rows>0)
                {
                    $filesql->bind_param("ssssii",$filename2,$uploadfile2,$uploaddir,$filetype2,$filesize2,$applicationid);
                    $filesql->execute();

                    if($conn->affected_rows>0)
                    {
                        $stmt=$conn->prepare('UPDATE resident SET applicantname=?,applicantemail=?,applicantmobile=?,applicantaddress=? WHERE applicationid=?');
                        $stmt->bind_param("ssisi",$name,$email,$mobile,$address,$applicationid);

                        $stmt->execute();
                        if($conn->affected_rows>0)
                        {
                            $querysql=$conn->prepare('UPDATE queries SET status=? WHERE applicationid=?');
                            $querysql->bind_param("ii",$status,$applicationid);

                            $querysql->execute();
                            if($querysql->affected_rows>0)
                            {
                                $_SESSION["applicationsapply"]=1;
            header('Location: http://localhost/DigitalGrampanchayat/applications.php');
            exit();
                            }
                            else
                            {
                                $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                            }
                        }
                        else
                        {
                            $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                        }
                    }
                    else
                    {
                        $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                    }
                }
                else
                {
                    $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
                }
            }
            else
            {
                $_SESSION["applicationsedit"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applications.php');
                    exit();
            }
        }
    }
}
else
{
    echo "INVALID APPLICATION ID";
    die();
}
?>