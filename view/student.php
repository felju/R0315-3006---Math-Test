<?php
    require_once "connect-to-db.php";
?>
<div>
    <p><span style="color:#F287B7; font-size:larger;"><b><u>Important - please read attentive:</u></b></span><br>
    You're logged in with a <b>Student</b> account. Therefore you're allowed to conduct the quiz. In total 60 points can be reached.<br>
    It consists out of five different tasks. <b>Every single task has to be submited on its own and in a whole.</b><br>
    You have 60 Minutes time in total. The time for a task can differ. Every point is worth one minute. If the Task consists of 10 Points, you have 10min time for it (Task 1,3,4,5).
    If you can reach 20 Points, you have 20min time for it (Task 2). <b>Finishing a task earlier does not increase the total time for the other tasks!</b><br>
    You can log out at any time. Only the results that have been submitted will be counted. At a later point in time you can continue where you left off.</p><br>
    <p>The following tasks are to be calculated:</p>
    <?php
      // check if all tasks are done
      $arr_open_tasks = array();
      $sql_stmt_task_points = "select task1, task2, task3, task4, task5 from total_points where FK_studentId='".$_SESSION['studentId']."'";
      $result = $conn->query($sql_stmt_task_points);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          array_push($arr_open_tasks,$row['task1']);
          array_push($arr_open_tasks,$row['task2']);
          array_push($arr_open_tasks,$row['task3']);
          array_push($arr_open_tasks,$row['task4']);
          array_push($arr_open_tasks,$row['task5']);
        }
      }
      $counter_open_tasks = 0;
      foreach($arr_open_tasks as $task){
        if(is_null($task)){
          $counter_open_tasks++;
        }
      }
    ?>
    <ol>
      <li><b>Basic Calculations</b><?php echo (is_null($arr_open_tasks[0])) ? " (10 Points | Time: 10 Minutes)" : ": <b>You've reached ($arr_open_tasks[0]/10 Points)</b><br>"; ?></li>
      <li><b>Units</b><?php echo (is_null($arr_open_tasks[1])) ? " (20 Points | Time: 20 Minutes)" : ": <b>You've reached ($arr_open_tasks[1]/20 Points)</b><br>"; ?></li>
      <li><b>Percentage</b><?php echo (is_null($arr_open_tasks[2])) ? " (10 Points | Time: 10 Minutes)" : ": <b>You've reached ($arr_open_tasks[2]/10 Points)</b><br>"; ?></li>
      <li><b>Expressions, Simplify, Division, Multiplication</b><?php echo (is_null($arr_open_tasks[3])) ? " (10 Points | Time: 10 Minutes)" : ": <b>You've reached ($arr_open_tasks[3]/10 Points)</b><br>"; ?></li>
      <li><b>Roman Numbers</b><?php echo (is_null($arr_open_tasks[4])) ? " (10 Points | Time: 10 Minutes)" : ": <b>You've reached ($arr_open_tasks[4]/10 Points)</b><br>"; ?></li>
    </ol><br>

    <?php  
      // show result table (instead of button to start tasks) if all tasks are done
      if($counter_open_tasks == 0){
        echo '<br><u style="color:#ffc107"><h4>Your achieved points:</h4></u>';
        echo '<table>';
        echo '<tr>';
          echo '<th>Points Task 1<br>(max. 10 points)</th>';
          echo '<th>Points Task 2<br>(max. 20 points)</th>';
          echo '<th>Points Task 3<br>(max. 10 points)</th>';
          echo '<th>Points Task 4<br>(max. 10 points)</th>';
          echo '<th>Points Task 5<br>(max. 10 points)</th>';
          echo '<th>Total amount<br>(max. 60 points)</th>';
        echo '</tr>';
        $result = $conn->query($sql_stmt_task_points);
        if($result->num_rows > 0){
            echo '<tr>';
            echo '<td>'.$arr_open_tasks[0].'</td>';
              echo '<td>'.$arr_open_tasks[1].'</td>';
              echo '<td>'.$arr_open_tasks[2].'</td>';
              echo '<td>'.$arr_open_tasks[3].'</td>';
              echo '<td>'.$arr_open_tasks[4].'</td>';
              echo '<td style="color:#ffc107"><b>'.($arr_open_tasks[0]+$arr_open_tasks[1]+$arr_open_tasks[2]+$arr_open_tasks[3]+$arr_open_tasks[4]).'</b></td>';
            echo '</tr>';
          }
        echo '</table><br>';
      } 
      
      // show button (instead of result table) to start the tasks 
      else{
        echo '<p>Click the button below when you feel ready to start!</p>';
        // link changes based on the submitted number of tasks        
        switch($counter_open_tasks){
          case 5:
            echo '<button class="btn btn-primary button-no-hover"><a class="a-no-hover" href="exercises/task1.php">Start</a></button>';
            break;
          case 4:
            echo '<button class="btn btn-primary button-no-hover"><a class="a-no-hover" href="exercises/task2.php?Invalid=Your answers for task 1 have already been submitted. Please continue with task 2 now.">Continue with <b>Task 2</b></a></button>';
            break;
          case 3:
            echo '<button class="btn btn-primary button-no-hover"><a class="a-no-hover" href="exercises/task3.php?Invalid=Your answers for task 2 have already been submitted. Please continue with task 3 now.">Continue with <b>Task 3</b></a></button>';
            break;
          case 2:
            echo '<button class="btn btn-primary button-no-hover"><a class="a-no-hover" href="exercises/task4.php?Invalid=Your answers for task 3 have already been submitted. Please continue with task 4 now.">Continue with <b>Task 4</b></a></button>';
            break;
          case 1:
            echo '<button class="btn btn-primary button-no-hover"><a class="a-no-hover" href="exercises/task5.php?Invalid=Your answers for task 4 have already been submitted. Please continue with task 5 now.">Continue with <b>Task 5</b></a></button>';
            break;
          default:
            echo '<button class="btn btn-primary button-no-hover"><a class="a-no-hover" href="exercises/finished.php?Invalid=Your answers for all the tasks have already been submitted. No changes are allowed.">All done</a></button>';
        }
      }
    ?>
</div>
