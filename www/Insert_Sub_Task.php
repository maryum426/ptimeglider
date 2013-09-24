
        <?php
         
                include 'Db_Connection.php'; 
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
                
               
               $insert_row = "INSERT INTO Sub_Task
                   VALUES ('DEFAULT','$_POST[description]','$_POST[start_date] $_POST[start_time]','$_POST[end_date] $_POST[end_time]','8','$_POST[task_id]','$date','open','$_POST[task_name]','$_POST[importance]','$proj_id')";
               
                if (!mysqli_query($con,$insert_row))
                  {
                  die('Error: ' . mysqli_error($con));
                  }
                else 
                    {
                    $sub_task_id = mysqli_query($con,"SELECT MAX(Sub_Task_Id) 'Sub_Task_Id' FROM Sub_Task ");
                    $t =  mysqli_fetch_array($sub_task_id);
                    $sub_task_id = $t['Sub_Task_Id'];
                     foreach ($mem_arr as $value)
                        {
                            $insert_mem = "INSERT INTO Sub_Task_Assignment
                               VALUES ('DEFAULT','$sub_task_id','$_POST[task_id]','$proj_id','$value','1')";


                            mysqli_query($con,$insert_mem);

                        }
                    header( 'Location: file:///C:/Users/maryum.babar/ptimeglider/www/Send_JSON.php?pro_id='.$proj_id );
                       
                    }
        ?>
 