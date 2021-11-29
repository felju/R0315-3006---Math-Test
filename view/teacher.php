<?php
    require_once "connect-to-db.php";

    // create array with registered IDs
    $studentIds_registered = array();

    // create and fill with the Student IDs
    $sql_stmt_sIds = "select FK_studentId from total_points";
    $result_sIds = $conn->query($sql_stmt_sIds);
    foreach($result_sIds as $Id){
      array_push($studentIds_registered,$Id['FK_studentId']);
    }    
?>
    <div>
      <p>You're logged in with a <b>Teacher</b> account. Therefore you're allowed to see the results of the submitted quizes.
      The total amount of Students who have registered with an account is: <b><?php echo count($studentIds_registered); ?></b>.<br><br><br>
      In the following table you can see the overview of the results for each student sorted by their ID. Every line is equal to one student.
      The last column shows the reached amount of points:</p>
      <table>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Points Task 1<br>(max. 10 points)</th>
          <th>Points Task 2<br>(max. 20 points)</th>
          <th>Points Task 3<br>(max. 10 points)</th>
          <th>Points Task 4<br>(max. 10 points)</th>
          <th>Points Task 5<br>(max. 10 points)</th>
          <th>Total amount<br>(max. 60 points)</th>
        </tr>
      
        <?php
            // query to get data out of the tables 'total_points' and 'users'
            $sql_stmt = "select tp.FK_studentId, us.firstName, us.lastName, tp.task1, tp.task2, tp.task3, tp.task4, tp.task5
              from total_points as tp 
              inner join users as us 
                on tp.FK_studentId = us.studentId
              where us.teacher = 0
              order by FK_studentId";
            $result = $conn->query($sql_stmt);

            // build up to overview table for the teacher view
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                echo '<tr>';
                  echo '<td style="color:#007bff"><b>'.$row['FK_studentId'].'</b></td>';
                  echo '<td>'.$row['firstName'].'</td>';
                  echo '<td>'.$row['lastName'].'</td>';
                  echo '<td>'.$row['task1'].'</td>';
                  echo '<td>'.$row['task2'].'</td>';
                  echo '<td>'.$row['task3'].'</td>';
                  echo '<td>'.$row['task4'].'</td>';
                  echo '<td>'.$row['task5'].'</td>';
                  echo '<td style="color:#F287B7"><b>'.($row['task1']+$row['task2']+$row['task3']+$row['task4']+$row['task5']).'</b></td>';
                echo '</tr>';
              }
            }
        ?>
      </table><br>
    </div>
<?php
  ;
?>