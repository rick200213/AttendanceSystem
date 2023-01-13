<?php

session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if( $_POST["captcha_answer"] == $_SESSION["captcha_result"]){
        
    //something was posted
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    //checking for duplicate user names
    $check_query = "SELECT * FROM admin WHERE user_name = '$user_name' ";
    $result = mysqli_query($mysqli, $check_query);
    if(mysqli_num_rows($result)>0){
        

        echo "user already exist";
        exit;
    }else if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        //save to database
        $user_id = random_num(5);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO admin (user_id,user_name,password) VALUES ('$user_id','$user_name','$hashed_password')";
        $result = mysqli_query($mysqli, $query);
        if(!$result) {
            echo "Error: ". mysqli_error($mysqli);
        } else {
            $_SESSION['user_id'] = $user_id;
            header("location: login.php");
        }
    } else {
        echo "Please enter valid information";
    }
  } else {
    echo "Answer not matched.";
  }
}
?>      
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .border-shadow {
           box-shadow: 0px 0px 10px #888888;
           border: 1px solid #000000;
         }


  </style>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">My App</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </nav>
    <div class="container ">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="border-shadow col-md-4 mx-auto d-flex justify-content-center form-box">
        <form method="post">
        <form method="post">
        <h2 class="text-center">Signup</h2>
        <div class="form-group">
          <label for="user_name">UserName:</label>
          <input type="text" name="user_name" class="form-control" id="userID" placeholder="Enter your User ID">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter your password">
        </div>
        <div class="form-group">
          <div class="form-group">
              <label for="captcha">Two number addition:</label>
                <?php
                  $first_number = rand(11, 99);
                  $second_number = rand(1, 9);
                  $operator = "+";
                  $_SESSION["captcha_result"] = eval("return $first_number $operator $second_number;");
                  echo "$first_number $operator $second_number = ?";
                ?>
              <input type="text" name="captcha_answer" class="form-control" id="captcha" placeholder="Enter the result">
          </div>

          
        </div>
        <div class="form-group text-center">
          <button type="submit" value="Signup" class="btn btn-primary btn-lg">Submit</button>
        </div>
        <a href="index.php">Have an account.Click to Login</a>
      </form>
      </form>
      </div>

      <div class="col-md-4"></div>
      </div>
      
    </div>
  </body>
</html>

    </div>
  </body>
</html>
