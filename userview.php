<?php
  include "admin/connection.php";

  $idnumber = $_GET['id'];
  

  $sql = "SELECT * FROM attendance WHERE idnumber ='$idnumber' ORDER BY id DESC
";
  $result = $mysqli->query($sql);
  
  


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
    <h1>My Attendance</h1>
    <p>
    <?php
    if(isset($_REQUEST["m"])){
      echo $_REQUEST["m"];

    }
?>
    </p>
    <table class="table">
    <thead class="thead-dark">
    <tr class="thead-dark">
      <th scope="col">Sl.</th>
      <th scope="col">Fullname</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Id Number</th>
      <th scope="col">Attendance Status</th>
    </tr>
  </thead>
  <?php
        $i = 1;
        // LOOP TILL END OF DATA
        while($rows=$result->fetch_assoc())
        {
      ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $rows['fullname']; ?></td>
      <td><?php echo $rows['todate']; ?></td>
      <td><?php echo $rows['totime']; ?></td>
      <td><?php echo $rows['idnumber']; ?></td>
      <td><?php echo $rows['attendance']; ?></td>
      
    </tr>
  <?php $i++;} ?>
</table>
 <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.5/dist/umd/popper.min.js" integrity="sha384-Ia8G6YO13K4By3zfMh6ZtzUOZvU6SX9bRxUyA45WVgv0B5c5w5KaiB8WuV7F5Ql" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-vgFdfhT3rX3lE/x0yjK/OgJzsT+RwRbrKZhQTZM29rO3BxZxrZlWfjKlh2QHCLwG" crossorigin="anonymous"></script>

    </body>
</html>




