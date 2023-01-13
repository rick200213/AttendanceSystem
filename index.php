<?php
include "admin/connection.php";
// Check if the form has been submitted
if (isset($_POST['btn_submit'])=='submit') {
  // Get the form data
  
  /*--------------------------------------*/
	if(isset($_POST['fullname'])){
		   $name 	  = trim($_POST['fullname']);
	} else { 
		   $name 	  = '';
	}
  echo $name;die;
	
	if(isset($_POST['todate'])){
		   $date = date('Y-m-d', strtotime($_POST['todate']));
	} else { 
		    $date = '';
	}
	
	if(isset($_POST['totime'])){
		   $time 	  = trim($_POST['totime']);
	} else { 
		   $time 	  = '';
	}
	
	if(isset($_POST['idnumber'])){
		   $id_number = trim($_POST['idnumber']);
	} else { 
		  	$id_number = '';
	}
	
	if(isset($_POST['attendance'])){
		   $attendance = trim($_POST['attendance']);
	} else { 
		  	$attendance = '';
	}

 /*--------------------------------------*/

   // Validate the form data
  $error_msg = "";
  if (empty($name)) {
    $error_msg .= "&raquo; Please enter a name. <br />";
  }
  if (empty($date)) {
    $error_msg .= "&raquo; Please enter a date. <br />";
  }
  if (empty($time)) {
    $error_msg .= "&raquo; Please enter a time. <br />";
  }
  if (empty($id_number)) {
    $error_msg .= "&raquo; Please enter an ID number. <br />";
  }
  if (empty($attendance)) {
    $error_msg .= "&raquo; Please select absent or present. <br />";
  }

  // If there are no errors, insert the data into the database
  if (empty($error_msg)) {
    // Connect to the database
    $sql = "INSERT INTO attendance(fullname,todate,totime,idnumber,attendance) VALUES('$name','$date','$time','$idnumber','$attendance')";

    $result = $mysqli->query($sql);
    $mysqli->close();
    header("location:userview.php?p=successfully&id=$id_number");
  }  else {
    // Display the error message in a Bootstrap alert box
    echo "<div class='alert alert-danger'><strong>Following errors occured</strong> <br />$error_msg</div>";
  }
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
    body {
      background-color: #0000FF;
    }
    nav {
      background-color: black;
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      text-align: center;
    }
  .form-horizontal {
    padding: 20px;
  }
    .superimposed {
      background-color: lightblue;
      position: relative;
      z-index: 1;
      width: 35%;
      margin: 0 auto;
      display: flex;
      align-items: center;
      top: 50px;
      margin-top: 50px;  /* Add this line */
    }
  </style>
    <style>
        .navbar-thick {
          height: 80px;
        }
        .bg-mint-green-100 {
         background-color: #98FF98;
         padding: 100px;
        }
    </style>
  </head>
  <body class="bg-mint-green-100">
    <!-- As a link --> 
    <h1>Attendance</h1>
    <form method="post" name="attendence" id="attendence">
       <div class="form-group d-flex align-items-center">
    <label for="name" class="col-sm-6 control-label">Employee Name</label>
    <div class="col-sm-6">
      <input type="text" class="form-control m-2" id="name" name="fullname" value="<?php if(isset($_POST['fullname'])){ echo $_POST['fullname']; } ?>">
    </div>
  </div>
    <div class="form-group d-flex align-items-center">
    <label for="name" class="col-sm-6 control-label">Clock In</label>
      <div class="col-sm-6">
            <input id="startDate" class="form-control m-2" name="todate" type="date" value="<?php if(isset($_POST['todate'])){ echo $_POST['todate']; } ?>" />
        </div>
      </div>
 <div class="form-group d-flex align-items-center">
    <label for="name" class="col-sm-6 control-label">Time</label>
      <div class="col-sm-6">
            <input id="startDate" class="form-control m-2" name="totime" type="time" value="<?php if(isset($_POST['time'])){ echo $_POST['time']; } ?>" />
        </div>
      </div>

  <div class="form-group d-flex align-items-center">
    <label for="name" class="col-sm-6 control-label">Id Number</label>
      <div class="col-sm-6">
            <input id="startDate" class="form-control m-2" name="idnumber" type="text" value="<?php if(isset($_POST['idnumber'])){ echo $_POST['idnumber']; } ?>" />
        </div>
      </div>     
        <div class="form-group d-flex align-items-center">
      <label for="attendance" class="col-sm-6 control-label">Attendance</label>
      <div class="col-sm-6">
        
          <label>
            <input type="radio" name="attendance" value="present" <?php if(isset($_POST['attendance']) && ($_POST['attendance']=='present')){ ?> checked="checked"<?php } ?>> Present
          </label>
        
      
          <label>
            <input type="radio" name="attendance" value="absent" <?php if(isset($_POST['attendance']) && ($_POST['attendance']=='absent')){ ?> checked="checked"<?php } ?>> Absent
          </label>
      </div>
    </div>
    <div class="form-group d-flex align-items-center">
    <div class="col-sm-6">&nbsp;</div>
        <div class="form-group d-flex align-items-center m-2">
            <button type="submit" class="btn btn-primary" name="btn_submit" value="submit">Submit</button>
        </div>
      </div>  
      
</form>
 <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.5/dist/umd/popper.min.js" integrity="sha384-Ia8G6YO13K4By3zfMh6ZtzUOZvU6SX9bRxUyA45WVgv0B5c5w5KaiB8WuV7F5Ql" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-vgFdfhT3rX3lE/x0yjK/OgJzsT+RwRbrKZhQTZM29rO3BxZxrZlWfjKlh2QHCLwG" crossorigin="anonymous"></script>

    </body>
</html>