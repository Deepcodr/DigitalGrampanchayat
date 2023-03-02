<?php 
session_start();
if($_SESSION["userloggedin"]!=1)
{
    header("Location: http://localhost/DigitalGrampanchayat/login.php");
    exit();
}
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0026)http://schauhan.in/upnrhm/ -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uttar Pradesh National Health Mission</title>

    <link rel="stylesheet" type="text/css" href="./Uttar Pradesh National Health Mission_files/bootstrap.min.css">
    <link id="pagestyle" rel="stylesheet" type="text/css"
        href="./Uttar Pradesh National Health Mission_files/style.css">
    <link rel="stylesheet" type="text/css" href="./Uttar Pradesh National Health Mission_files/font-awesome.min.css">
    <script type="text/javascript"
        src="./Uttar Pradesh National Health Mission_files/jquery.slim.min.js.download"></script>
    <script type="text/javascript"
        src="./Uttar Pradesh National Health Mission_files/bootstrap.bundle.min.js.download"></script>
    <script src="./Uttar Pradesh National Health Mission_files/bootstrap.min.js.download"></script>
    <link href="./Uttar Pradesh National Health Mission_files/css" rel="stylesheet">
    <link rel="stylesheet" href="./Uttar Pradesh National Health Mission_files/footer.css">
    <link rel="stylesheet" href="./Uttar Pradesh National Health Mission_files/more_nav.css">


    <link rel="stylesheet" href="./Uttar Pradesh National Health Mission_files/styles.css">
    <script src="./Uttar Pradesh National Health Mission_files/jquery-latest.min.js.download"
        type="text/javascript"></script>
    <script type="text/javascript" src="./Uttar Pradesh National Health Mission_files/script.js.download"></script>

    <script type="text/javascript">
        function changesheet(sheet) {
            document.getElementById('pagestyle').setAttribute('href', sheet);
        }
    </script>
    <script src="https://kit.fontawesome.com/f5126202d4.js" crossorigin="anonymous"></script>
</head>
<body style="font-size: 100%;">
<?php include('./includes/nav.php')?>
    <h2 class="text-center">Death / Birth Registration Application</h2>
  <form class="form-horizontal" action="./utilityscripts/deathregapply.php" method="POST" enctype="multipart/form-data">
    <div class="col-sm-6">
      <div class="form-group">
        <label class="control-label col-sm-4">Applicant Name</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="aname">
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label class="control-label col-sm-4">Applicant Email ID</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="aemail">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-4">Applicant Mobile</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="amobile">
        </div>
      </div>
    </div>

    <div class="col-sm-12">
      <div class="form-group">
        <label class="control-label col-sm-2">Applicant Address</label>
        <div class="col-sm-10">
          <textarea type="text" class="form-control" rows="2" name="address"></textarea>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label class="col-sm-4 control-label">Type Of Application</label>
        <div class="col-sm-8">
          <select class="form-select" aria-label="Default select example" name="type">
            <option value="birth" selected>Birth Registration</option>
            <option value="death">Death Registration</option>
          </select>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <h4>Birth / Death Person Details</h4>

      <div class="col-sm-6">
        <div class="form-group">
          <label class="col-sm-4 control-label">Person Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="pname">
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label class="col-sm-4 control-label">Date Of Birth / Death</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="dob">
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label class="col-sm-4 control-label">Age (for death)</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="age">
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label class="col-sm-4 control-label">Spouse / Fathers Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="fname">
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label class="col-sm-4 control-label">Mothers Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="mname">
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label class="col-sm-4 control-label">Reason OF Death (for death)</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="reason">
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label class="col-sm-4 control-label">Person Permanent Address</label>
          <div class="col-sm-8">
            <textarea type="text" class="form-control" rows="2" name="paddress"></textarea>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container-fluid">
        <h4>Document Upload</h4>
        <div class="mb-3">
        <label for="formFile" class="form-label">Aadhaar Card / Ration Card</label>
        <input class="form-control" type="file" id="formFile" name="aadhaar">
        </div>
        <div class="mb-3">
        <label for="formFile" class="form-label">Dead Person's Ration Card / Aadhaar Card / Voter ID Card</label>
        <input class="form-control" type="file" id="formFile" name="daadhaar">
        </div>
    </div>
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
          I hereby declare that all above information is true as per best of my knowledge and I shall be liable to legal
          action in case of above information found fraud.
        </label>
      </div>
    </div>
    <div class="text-center">
      <button class="btn btn-primary waves-effect waves-light m-2" id="btn-submit">Apply</button>
    </div>
    <input type="hidden" name="action" id="action" value="event_dialog_add_newpartnerdata" />
  </form>
    <?php include('./includes/footer.php') ?>
</body>
</html>