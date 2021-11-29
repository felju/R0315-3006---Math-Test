<?php
    // include the file to connect to the database
    require_once "../connect-to-db.php";
    session_start();

    if(isset($_POST["submit_task2"])){

        // array with inserted values
        $arr_inserted = array();
        $err_msg="";
        for($g=1;$g<=20;$g++){

            // trim spaces out of string
            $value = trim($_POST[('t2e'.$g)]);

            // change decimal places from ',' to '.'
            $value = str_replace(",",".",$value);

            // Sanitizing input from suspicious tags
            $value = filter_var($value, FILTER_SANITIZE_STRING);
            
            /*
            VALIDATION of input with regex
            */
            //if (!empty($value) && !preg_match("/[,-\.0-9]/",$value)) {
            if (!empty($value) && !(filter_var($value, FILTER_VALIDATE_INT) == true) && !(filter_var($value, FILTER_VALIDATE_FLOAT) == true)) {
                // if not INT: message which is sent with redirect
                $err_msg = "INVALID input: \"".$value."\" --> Please insert the result as a number";
                break;
            }
            
            array_push($arr_inserted, $value);
        }
        // if not INT, then $err_msg has a length
        if(strlen($err_msg)>0){
            header("location:task2.php?Invalid-t2e".$g."=".$err_msg);
        } 
        // if no $err_msg --> ALL INPUTS ARE VALID
        else {
            // increment session variable that results can be submitted only once
            $_SESSION['submission_counter']++;

            // array with correct solutions
            $arr_solutions = array("0.925","0.2","1.386","0.5","7.26","0.08","0.135","1.25",
            "4500","900","8500","2200","0.07","0.725","1.575","3.3","128000","32000","3550","22450");

            // create evaluation array
            $arr_evaluation = array();
            for($h=0;$h<=19;$h++){
                if($arr_inserted[$h] == $arr_solutions[$h]){
                    array_push($arr_evaluation, 1);
                } else{
                    array_push($arr_evaluation, 0);
                }
            }

            // update table 'task2' by inserting the points for the task
            for($i=0;$i<=19;$i++){
                $sql_stmt_insert_exercise_points = "update task2 set inserted_value='".$arr_inserted[$i]."',evaluation='".$arr_evaluation[($i)]."'
                where FK_studentId='".$_SESSION['studentId']."' and exercise_number='".($i+1)."'";
                $submit_query = $conn->query($sql_stmt_insert_exercise_points);
            }

            // insert gained task points into table 'total_points' for the referring Student ID
            $sql_stmt_insert_total_points = "update total_points set task2=(
                                                select count(evaluation) from task2 where FK_studentId='".$_SESSION['studentId']."' and evaluation=1
                                            ) where FK_studentId='".$_SESSION['studentId']."'";
            $submit_query = $conn->query($sql_stmt_insert_total_points);
            
            // redirect to task3
            header("location:task3.php");
        }

    } else{
        echo "No data for task2 have been transmitted.";
        echo '<br><br><button><a href="overview.php">Back</a></button>';
    }
    
?>