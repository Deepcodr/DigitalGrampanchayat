<?php
include('../includes/dbconnection.php');
session_start();
if($_SERVER["REQUEST_METHOD"]=="GET")
{
    if(isset($_SESSION["userloggedin"]))
    {
        if($_SESSION["userloggedin"]==1)
        {
            if(isset($_SERVER['HTTP_REFERER']))
            {
                if($_SESSION["adminstatus"]==1 && $_SERVER['HTTP_REFERER']!='http://localhost/DigitalGrampanchayat/')
                {
                    $sql=$conn->prepare('SELECT * FROM notices');
        
                    $sql->execute();
        
                    $result=$sql->get_result();
                    $response='<div class="card m-2" style="width: 18rem;height: fit-content;">
                    <div class="card-body">
                    <a class="btn btn-primary" href="./generatenotice.php">Create New Notice</a>
                    </div>
                </div><br>';
                    $status="";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $response=$response.'<div class="card m-2" style="width: 18rem;height: fit-content;">
                        <div class="card-body">
                        <h5 class="card-title">Notice ID : '.$row["noticeid"].'</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Notice : '.$row["noticecontent"].'</h6>
                        <br><h6 class="card-subtitle mb-2 text-muted">Notice Link <br>'.$row["noticelink"].'</h6>
                        <p class="card-text">Notice Created on '.$row["noticedate"].'</p>
                        <a class="btn btn-danger" href="./utilityscripts/deletenotice.php?noticeid='.$row["noticeid"].'">Delete Notice</a>
                        </div>
                    </div>';
                    }   
                    echo $response;
                }
                else
                {
                    $sql=$conn->prepare('SELECT * FROM notices');
    
                    $sql->execute();
        
                    $result=$sql->get_result();
                    $response='<div class="item carousel-item active">';
                    $i=0;
                    while($row=mysqli_fetch_assoc($result))
                    {
                        if($i==3)
                        {
                            $i=0;
                            $response=$response.'</div><div class="item carousel-item">';
                        }
                        $response=$response.'<div class="box">
                            <div class="row">
                                <div class="col-md-10 col-10">
                                    <p><a href='.$row["noticelink"].'>'.$row["noticecontent"].'</a></p>
                                </div>
                            </div>
                        </div>';
                        $i++;
                    }
                    if($i<3)
                    {
                        while($i<3)
                        {
                            $response=$response.'<div class="box">
                                <div class="row">
                                    <div class="col-md-10 col-10">
                                        <p><a href="#">------</a></p>
                                    </div>
                                </div>
                            </div>';
                            $i++;
                        }
                    }
                    $response=$response.'</div>';
                    echo $response;
                }
            }
            else
            {
                $sql=$conn->prepare('SELECT * FROM notices');
    
                $sql->execute();
    
                $result=$sql->get_result();
                $response='<div class="item carousel-item active">';
                $i=0;
                while($row=mysqli_fetch_assoc($result))
                {
                    if($i==3)
                    {
                        $i=0;
                        $response=$response.'</div><div class="item carousel-item">';
                    }
                    $response=$response.'<div class="box">
                        <div class="row">
                                <div class="col-md-10 col-10">
                                    <p><a href='.$row["noticelink"].'>'.$row["noticecontent"].'</a></p>
                                </div>
                            </div>
                    </div>';
                    $i++;
                }
                if($i<3)
                {
                    while($i<3)
                    {
                        $response=$response.'<div class="box">
                            <div class="row">
                                <div class="col-md-10 col-10">
                                    <p><a href="#">------</a></p>
                                </div>
                                </div>
                            </div>
                        </div>';
                        $i++;
                    }
                }
                $response=$response.'</div>';
                echo $response;
            }
        }
        else
        {
            $sql=$conn->prepare('SELECT * FROM notices');
    
            $sql->execute();

            $result=$sql->get_result();
            $response='<div class="item carousel-item active">';
            $i=1;
            while($row=mysqli_fetch_assoc($result))
            {
                if($i==3)
                {
                    $i=0;
                    $response=$response.'</div><div class="item carousel-item">';
                }
                $response=$response.'<div class="box">
                    <div class="row">
                            <div class="col-md-10 col-10">
                                <p><a href='.$row["noticelink"].'>'.$row["noticecontent"].'</a></p>
                            </div>
                        </div>
                </div>';
                $i++;
            }
            if($i<3)
            {
                while($i<3)
                {
                    $response=$response.'<div class="box">
                        <div class="row">
                            <div class="col-md-10 col-10">
                                <p>------</p>
                            </div>
                        </div>
                    </div>';
                    $i++;
                }
            }
            $response=$response.'</div>';
            echo $response;
        }
    }
    else
    {
        $sql=$conn->prepare('SELECT * FROM notices');
    
        $sql->execute();

        $result=$sql->get_result();
        $response='<div class="item carousel-item active">';
        $i=1;
        while($row=mysqli_fetch_assoc($result))
        {
            if($i==3)
            {
                $i=0;
                $response=$response.'</div><div class="item carousel-item">';
            }
            $response=$response.'<div class="box">
                <div class="row">
                        <div class="col-md-10 col-10">
                            <p><a href='.$row["noticelink"].'>'.$row["noticecontent"].'</a></p>
                        </div>
                    </div>
            </div>';
            $i++;
        }
        if($i<3)
        {
            while($i<3)
            {
                $response=$response.'<div class="box">
                    <div class="row">
                        <div class="col-md-10 col-10">
                            <p><a href="#">------</a></p>
                        </div>
                    </div>
                </div>';
                $i++;
            }
        }
        $response=$response.'</div>';
        echo $response;
    }
}
else
{
    echo "NON SENSE";
}
?>