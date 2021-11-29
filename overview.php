<?php
  require_once "connect-to-db.php";
  session_start();
  
?>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Overview</title>
      <link rel="stylesheet" href="style.css">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <div class="outer-div-center">
      <div class="inner-div">
        <?php // Logout button to trigger end of session and redirect to login page ?>
        <button class="btn btn-outline-warning button-hover" ><a class="a-hover"  href="logout-processing.php?logout">Logout</a></button><br><br>
        <h1 style="text-align:center">This is your personal overview</h1><br>
        <?php
          if(@$_GET['Invalid']==true){
            echo '<p style="color:red"><i>Invalid action:</i> '.@$_GET['Invalid'].'</p><br><br>';
          }

          // welcome the user individually by its name
          echo '<h5 style="text-align:center">Welcome back, dearest <i class="pink-name">';
            if(isset($_SESSION['studentId'])){
              echo $_SESSION['firstName'].'!</i></h5><hr><br>';
          
              // check if it's a student or a teacher
              $sql_stmt = "select teacher from users where studentId='".$_SESSION['studentId']."' LIMIT 1";
              $result = $conn->query($sql_stmt);
              
              if($result->num_rows > 0){
                $bool_teacher = $result->fetch_assoc();
                $_SESSION['teacher'] = $bool_teacher['teacher'];
              } else{
                echo '<p style="color:red">No entry set if you\'re a teacher or not.</p>';
              }
            
              switch($_SESSION['teacher']){
                case true:
                  include('view/teacher.php');
                  break;
                default:
                  include('view/student.php');
               }
            }
        ?>
      </div>
    </div>
  </body>
</html>