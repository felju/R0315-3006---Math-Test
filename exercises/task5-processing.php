<?php
    // include the file to connect to the database
    require_once "../connect-to-db.php";
    session_start();

    if(isset($_POST["submit_task5"])){

        // array with inserted values
        $arr_inserted = array();
        $err_msg="";
        for($g=1;$g<=10;$g++){
            
            // trim spaces out of string
            $value = trim($_POST[('t5e'.$g)]);
            
            // change decimal places from ',' to '.'
            $value = str_replace(",",".",$value);

            // cut the decimal places out
            if(strpos($value,".")!=false){
                $value = substr($value, 0, strpos($value, "."));
            }
            
            // Sanitizing input from suspicious tags
            $value = filter_var($value, FILTER_SANITIZE_STRING);

            if($g > 5) {
                //if (!empty($value) && !preg_match("/([CDILMVXcdilmvx]+)/",$value)) {
                if (!empty($value) && !preg_match("/(^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$)|(^m{0,3}(cm|cd|d?c{0,3})(xc|xl|l?x{0,3})(ix|iv|v?i{0,3})$)/",$value)) {
                    $err_msg = "INVALID input: \"".$value."\" --> Please insert only Roman numbers (= \"I, V, X, L, C, D, and M\")";
                    break;
                } 
            }
            else {
                /*
                VALIDATION of input with regex
                */
                //if (!empty($value) && !preg_match("/[,-\.0-9]/",$value)) {
                if (!empty($value) && !(filter_var($value, FILTER_VALIDATE_INT) == true)) {
                    // if not INT: message which is sent with redirect
                    $err_msg = "INVALID input: \"".$value."\" --> Please insert whole numbers only (= 0,1,2,3,4,5,6,7,8 and 9)";
                    break;
                }
            }

            array_push($arr_inserted, $value);

        }
        // if not INT, then $err_msg has a length
        if(strlen($err_msg)>0){
            header("location:task5.php?Invalid-t5e".$g."=".$err_msg);
        } 
        // if no $err_msg --> ALL INPUTS ARE VALID
        else {
            // increment session variable that results can be submitted only once
            $_SESSION['submission_counter']++;
            
            // array with correct solutions
            $arr_solutions1 = array("9","39","22","16","44","XLVIII","XXXII","XX","XIV","XLVI");
            $arr_solutions2 = array("9","39","22","16","44","xlviii","xxxii","xx","xiv","xlvi");

            // create evaluation array
            $arr_evaluation = array();
            for($h=0;$h<=9;$h++){
                if(($arr_inserted[$h] == $arr_solutions1[$h]) || ($arr_inserted[$h] == $arr_solutions2[$h])){
                    array_push($arr_evaluation, 1);
                } else{
                    array_push($arr_evaluation, 0);
                }
            }

            // update table 'task5' by inserting the points for the task
            for($i=0;$i<=9;$i++){
                $sql_stmt_insert_exercise_points = "update task5 set inserted_value='".$arr_inserted[$i]."',evaluation='".$arr_evaluation[($i)]."'
                where FK_studentId='".$_SESSION['studentId']."' and exercise_number='".($i+1)."'";
                $submit_query = $conn->query($sql_stmt_insert_exercise_points);
            }

            // insert gained task points into table 'total_points' for the referring Student ID
            $sql_stmt_insert_total_points = "update total_points set task5=(
                                                select count(evaluation) from task5 where FK_studentId='".$_SESSION['studentId']."' and evaluation=1
                                            ) where FK_studentId='".$_SESSION['studentId']."'";
            $submit_query = $conn->query($sql_stmt_insert_total_points);

            // redirect to finished page
            header("location:finished.php");
        }
        
    } else{
        echo "No data for task4 have been transmitted.";
        echo '<br><br><button><a href="overview.php">Back</a></button>';
    }
?>