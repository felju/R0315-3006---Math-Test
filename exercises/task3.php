<?php
  session_start();
  date_default_timezone_set('Europe/Helsinki');
  
  // time to »timeout« in seconds
  $_SESSION['session_timeout'] = 1800; // 1800 Sec./60 Sec. = 30 Minutes

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
  if($_SESSION['submission_counter'] > 2) {
    header("location:task4.php?Invalid=Your answers for task 3 have already been submitted. Please continue with this task now.");
  }
?>

<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Task 3: Percentage</title>
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
          <span style="color:red">&emsp;Automatic logout at: <b><?php $end = $_SESSION['last_visit'] + $_SESSION['session_timeout']; echo date("h:i:sa",$end);?></b></span>
        </div><br><br>

        <div>
          <h1 style="text-align:center">Task 3:</h1>
          <h2 style="text-align:center">Percentage (10 Points)</h2><br>
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
          <form action="task3-processing.php" method="post">
            <div>
              <br><u><h5>Calculate based on the given percentages:</h5></u>
              <p>(hint: all the results are in whole numbers)</p>
              <!-- t3e1 -->
              <div class="form-group row">
                <label for="t3e1" class="col-sm-3 col-form-label text-fields-exercises">1:&emsp;10% of 2500 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t3e1" id="t3e1">
                  <?php if(@$_GET['Invalid-t3e1']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t3e1'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>
          
              <!-- t3e2 -->
              <div class="form-group row">
                <label for="t3t3e2e1" class="col-sm-3 col-form-label text-fields-exercises">2:&emsp;30% of 4700 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t3e2" id="t3e2">
                  <?php if(@$_GET['Invalid-t3e2']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t3e2'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t3e3 -->
              <div class="form-group row">
                <label for="t3e3" class="col-sm-3 col-form-label text-fields-exercises">3:&emsp;50% of 7500 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t3e3" id="t3e3">
                  <?php if(@$_GET['Invalid-t3e3']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t3e3'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t3e4 -->
              <div class="form-group row">
                <label for="t3e4" class="col-sm-3 col-form-label text-fields-exercises">4:&emsp;80% of 9200 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t3e4" id="t3e4">
                  <?php if(@$_GET['Invalid-t3e4']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t3e4'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t3e1 -->
              <div class="form-group row">
                <label for="t3e5" class="col-sm-3 col-form-label text-fields-exercises">5:&emsp;15% of 1100 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t3e5" id="t3e5">
                  <?php if(@$_GET['Invalid-t3e5']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t3e5'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t3e6 -->
              <div class="form-group row">
                <label for="t3e6" class="col-sm-3 col-form-label text-fields-exercises">6:&emsp;35% of 2200 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t3e6" id="t3e6">
                  <?php if(@$_GET['Invalid-t3e6']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t3e6'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <!-- t3e7 -->
              <div class="form-group row">
                <label for="t3e7" class="col-sm-3 col-form-label text-fields-exercises">7:&emsp;42% of 4800 = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t3e7" id="t3e7">
                  <?php if(@$_GET['Invalid-t3e7']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t3e7'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
              </div>

              <u><h5>Find the percentages:</h5></u>
              <p>(hint: all the results are in whole numbers)</p>
              <!-- t3e8 -->
              <div class="form-group row">
                <label for="t3e8" class="col-sm-3 col-form-label text-fields-exercises">8:&emsp;1500 ml out of 2500 ml = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t3e8" id="t3e8">
                  <?php if(@$_GET['Invalid-t3e8']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t3e8'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">%</label>
                </div>
              </div>

              <!-- t3e9 -->
              <div class="form-group row">
                <label for="t3e9" class="col-sm-3 col-form-label text-fields-exercises">9:&emsp;1200 ml out of 4000 ml = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t3e9" id="t3e9">
                  <?php if(@$_GET['Invalid-t3e9']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t3e9'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">%</label>
                </div>
              </div>

              <!-- t3e10 -->
              <div class="form-group row">
                <label for="t3e10" class="col-sm-3 col-form-label text-fields-exercises">10:&emsp;650 ml out of 1000 ml = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t3e10" id="t3e10">
                  <?php if(@$_GET['Invalid-t3e10']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t3e10'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">%</label>
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-sm-2"></div>
                  <div class="col-sm-3">
                    <input class="btn btn-primary button-no-hover" type="submit" name="submit_task3" value="Submit results">
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