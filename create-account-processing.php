<?php
  // include the file to connect to the database
  require_once "connect-to-db.php";

  // define variables with empty values
  $studentId = $fname = $lname = $password = $confi_password = $studentId_err = $fname_err = $lname_err = $password_err = $confi_password_err = "";

  // processing data after clicking on submit button
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    // assign StudentId from form to variable
    if(isset($_POST["studentId"])){
        // trim spaces before and after the ID
        $studentId = mysqli_real_escape_string($conn, trim($_POST["studentId"]));

        // check if Student ID consists of the numbers 0-9 only
        if(preg_match("/[^0-9]/",$studentId)){
          $studentId_err = "Student IDs consist of numbers only.";
        }

        /* Regex check replaces this validation
        // check if Student ID is an Integer
        elseif(filter_var($studentId, FILTER_VALIDATE_INT) == false){
          $studentId_err = "Student IDs consist of numbers only.";
        }
        */

        // check if Student ID has length of 7 digits
        elseif(strlen($studentId) != 7){
          $studentId_err = "IDs have 7 digits. Wrong number of digits inserted.";
        }

        // check if there is already exists an account with this Student ID
        $sql_stmt1 = "select * from users where studentId='$studentId' LIMIT 1";
        $result = $conn->query($sql_stmt1);
        if($result->num_rows > 0){
          $studentId_err = "For this ID an account has already been created.";
        }
    }

    // assign FirstName from form to variable
    if(isset($_POST["fname"])){
        // Sanitizing input for suspicious tags und quotes + trim spaces before and after the first name
        $fname = mysqli_real_escape_string($conn, trim(filter_var($_POST["fname"], FILTER_SANITIZE_STRING)));

        // check if first name has length of max. 20 characters
        if(strlen($fname) > 20){
          $fname_err = "First name is too lang. A maximum of 20 characters is allowed.";
        }
    }

    // assign LastName from form to variable
    if(isset($_POST["lname"])){
      // Sanitizing input for suspicious tags und quotes
      $lname = mysqli_real_escape_string($conn, filter_var($_POST["lname"], FILTER_SANITIZE_STRING));

      // check if last name has length of max. 30 characters
      if(strlen($lname) > 30){
        $lname_err = "Last name is too lang. A maximum of 30 characters is allowed.";
      }
    }

    // validate password
    if(isset($_POST["password"])){
      if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a Password with at least 6 characters.";
      } elseif(strlen(trim($_POST["password"])) < 6) {
        $password_err = "The password is to short. It has to consist of at least 6 characters.";
      } else {
        $password = mysqli_real_escape_string($conn, trim($_POST["password"]));
      }
    }

    // check confirmed password
    if(isset($_POST["confi_password"])){
      if(empty(trim($_POST["confi_password"]))){
      $confi_password_err = "Please confirm the password.";
      } else {
        $confi_password = mysqli_real_escape_string($conn, trim($_POST["confi_password"]));
        if(empty($password_err) && ($password != $confi_password)){
          $confi_password_err = "The inserted passwords do not match... Please try again.";
        }
      }
    }

    // error checks before inserting into database
    if(empty($password_err) && empty($confi_password_err) && empty($studentId_err)){
      // sql statement to insert data
      $sql = "insert into users (studentId, firstName, lastName, password)
        values (?, ?, ?, ?)";

      /* rel: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
      prepare the insert statement for the followig reasons:
        - Prepared statements reduce parsing time as the preparation on the query is done only
        once (although the statement is executed multiple times)
        - Bound parameters minimize bandwidth to the server as you need send only the parameters
        each time, and not the whole query
        - Prepared statements are very useful against SQL injections, because parameter values,
        which are transmitted later using a different protocol, need not be correctly escaped.
        If the original statement template is not derived from external input, SQL injection
        cannot occur.
      */
      if($sql_stmt2 = mysqli_prepare($conn, $sql)){
        // bind varialbes as parameters
        mysqli_stmt_bind_param($sql_stmt2, "ssss", $param_studentID, $param_fname, $param_lname, $param_password);

        // set parameters
        $param_studentID = $studentId;
        $param_fname = $fname;
        $param_lname = $lname;
        // + create a password hash with the method 'password_hash'
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // try to execute the prepared statement
        if(mysqli_stmt_execute($sql_stmt2) && $studentId != 0){

          // inital insert of Student ID to table 'total_points' --> Table saves the gained points for the tasks
          $sql_stmt_insert_studentId = "insert into total_points(FK_studentId)
          values ('".$studentId."')";
          $submit_query = $conn->query($sql_stmt_insert_studentId);

          // inital insert of Student ID to tables 'task x' --> Table saves the gained points for the tasks
          for($i=1;$i<=10;$i++){
            $sql_stmt_insert_studentId = "insert into task1(FK_studentId,exercise_number)
            values ('".$studentId."','".$i."')";
            $submit_query = $conn->query($sql_stmt_insert_studentId);
          }

          for($i=1;$i<=20;$i++){
            $sql_stmt_insert_studentId = "insert into task2(FK_studentId,exercise_number)
            values ('".$studentId."','".$i."')";
            $submit_query = $conn->query($sql_stmt_insert_studentId);
          }

          for($i=1;$i<=10;$i++){
            $sql_stmt_insert_studentId = "insert into task3(FK_studentId,exercise_number)
            values ('".$studentId."','".$i."')";
            $submit_query = $conn->query($sql_stmt_insert_studentId);
          }

          for($i=1;$i<=10;$i++){
            $sql_stmt_insert_studentId = "insert into task4(FK_studentId,exercise_number)
            values ('".$studentId."','".$i."')";
            $submit_query = $conn->query($sql_stmt_insert_studentId);
          }

          for($i=1;$i<=10;$i++){
            $sql_stmt_insert_studentId = "insert into task5(FK_studentId,exercise_number)
            values ('".$studentId."','".$i."')";
            $submit_query = $conn->query($sql_stmt_insert_studentId);
          }

          // redirect to the welcome page
          header("location:account-created.php");
        }

        // close statement
        mysqli_stmt_close($sql_stmt2);
      }
    }

    // close connection to database
    mysqli_close($conn);
  }
