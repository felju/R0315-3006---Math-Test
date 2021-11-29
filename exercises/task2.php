<?php
  session_start();
  date_default_timezone_set('Europe/Helsinki');

  // time to »timeout« in seconds
  $_SESSION['session_timeout'] = 3000; // 3000 Sec./60 Sec. = 50 Minutes

  // set time when session starts, if not set yet
  $_SESSION['last_visit'] = time();

  // check if session is still valid
  if((time() - $_SESSION['last_visit']) > $_SESSION['session_timeout']) {
    session_destroy();
    // action if session is over
    header("location:../login.php?Timeout=Your session ran into a timeout. Only the submitted calculations have been saved");
  }

  // check submission counter
  if($_SESSION['submission_counter'] > 1) {
    header("location:task3.php?Invalid=Your answers for task 2 have already been submitted. Please continue with this task now.");
  }
?>

<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Task 2: Units</title>
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
          <h1 style="text-align:center">Task 2:</h1>
          <h2 style="text-align:center">Units (20 Points)</h2><br>
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
            <form action="task2-processing.php" method="post">
              <div>
              <br><u><h5>Change to milligrams:</h5></u>
              
              <!-- t2e1 -->
              <div class="form-group row">
                <label for="t2e1" class="col-sm-3 col-form-label text-fields-exercises">1:&emsp;925 micrograms = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e1" id="t2e1">
                  <?php if(@$_GET['Invalid-t2e1']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e1'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">mg</label>
                </div>
              </div>

              <!-- t2e2 -->
              <div class="form-group row">
                <label for="t2e2" class="col-sm-3 col-form-label text-fields-exercises">2:&emsp;200 micrograms = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e2" id="t2e2">
                  <?php if(@$_GET['Invalid-t2e2']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e2'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">mg</label>
                </div>
              </div>

              <!-- t2e3 -->
              <div class="form-group row">
                <label for="t2e3" class="col-sm-3 col-form-label text-fields-exercises">3:&emsp;1386 micrograms = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e3" id="t2e3">
                  <?php if(@$_GET['Invalid-t2e3']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e3'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">mg</label>
                </div>
              </div>

              <!-- t2e4 -->
              <div class="form-group row">
                <label for="t2e4" class="col-sm-3 col-form-label text-fields-exercises">4:&emsp;500 micrograms = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e4" id="t2e4">
                  <?php if(@$_GET['Invalid-t2e4']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e4'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">mg</label>
                </div>
              </div>
                
              <!-- t2e5 -->
              <br><u><h5>Change to grams:</h5></u>
              <div class="form-group row">
                <label for="t2e5" class="col-sm-3 col-form-label text-fields-exercises">1:&emsp;7260 mg = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e5" id="t2e5">
                  <?php if(@$_GET['Invalid-t2e5']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e5'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">g</label>
                </div>
              </div>

              <!-- t2e6 -->
              <div class="form-group row">
                <label for="t2e6" class="col-sm-3 col-form-label text-fields-exercises">2:&emsp;80 mg = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e6" id="t2e6">
                  <?php if(@$_GET['Invalid-t2e6']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e6'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">g</label>
                </div>
              </div>

              <!-- t2e7 -->
              <div class="form-group row">
                <label for="t2e7" class="col-sm-3 col-form-label text-fields-exercises">3:&emsp;135 mg = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e7" id="t2e7">
                  <?php if(@$_GET['Invalid-t2e7']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e7'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">g</label>
                </div>
              </div>

              <!-- t2e8 -->
              <div class="form-group row">
                <label for="t2e8" class="col-sm-3 col-form-label text-fields-exercises">4:&emsp;1250 mg =</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e8" id="t2e8">
                  <?php if(@$_GET['Invalid-t2e8']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e8'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">g</label>
                </div>
              </div>

              <br><u><h5>Change to mililiters:</h5></u>
              <!-- t2e9 -->
              <div class="form-group row">
                <label for="t2e9" class="col-sm-3 col-form-label text-fields-exercises">1:&emsp;4.5 L = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e9" id="t2e9">
                  <?php if(@$_GET['Invalid-t2e9']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e9'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">ml</label>
                </div>
              </div>

              <!-- t2e10 -->
              <div class="form-group row">
                <label for="t2e10" class="col-sm-3 col-form-label text-fields-exercises">2:&emsp;0.9 L = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e10" id="t2e10">
                  <?php if(@$_GET['Invalid-t2e10']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e10'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">ml</label>
                </div>
              </div>

              <!-- t2e11 -->
              <div class="form-group row">
                <label for="t2e11" class="col-sm-3 col-form-label text-fields-exercises">3:&emsp;8.5 L = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e11" id="t2e11">
                  <?php if(@$_GET['Invalid-t2e11']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e11'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">ml</label>
                </div>
              </div>

              <!-- t2e12 -->
              <div class="form-group row">
                <label for="t2e12" class="col-sm-3 col-form-label text-fields-exercises">4:&emsp;2.2 L = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e12" id="t2e12">
                  <?php if(@$_GET['Invalid-t2e12']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e12'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">ml</label>
                </div>
              </div>

              <!-- t2e13 -->
              <br><u><h5>Change to liters:</h5></u>
              <div class="form-group row">
                <label for="t2e13" class="col-sm-3 col-form-label text-fields-exercises">1:&emsp;70 ml = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e13" id="t2e13">
                  <?php if(@$_GET['Invalid-t2e13']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e13'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">l</label>
                </div>
              </div>

              <!-- t2e14 -->
              <div class="form-group row">
                <label for="t2e14" class="col-sm-3 col-form-label text-fields-exercises">2:&emsp;725 ml = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e14" id="t2e14">
                  <?php if(@$_GET['Invalid-t2e14']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e14'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">l</label>
                </div>
              </div>

              <!-- t2e15 -->
              <div class="form-group row">
                <label for="t2e15" class="col-sm-3 col-form-label text-fields-exercises">3:&emsp;1575 ml = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e15" id="t2e15">
                  <?php if(@$_GET['Invalid-t2e15']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e15'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">l</label>
                </div>
              </div>

              <!-- t2e16 -->
              <div class="form-group row">
                <label for="t2e16" class="col-sm-3 col-form-label text-fields-exercises">4:&emsp;3300 ml = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e16" id="t2e16">
                  <?php if(@$_GET['Invalid-t2e16']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e16'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">l</label>
                </div>
              </div>

              <!-- t2e17 -->
              <br><u><h5>Change to micrometers:</h5></u>
              <div class="form-group row">
                <label for="t2e17" class="col-sm-3 col-form-label text-fields-exercises">1:&emsp;128 mm = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e17" id="t2e17">
                  <?php if(@$_GET['Invalid-t2e17']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e17'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">&micro;m</label>
                </div>
              </div>

              <!-- t2e18 -->
              <div class="form-group row">
                <label for="t2e18" class="col-sm-3 col-form-label text-fields-exercises">2:&emsp;32 mm = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e18" id="t2e18">
                  <?php if(@$_GET['Invalid-t2e18']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e18'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">&micro;m</label>
                </div>
              </div>

              <!-- t2e19 -->
              <div class="form-group row">
                <label for="t2e19" class="col-sm-3 col-form-label text-fields-exercises">3:&emsp;3.55 mm = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e19" id="t2e19">
                  <?php if(@$_GET['Invalid-t2e19']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e19'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">&micro;m</label>
                </div>
              </div>

              <!-- t2e20 -->
              <div class="form-group row">
                <label for="t2e20" class="col-sm-3 col-form-label text-fields-exercises">4:&emsp;22.45 mm = </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="t2e20" id="t2e20">
                  <?php if(@$_GET['Invalid-t2e20']==true){ echo '<span style="color:red">&#8593;<br>'.@$_GET['Invalid-t2e20'].'</span><br><br>'; } else { echo '<br>';} ?>
                </div>
                <div class="col-sm-1 text-fields-exercises-info">
                  <label for="t2e1" class="col-sm-2 col-form-label">&micro;m</label>
                </div>
              </div>
              
              <div class="form-group row">
                  <div class="col-sm-2"></div>
                    <div class="col-sm-3">
                      <input class="btn btn-primary button-no-hover" type="submit" name="submit_task2" value="Submit results">
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