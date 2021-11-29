<?php
  session_start();
  date_default_timezone_set('Europe/Helsinki');

  // time to »timeout« in seconds
  $_SESSION['session_timeout'] = 1200; // 1200 Sec./60 Sec. = 20 Minutes

  // set time when session starts, if not set yet
  if (!isset($_SESSION['last_visit'])) {
    $_SESSION['last_visit'] = time();
  }

  // check if session is still valid
  if((time() - $_SESSION['last_visit']) > $_SESSION['session_timeout']) {
    session_destroy();
    // action if session is over
    header("location:../login.php?Timeout=Your session ran into a timeout. Only the submitted calculations have been saved");
  }

  // check submission counter
  if($_SESSION['submission_counter'] > 3) {
    header("location:task5.php?Invalid=Your answers for task 4 have already been submitted. Please continue with this task now.");
  }
?>

<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Task 4: Expressions, Simplify, Division, Multiplication</title>
      <link rel="stylesheet" href="../style.css">

      <?php //bootstrap ?>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <div class="outer-div-center">
      <div class="inner-div">
        <div>
          <?php // Logout button to trigger end of session and redirect to login page ?>
          <button class="btn btn-outline-warning button-hover" title="This task will not be submitted!" name="logout"><a class="a-hover"  href="../logout-processing.php?logout">Logout</a></button>
          <span style="color:red">&emsp;Automatic logout at: <b><?php $end = $_SESSION['last_visit'] + $_SESSION['session_timeout']; echo date("h:i:sa",$end); ?></b></span>
        </div><br><br>

        <div>
          <h1 style="text-align:center">Task 4:</h1>
          <h2 style="text-align:center">Expressions, Simplify, Division, Multiplication (10 Points)</h2><br>
          <?php
            if(@$_GET['Invalid']==true){
              echo '<p style="color:red"><i>Invalid action:</i> '.@$_GET['Invalid'].'</p><br>';
            }
          ?>
          <p>Please write the solutions of the calculations in the referring fields.</p>
          <hr><br>
        </div>
        <div>
          <h2>Exercises:</h2><br>
          <form action="task4-processing.php" method="post">
            <div>
              <u><h5>Calculate the value of the variable 'X':</h5></u>
              <!-- t4e1 -->
              <div class="form-group row">
                <label for="t4e1" class="col-sm-3 col-form-label text-fields-exercises">1:&emsp;x + 45 = 35&emsp;--> x = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t4e1" id="t4e1">
                  <?php if(@$_GET['Invalid-t4e1']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t4e1'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
                
              <!-- t4e2 -->
              <div class="form-group row">
                <label for="t4e2" class="col-sm-3 col-form-label text-fields-exercises">2:&emsp;x - 526 = 445&emsp;--> x = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t4e2" id="t4e2">
                  <?php if(@$_GET['Invalid-t4e2']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t4e2'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t4e3 -->
              <div class="form-group row">
                <label for="t4e3" class="col-sm-3 col-form-label text-fields-exercises">3:&emsp;If x = 5 then&emsp;2x + 3 - x = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t4e3" id="t4e3">
                  <?php if(@$_GET['Invalid-t4e3']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t4e3'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <u><h5>Simplify:</h5></u>
              <!-- t4e4 -->
              <div class="form-group row">
                <label for="t4e4" class="col-sm-3 col-form-label text-fields-exercises">1:&emsp;275 / 400 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t4e4" id="t4e4">
                  <?php if(@$_GET['Invalid-t4e4']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t4e4'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              
              <!-- t4e5 -->
              <div class="form-group row">
                <label for="t4e5" class="col-sm-3 col-form-label text-fields-exercises">2:&emsp;60 / 375 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t4e5" id="t4e5">
                  <?php if(@$_GET['Invalid-t4e5']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t4e5'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              
              <!-- t4e6 -->
              <div class="form-group row">
                <label for="t4e6" class="col-sm-3 col-form-label text-fields-exercises">3:&emsp;125 / 300 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t4e6" id="t4e6">
                  <?php if(@$_GET['Invalid-t4e6']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t4e6'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <u><h5>Division & Multiplication:</h5></u>
              <!-- t4e7 -->
              <div class="form-group row">
                <label for="t4e7" class="col-sm-3 col-form-label text-fields-exercises">1:&emsp;8.25 / 1000 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t4e7" id="t4e7">
                  <?php if(@$_GET['Invalid-t4e7']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t4e7'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t4e8 -->
              <div class="form-group row">
                <label for="t4e8" class="col-sm-3 col-form-label text-fields-exercises">2:&emsp;6.26 * 100 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t4e8" id="t4e8">
                  <?php if(@$_GET['Invalid-t4e8']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t4e8'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t4e9 -->
              <div class="form-group row">
                <label for="t4e9" class="col-sm-3 col-form-label text-fields-exercises">3:&emsp;3.87 * 10 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t4e9" id="t4e9">
                  <?php if(@$_GET['Invalid-t4e9']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t4e9'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t4e10 -->
              <div class="form-group row">
                <label for="t4e10" class="col-sm-3 col-form-label text-fields-exercises">4:&emsp;2.29 / 100 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t4e10" id="t4e10">
                  <?php if(@$_GET['Invalid-t4e10']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t4e10'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-2"></div>
                  <div class="col-sm-3">
                    <input class="btn btn-primary button-no-hover" type="submit" name="submit_task4" value="Submit results">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>