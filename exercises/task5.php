<?php
  session_start();
  date_default_timezone_set('Europe/Helsinki');

  // time to »timeout« in seconds
  $_SESSION['session_timeout'] = 600; // 600 Sec./60 Sec. = 10 Minutes

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
  if($_SESSION['submission_counter'] > 4) {
    header("location:finished.php?Invalid=Your answers for all the tasks have already been submitted. No changes are allowed.");
  }
?>

<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Task 5: Roman Numbers</title>
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
          <h1 style="text-align:center">Task 5:</h1>
          <h2 style="text-align:center">Roman Numbers (10 Points)</h2><br>
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
          <form action="task5-processing.php" method="post">
            <div>
              <u><h5>Transform between roman and common decimal numbers:</h5></u>
              <p>(hint: all the results are in whole numbers)</p>
              <!-- t5e1 -->
              <div class="form-group row">
                <label for="t5e1" class="col-sm-3 col-form-label text-fields-exercises">1:&emsp;IX = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t5e1" id="t5e1">
                  <?php if(@$_GET['Invalid-t5e1']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t5e1'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
                
              <!-- t5e2 -->
              <div class="form-group row">
                <label for="t5e2" class="col-sm-3 col-form-label text-fields-exercises">2:&emsp;XXXIX = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t5e2" id="t5e2">
                  <?php if(@$_GET['Invalid-t5e2']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t5e2'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t5e3 -->
              <div class="form-group row">
                <label for="t5e3" class="col-sm-3 col-form-label text-fields-exercises">3:&emsp;XXII = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t5e3" id="t5e3">
                  <?php if(@$_GET['Invalid-t5e3']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t5e3'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t5e4 -->
              <div class="form-group row">
                <label for="t5e4" class="col-sm-3 col-form-label text-fields-exercises">4:&emsp;XVI = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t5e4" id="t5e4">
                  <?php if(@$_GET['Invalid-t5e4']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t5e4'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t5e5 -->
              <div class="form-group row">
                <label for="t5e5" class="col-sm-3 col-form-label text-fields-exercises">5:&emsp;XLIV = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t5e5" id="t5e5">
                  <?php if(@$_GET['Invalid-t5e5']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t5e5'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t5e6 -->
              <div class="form-group row">
                <label for="t5e6" class="col-sm-3 col-form-label text-fields-exercises">6:&emsp;48 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t5e6" id="t5e6">
                  <?php if(@$_GET['Invalid-t5e6']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t5e6'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t5e7 -->
              <div class="form-group row">
                <label for="t5e7" class="col-sm-3 col-form-label text-fields-exercises">7:&emsp;32 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t5e7" id="t5e7">
                  <?php if(@$_GET['Invalid-t5e7']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t5e7'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t5e8 -->
              <div class="form-group row">
                <label for="t5e8" class="col-sm-3 col-form-label text-fields-exercises">8:&emsp;20 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t5e8" id="t5e8">
                  <?php if(@$_GET['Invalid-t5e8']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t5e8'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t5e9 -->
              <div class="form-group row">
                <label for="t5e9" class="col-sm-3 col-form-label text-fields-exercises">9:&emsp;14 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t5e9" id="t5e9">
                  <?php if(@$_GET['Invalid-t5e9']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t5e9'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t5e10 -->
              <div class="form-group row">
                <label for="t5e10" class="col-sm-3 col-form-label text-fields-exercises">10:&emsp;46 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t5e10" id="t5e10">
                  <?php if(@$_GET['Invalid-t5e10']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t5e10'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
          
              <div class="form-group row">
                <div class="col-sm-2"></div>
                  <div class="col-sm-3">
                    <input class="btn btn-primary button-no-hover" type="submit" name="submit_task5" value="Submit results and proceed">
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