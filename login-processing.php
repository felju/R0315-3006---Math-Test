<?php
  // include the file to connect to the database
  require_once "connect-to-db.php";
  session_start();

  if(isset($_POST["login"])){
    // validate form of Student ID
    // trim spaces before and after the ID
    $studentId = trim($_POST["studentId"]);

    // check if Student ID consists of the numbers 0-9 only
    if(preg_match("/[^0-9]/",$studentId)){
      header("location:login.php?Invalid=Student IDs consist of numbers only.");
    }

    // check if Student ID has length of 7 digits
    elseif(strlen($studentId) != 7){
      header("location:login.php?Invalid=Please enter a valid Student ID. Student IDs have 7 digits. Wrong number of digits inserted.");
    } else {
      // continue here if StudentID is in correct format
      // set session variables for 'studentId' and 'firstName' + check credentials with data in database
      $sql_stmt = "select studentId, firstName, password from users where studentId='".$_POST['studentId']."'";
      $result = $conn->query($sql_stmt);

      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $_SESSION['studentId'] = $row['studentId'];
          $_SESSION['firstName'] = $row['firstName'];
          $hash = $row['password'];
        }
        if(password_verify($_POST['password'],$hash)){
          //continue here if Student ID and Passwort do match --> login is successful              
          // create a submission counter that noch changes are possible after every task submission
          $_SESSION['submission_counter'] = 0;
          
          // redirect to overview page
          header("location:overview.php");

        } else{
          // if credentials are wrong, redirect to login page
          header("location:login.php?Invalid=Please enter a valid combination of Student ID and Password.");
        }
      } else {
        // if ID does not exist
        header("location:login.php?Invalid=Please enter a valid combination of Student ID and Password.");
      }
    }
  }
  else{
    echo "No login data have been transmitted. Please try again to log in.";
    echo '<br><br><button><a href="login.php">Back to Login</a></button>';
  }
?>
