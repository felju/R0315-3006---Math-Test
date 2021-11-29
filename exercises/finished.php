<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>All done!</title>
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
          <h1>All done, good luck!</h1>
          <p>You finished all of the five tasks. Now you can return to you personal overview.</p>
          <button class="btn btn-primary button-no-hover"><a class="a-no-hover" href="../overview.php">My overview</a></button>
          <?php
            if(@$_GET['Invalid']==true){
              echo '<p style="color:red"><i>Invalid action:</i> '.@$_GET['Invalid'].'</p>';
            }
          ?>
        </div>
      </div>
    </div>
   </body>
</html>