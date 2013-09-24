
        <?php
            include 'Db_Connection.php';
            
            $arr = $_GET['members'];
            $mem_arr = explode(",",$arr);
            $proj_title= $_GET['projtitle'];
            
            $result = mysqli_query($con,"SELECT Project_Id FROM Project WHERE Project_Name='$proj_title'");
            $r = mysqli_fetch_array($result);
            $date = $date = date('Y-m-d H:i:s');
            $proj_id = $r['Project_Id'];
           foreach ($mem_arr as $value)
            {
                $insert_row = "INSERT INTO Project_Members
                   VALUES ('DEFAULT','$proj_id','$value')";
               
               
                mysqli_query($con,$insert_row);
                  
            }
            
            
                
        ?>
    