?>

<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Create an account</title>
      <link rel="stylesheet" href="style.css">

      <?php //bootstrap ?>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
  <div class="outer-div-center">
      <div class="inner-div">
        <button class="btn btn-outline-warning"><a class="a-hover" href="index.php">Back</a></button><br><br>
        <h1 style="text-align:center">Create a new account</h1>
        <hr><br>
          <p>Please enter your personal data beneath to create an account.</p><br>
          <!-- "$_SERVER["PHP_SELF"] exploits can be avoided by using the htmlspecialchars() function."
            rel: https://www.w3schools.com/html/html_comments.asp -->
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>  
              <div class="form-group row">
                <label for="sId" class="col-sm-3 col-form-label">Your ID:<br><i>(if not reveived yet, enter 7 digits)</i></label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="studentId" id="sId" value="<?php echo $studentId; ?>" required>
                  <span><?php echo $studentId_err; ?></span><br><br>
                </div>
              </div>
              <div class="form-group row">
                <label for="fname" class="col-sm-3 col-form-label">First Name:</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="fname" id="fname" value="<?php echo $fname; ?>" required><br><br>
                </div>
              </div>
              <div class="form-group row">
                <label for="lname" class="col-sm-3 col-form-label">Last Name:</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control text-fields" name="lname" id="lname" value="<?php echo $lname; ?>" required><br><br>
                </div>
              </div>
              <div class="form-group row">
                <label for="pass" class="col-sm-3 col-form-label">Password:</label>
                <div class="col-sm-3">
                  <input type="password" class="form-control text-fields" name="password" id="pass" value="<?php echo $password; ?>" required>
                  <span><?php echo $password_err; ?></span><br><br>
                </div>
              </div>
              <div class="form-group row">
                <label for="confi_pass" class="col-sm-3 col-form-label">Confirm Password:</label>
                <div class="col-sm-3">
                  <input type="password" class="form-control text-fields" name="confi_password" id="confi_pass" value="<?php echo $confi_password; ?>" required>
                  <span><?php echo $confi_password_err; ?></span><br><br>
                </div>
              </div>
              <div class="form-group row">
              <div class="col-sm-3"></div>
                <div class="col-sm-3">
                  <input class="btn btn-primary button-no-hover" type="submit" name="create" value="Create account">
                </div>
              </div>
            </div>
          </form>
  </body>
</html>
