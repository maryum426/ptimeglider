
    <?php
    
        include 'Db_Connection.php';
        $t_id = $_GET['taskid'];
            
         $result = mysqli_query($con,"SELECT t.Start_Date,t.End_Date,t.Comments,u.Name 'User' FROM Task_History AS t,User AS u WHERE (t.Task_Id='$t_id') && (t.User_Id = u.User_Id) ORDER BY t.Start_Date");
         
         $data = array();
        
         while($row = mysqli_fetch_array($result)){
                $row_data = array(
                 'startdate' => $row['Start_Date'],  
                 'enddate' => $row['End_Date'],  
                 'comments' => $row['Comments'],
                 'user' => $row['User']
                );
                array_push($data, $row_data);
               }
               $table_data = json_encode(array('rows'=> $data));
               
         echo $table_data;
    ?>
    
    
    



		