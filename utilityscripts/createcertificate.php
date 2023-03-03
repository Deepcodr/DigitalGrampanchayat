<?php
if(session_status() !== PHP_SESSION_ACTIVE)
{
session_start();
}

if($_SESSION["userloggedin"]==1)
{
  if($_SESSION["adminstatus"]!=1)
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

?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include('../includes/dbconnection.php');

    $applicationid=$_REQUEST["applicationid"];
    $uploaddir='../files/certificates/';
    $filename=idate('Y').idate('m').idate('d').idate('h').idate('i').idate('s').$applicationid.".jpg";
    $filetype=$_FILES["certificate"]["type"];
    $filesize=$_FILES["certificate"]["size"];
    $uploadfile=$uploaddir.$filename;
    $certname=$_REQUEST["certname"];
    
    $stmt=$conn->prepare("SELECT * FROM applications where applicationid=?");
    $stmt->bind_param("i",$applicationid);

    $stmt->execute();

    $result=$stmt->get_result();
    //echo $stmt->affected_rows;
    if($result->num_rows>0)
    {
        if(move_uploaded_file($_FILES["certificate"]["tmp_name"],$uploadfile))
        {
            $row=mysqli_fetch_assoc($result);
            $certificatesql=$conn->prepare('INSERT INTO certificates(certificatename,userid,applicationid) VALUES(?,?,?)');
            $certificatesql->bind_param("sii",$certname,$row["userid"],$applicationid);

            $certificatesql->execute();

            if($certificatesql->affected_rows>0)
            {
                $certificateid=$certificatesql->insert_id;
                $filesql=$conn->prepare('INSERT INTO files(filename,filepath,fileurl,filetype,filesize,applicationid,certificateid) VALUES(?,?,?,?,?,?,?)');
                $filesql->bind_param("ssssiii",$filename,$uploadfile,$uploaddir,$filetype,$filesize,$applicationid,$certificateid);
    
                $filesql->execute();
                if($filesql->affected_rows>0)
                {
                    $sql=$conn->prepare('UPDATE applications SET status=2 WHERE applicationid=?');
                    $sql->bind_param("i",$applicationid);
                
                    $sql->execute();
                
                    if($sql->affected_rows>0)
                    {
                        $_SESSION["certificategeneration"]=1;
                        header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
                        exit();
                    }
                    else
                    {
                        $_SESSION["certificategeneration"]=0;
                        header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
                        exit();
                    }
                }
                else
                {
                    $_SESSION["certificategeneration"]=0;
                    header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
                    exit();
                }
            }
            else
            {
                $_SESSION["certificategeneration"]=0;
                header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
                exit();
            }
        }
        else
        {
            $_SESSION["certificategeneration"]=0;
                header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
                exit();
        }
    }
    else
    {
        $_SESSION["certificategeneration"]=0;
        header('Location: http://localhost/DigitalGrampanchayat/applicationdata.php?applicationid='.$applicationid);
        exit();
    }
}
else
{
    echo "NON SENSE";
}
?>