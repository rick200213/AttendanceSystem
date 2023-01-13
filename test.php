<?php
include "admin/connection.php";
// Check if the form has been submitted
if (isset($_POST['btn_submit'])=='submit') {
  // Get the form data
  
  /*--------------------------------------*/
  if(isset($_POST['fullname'])){
       $name    = trim($_POST['fullname']);
  } else { 
       $name    = '';
  }
  echo $name;die;
  
  if(isset($_POST['todate'])){
       $date = date('Y-m-d', strtotime($_POST['todate']));
  } else { 
        $date = '';
  }
  
  if(isset($_POST['totime'])){
       $time    = trim($_POST['totime']);
  } else { 
       $time    = '';
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
<html>
  <head>
    <!-- Import Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Import Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </head>
  <body>
    <!-- Navbar -->
    <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="#">Home</a></li>
          <li><a href="#">Leave Application</a></li>
          <li><a href="#">My Dashboard</a></li>
          <li><a href="#">Admin View</a></li>
        </ul>
      </div>
    </nav>
    
    <!-- Form -->
    <form>
      <div class="row">
        <!-- Name Field -->
        <div class="input-field col s12">
          <input id="name" name="fullname" type="text" class="validate" value="<?php if(isset($_POST['fullname'])){ echo $_POST['fullname']; } ?>">
          <label for="name">Name</label>
        </div>
        <!-- Clock In Field -->
        <div class="input-field col s12">
          <input id="clock-in" type="time" class="validate">
          <label for="clock-in">Clock In</label>
        </div>
        <!-- Date Field -->
        <div class="input-field col s12">
          <input id="startDate"  name="todate" type="date" class="validate" value="<?php if(isset($_POST['todate'])){ echo $_POST['todate']; } ?>">
          <label for="date">Date</label>
        </div>
        <!-- Id Field -->
        <div class="input-field col s12">
          <input id="startDate"  name="idnumber" type="text" class="validate" value="<?php if(isset($_POST['idnumber'])){ echo $_POST['idnumber']; } ?>">
          <label for="date">Id Number</label>
        </div>
        <!-- Attendance Field -->
        <div class="input-field col s12">
          <p>
            <label>
              <input name="attendance" type="radio" value="present" <?php if(isset($_POST['attendance']) && ($_POST['attendance']=='present')){ ?> checked="checked"<?php } ?> />
              <span>Present</span>
            </label>
          </p>
          <p>
            <label>
              <input name="attendance" type="radio" value="absent" <?php if(isset($_POST['attendance']) && ($_POST['attendance']=='absent')){ ?> checked="checked"<?php } ?> />
              <span>Absent</span>
            </label>
          </p>
        </div>
      </div>
      
      <!-- Submit Button -->
      <div class="row">
        <div class="col s12">
          <button class="btn waves-effect waves-light" type="submit" name="action">
            Submit
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </form>
  </body>
</html>
