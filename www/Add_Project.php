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
               $insert_row = "INSERT INTO Project
                   VALUES ('DEFAULT','$_POST[proj_name]','<p>$_POST[proj_description]</p>','$date')";
               
               
                if (!mysqli_query($con,$insert_row))
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