<!DOCTYPE html>
<html>
<title>Online HTML Editor</title>
<head>
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
</head>
<body>
  <nav>
    <h1 style="color: white;">𝔸𝕋𝕋𝔼ℕ𝔻𝔸ℕℂ𝔼</h1>
  </nav>
  <div class="superimposed">
  <form action="attendance.php" method="post" class="form-horizontal d-flex align-items-center">
    <div class="form-group d-flex align-items-center">
    <label for="name" class="col-sm-2 control-label">Employee Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <label for="clock_in" class="col-sm-2 control-label">Clock In</label>
    <div class="col-sm-4">
      <input type="time" class="form-control" id="clock_in" name="clock_in" required>
    </div>
  </div>
    <div class="form-group">
      <label for="date" class="col-sm-2 control-label">Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="date" name="date" required>
      </div>
    </div>
    <div class="form-group">
      <label for="attendance" class="col-sm-2 control-label">Attendance</label>
      <div class="col-sm-10">
        <div class="radio">
          <label>
            <input type="radio" name="attendance" value="present" required> Present
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="attendance" value="absent"> Absent
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>
</body>
</html>

