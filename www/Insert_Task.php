
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
               
               $mult  = $_POST['mult'];
               $mem_arr = explode(",",$mult);
               
               
               $proj_title= $_POST['title'];
            
                $result = mysqli_query($con,"SELECT Project_Id FROM Project WHERE Project_Name='$proj_title'");
                $r = mysqli_fetch_array($result);
                
                $proj_id = $r['Project_Id'];
                
               
               $insert_row = "INSERT INTO Task
                   VALUES ('DEFAULT','$_POST[description]','open','$_POST[start_date] $_POST[start_time]','$_POST[end_date] $_POST[end_time]','8','$date','$_POST[task_name]','$_POST[imgsrc]','$_POST[importance]','$proj_id')";
               
               
                
                 
                 
                if (!mysqli_query($con,$insert_row))
                  {
                  die('Error: ' . mysqli_error($con));
                  }
                else 
                    {
                    $task_id = mysqli_query($con,"SELECT MAX(Task_Id) 'Task_Id' FROM Task ");
                    $t =  mysqli_fetch_array($task_id);
                    $task_id = $t['Task_Id'];
                     foreach ($mem_arr as $value)
                        {
                            $insert_mem = "INSERT INTO Task_Assignment
                               VALUES ('DEFAULT','$value','$proj_id','$task_id','1')";


                            mysqli_query($con,$insert_mem);

                        }
                    header( 'Location:  Send_JSON.php?pro_id='.$proj_id );
                       
                    }
        ?>
    </body>
</html>
