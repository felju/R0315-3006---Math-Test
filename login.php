<?php
?>

<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="style.css">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <div class="outer-div-center">
      <div class="inner-div">
        <button class="btn btn-outline-warning"><a class="a-hover" href="index.php">Back</a></button><br><br>
        <h1 style="text-align:center">Log in your existing account</h1>
        <hr><br>
        <?php
          if(@$_GET['Invalid']==true){
            echo '<p style="color:red"><i>Invalid login:</i> '.@$_GET['Invalid'].'</p><br>';
          }
          if(@$_GET['Timeout']==true){
            echo '<p style="color:red"><i>Session Timeout:</i> '.@$_GET['Timeout'].'</p><br>';
          }
        ?>
        <p>Please enter your <b>ID</b> and your <b>Passwort</b>.</p><br>
        <form action="login-processing.php" method="post">
          <div>
            <div class="form-group row">
              <label for="sId" class="col-sm-2 col-form-label">Your ID:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control text-fields" name="studentId" id="sId" required><br>        
              </div>
            </div>
            <div class="form-group row">
              <label for="pass" class="col-sm-2 col-form-label">Password:</label>
              <div class="col-sm-3">
                <input type="password" class="form-control text-fields" name="password" id="pass" required><br>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2"></div>
                <div class="col-sm-3">
                  <input class="btn btn-primary button-no-hover" type="submit" name="login" value="Login">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    

  </body>
</html>
