<?php 
  //if(@$_GET['Success'] == "true"){
?>
    <html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Success!</title>
      <link rel="stylesheet" href="style.css">

      <?php //bootstrap ?>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
  <div class="outer-div-center">
      <div class="inner-div">
        <h1 style="text-align:center">Success!</h1>
        <hr><br>
          <p>Your account has been created successfully and is available from now on. Please click
             the button below to go to the Login page.<br>To Login you need to insert the combination
             of <b>ID</b> and <b>Password</b>.</p><br>
          <button class="btn btn-outline-warning"><a class="a-hover" href="Login.php">Go to login page</a></button>
      </div>
    </div>
  </body>
</html>
<?php 
  /*
  } else {
    header("location:create-account-processing.php");
  }
  */
?>

