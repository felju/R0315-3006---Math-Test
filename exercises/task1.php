<?php
  session_start();
  date_default_timezone_set('Europe/Helsinki');
  
  // time to »timeout« in seconds
  $_SESSION['session_timeout'] = 3600; // 3600 Sec./60 Sec. = 60 Minutes

  // set time when session starts, if not set yet
  $_SESSION['last_visit'] = time();

  // check if session is still valid
  if((time() - $_SESSION['last_visit']) > $_SESSION['session_timeout']) {
    session_destroy();
    // action if session is over
    header("location:../login.php?Timeout=Your session ran into a timeout. Only the submitted calculations have been saved");
  }

  // check submission counter
  if($_SESSION['submission_counter'] > 0) {
    header("location:task2.php?Invalid=Your answers for task 1 have already been submitted. No changes are allowed!");
  }
?>

<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Task 1: Basic Calculations</title>
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
          <h1 style="text-align:center">Task 1:</h1>
          <h2 style="text-align:center">Basic Calculations (10 Points)</h2><br>
          <?php
            if(@$_GET['Invalid']==true){
              echo '<p style="color:red"><i>Invalid action:</i> '.@$_GET['Invalid'].'</p><br>';
            }
            ?>
          <p>Please write the solutions of the calculations in the referring fields.</p>
          <hr><br>
        </div>
        <div>
          <h2>Exercises:</h2>
          <form action="task1-processing.php" method="post">
            <div>
              <br><u><h5>Calculate the results:</h5></u>
              <!-- t1e1 -->
              <div class="form-group row">
                <label for="t1e1" class="col-sm-3 col-form-label text-fields-exercises">1:&emsp;98 - 56 + 45 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t1e1" id="t1e1">
                  <?php if(@$_GET['Invalid-t1e1']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t1e1'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              <!-- t1e2 -->
              <div class="form-group row">
                <label for="t1e2" class="col-sm-3 col-form-label text-fields-exercises">2:&emsp;376 - 678 + 236 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t1e2" id="t1e2">
                  <?php if(@$_GET['Invalid-t1e2']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t1e2'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              <!-- t1e3 -->
              <div class="form-group row">
                <label for="t1e3" class="col-sm-3 col-form-label text-fields-exercises">3:&emsp;6 * 7 - 9 * 5 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t1e3" id="t1e3">
                  <?php if(@$_GET['Invalid-t1e3']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t1e3'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              <!-- t1e4 -->
              <div class="form-group row">
                <label for="t1e4" class="col-sm-3 col-form-label text-fields-exercises">4:&emsp;56 * 5 + 23 * 9 - 567 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t1e4" id="t1e4">
                  <?php if(@$_GET['Invalid-t1e4']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t1e4'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              <!-- t1e5 -->
              <div class="form-group row">
                <label for="t1e5" class="col-sm-3 col-form-label text-fields-exercises">5:&emsp;5.6 * 34 + 21 / 7 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t1e5" id="t1e5">
                  <?php if(@$_GET['Invalid-t1e5']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t1e5'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              <!-- t1e6 -->
              <div class="form-group row">
                <label for="t1e6" class="col-sm-3 col-form-label text-fields-exercises">6:&emsp;123.45 * 5.5 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t1e6" id="t1e6">
                  <?php if(@$_GET['Invalid-t1e6']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t1e6'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              <!-- t1e7 -->
              <div class="form-group row">
                <label for="t1e7" class="col-sm-3 col-form-label text-fields-exercises">7:&emsp;3276.45 / 8 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t1e7" id="t1e7">
                  <?php if(@$_GET['Invalid-t1e7']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t1e7'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              <!-- t1e8 -->
              <div class="form-group row">
                <label for="t1e8" class="col-sm-3 col-form-label text-fields-exercises">8:&emsp;748.5 / 1.5 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t1e8" id="t1e8">
                  <?php if(@$_GET['Invalid-t1e8']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t1e8'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              <!-- t1e9 -->
              <div class="form-group row">
                <label for="t1e9" class="col-sm-3 col-form-label text-fields-exercises">9:&emsp;45600 / 100 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t1e9" id="t1e9">
                  <?php if(@$_GET['Invalid-t1e9']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t1e9'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              <!-- t1e10 -->
              <div class="form-group row">
                <label for="t1e10" class="col-sm-3 col-form-label text-fields-exercises">10:&emsp;8763 * 100 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t1e10" id="t1e10">
                  <?php if(@$_GET['Invalid-t1e10']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t1e10'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-sm-2"></div>
                  <div class="col-sm-3">
                    <input class="btn btn-primary button-no-hover" type="submit" name="submit_task1" value="Submit results">
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
