<?php
    // include the file to connect to the database
    require_once "../connect-to-db.php";
    session_start();

    if(isset($_POST["submit_task1"])){

        // array with inserted values
        $arr_inserted = array();
        $err_msg="";
        for($g=1;$g<=10;$g++){

            // trim spaces out of string
            $value = trim($_POST[('t1e'.$g)]);

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
        if(strlen($err_msg) > 0){
            header("location:task1.php?Invalid-t1e".$g."=".$err_msg);
        } 
        // if no $err_msg --> ALL INPUTS ARE VALID
        else {
            // increment session variable that results can be submitted only once
            $_SESSION['submission_counter']++;

            // array with correct solutions
            $arr_solutions = array("87","-66","-3","-80","193.4","678.975","409.55","499","456","876300");

            // create evaluation array
            $arr_evaluation = array();
            for($h=0;$h<=9;$h++){
                if($arr_inserted[$h] == $arr_solutions[$h]){
                    array_push($arr_evaluation, 1);
                } else{
                    array_push($arr_evaluation, 0);
                }
            }

            // update table 'task1' by inserting the points for the task
            for($i=0;$i<=9;$i++){
                $sql_stmt_insert_exercise_points = "update task1 set inserted_value='".$arr_inserted[$i]."',evaluation='".$arr_evaluation[($i)]."'
                where FK_studentId='".$_SESSION['studentId']."' and exercise_number='".($i+1)."'";
                $submit_query = $conn->query($sql_stmt_insert_exercise_points);
            }

            // insert gained task points into table 'total_points' for the referring Student ID
            $sql_stmt_insert_total_points = "update total_points set task1=(
                                                select count(evaluation) from task1 where FK_studentId='".$_SESSION['studentId']."' and evaluation=1
                                            ) where FK_studentId='".$_SESSION['studentId']."'";
            $submit_query = $conn->query($sql_stmt_insert_total_points);
            
            // redirect to task2
            header("location:task2.php");
        }
    
    } else{
        echo "No data for task1 have been transmitted.";
        echo '<br><br><button><a href="overview.php">Back</a></button>';
    }
?>  