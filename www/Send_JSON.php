<?php
        include 'Db_Connection.php';
        session_start();
        
            $p_id = $_POST["selected"];
            if ($p_id == null){
                $p_id = $_GET["pro_id"];
            }
            
            $project = mysqli_query($con,"SELECT * FROM Project WHERE Project_Id='$p_id'");
            $record = mysqli_fetch_array($project); 
            
            
            
            $result = mysqli_query($con,"SELECT * FROM Task WHERE Project_Id ='$p_id'");
            $data  = array();
            
            while($row = mysqli_fetch_array($result)){
                $row_data = array(
                 'id' => $row['Task_Id'],  
                 'title' => $row['Name'],  
                 'description' => $row['Description'],
                 'startdate' => $row['Start_Date'],
                 'enddate' => $row['End_Date'],
                 'date_display' => 'da',
                 'high_threshold' => 50,
                 'importance' => $row['Importance'],
                 'icon' =>  $row['Icon'],
                 'status' => $row['Status']
                 );
                array_push($data, $row_data);
               }
               $date = $date = date('Y-m-d H:i:s');
               $json_data = '['.json_encode(array('id'=> $record['Project_Id'],
                            'title'=> $record['Project_Name'],
                            'description'=>  $record['Description'],
                            'focus_date'=> $date,
                            'initial_zoom'=>'39',
                            'image_lane_height'=>50,
                            'events' => $data)
                   ).']';
               
               
              
               
               //$file = "Project 1.json";
               //file_put_contents($file, $json_data);
               
               $_SESSION['j_data'] = $json_data;
               //$_SESSION['pid'] = $pid;
               //echo $json_data;
               //echo $json_data;
              
                   header( "Location:  Get_Results.php?id=".$p_id );
              
               
        ?>
    