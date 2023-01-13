<?php
session_start();
  include("connection.php");
  include("functions.php");

  $user_data = check_login($mysqli);

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">My App</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Home</a></li>
          <li><a href="logout.php">Logout</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <?php
        include("connection.php");
        // retrieve data from the database table
        $query = "SELECT * FROM attendance";
        $result = $mysqli->query($query);
        // create an HTML table with the retrieved data
        echo "<table class='table table-bordered'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>fullname</th>";
        echo "<th>todate</th>";
        echo "<th>idnumber</th>";
        echo "<th>attendance</th>";
        // add additional table headers for other columns as needed
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["fullname"] . "</td>";
            echo "<td>" . $row["todate"] . "</td>";
            echo "<td>" . $row["idnumber"] . "</td>";
            echo "<td>" . $row["attendance"] . "</td>";
            // add additional table cells for other columns as needed
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        // close the database connection
        $mysqli->close();
      ?>
    </div>
  </body>

</html>
