<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <?php include 'Db_Connection.php'; ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
         <?php
         
               $date = $date = date('Y-m-d H:i:s');
               /*$description = $_POST['description'];
               $start_date = $_POST['start_date'].$_POST['start_time'];
               $end_date = $_POST['end_date'].$_POST['end_time'];
               $selected = $_POST['selected'];
               $task_name = $_POST['task_name'];
               $img = $_POST['imgsrc'];
               $imp = $_POST['importance'];
               
               echo $date;
               echo $description;
               echo $start_date;
               echo $end_date;
               echo $selected;
               echo $task_name;
               echo $img;
               echo $imp;*/
              
               $get_taskid = "SELECT Task_Id FROM Task
                                WHERE Name='$_POST[title]'";
               $task_id = mysqli_query($con, $get_taskid);
               $row = mysqli_fetch_array($task_id);
               $id = $row['Task_Id'];
               
        
               
               $insert_row = "INSERT INTO Task_Completion
                   VALUES ('DEFAULT','$_POST[start_date] $_POST[start_time]','$_POST[end_date] $_POST[end_time]','$_POST[comments]','$date','$id')";
                             
               $update_record = "UPDATE Task SET Start_Date='$_POST[start_date] $_POST[start_time]',End_Date='$_POST[end_date] $_POST[end_time]',Status='closed',Last_Updated='$date'
                             WHERE Task_Id = '$id'";
               
               
                if (!mysqli_query($con,$insert_row))
                  {
                  die('Error: ' . mysqli_error($con));
                  }
                if (!mysqli_query($con,$update_record))
                  {
                  die('Error: ' . mysqli_error($con));
                  }
                else 
                    {
                    
                    header( 'Location: C:\\Users\\maryum.babar\\ptimeglider\\www\\Send_JSON.php' );
                       
                    }
        ?>
    </body>
</html>
