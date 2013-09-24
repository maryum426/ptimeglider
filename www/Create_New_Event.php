
<!DOCTYPE html>
<html>
    <head>
        <?php include 'Db_Connection.php'; ?>
       
        <link rel="stylesheet" href="css/jquery-ui-1.8.5.custom.css" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="timeglider/Timeglider.css" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="timeglider/timeglider.datepicker.css" type="text/css" charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/jquery.js" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/jquery-ui.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/underscore-min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/backbone-min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/json2.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.tmpl.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/ba-tinyPubSub.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.mousewheel.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.ui.ipad.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/globalize.js" type="text/javascript" charset="utf-8"></script>	
	<script src="js/ba-debug.min.js" type="text/javascript" charset="utf-8"></script>
        
        <script src="timeglider/TG_Date.js" type="text/javascript" charset="utf-8"></script>
	<script src="timeglider/TG_Org.js" type="text/javascript" charset="utf-8"></script>
	<script src="timeglider/TG_Timeline.js" type="text/javascript" charset="utf-8"></script>
	<script src="timeglider/TG_TimelineView.js" type="text/javascript" charset="utf-8"></script>
	<script src="timeglider/TG_Mediator.js" type="text/javascript" charset="utf-8"></script>
	<script src="timeglider/timeglider.timeline.widget.js" type="text/javascript" charset="utf-8"></script>
        <script src="timeglider/timeglider.datepicker.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery.jscrollpane.min.js" type="text/javascript"></script>
        
        <!-- drop down members -->
        
        <link rel="stylesheet" type="text/css" href="css/jquery.multiselect.css" />
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
        <link rel="stylesheet" type="text/css" href="assets/prettify.css" />
        <link rel="stylesheet" type="text/css" href="css/customtheme.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="assets/prettify.js"></script>
        <script type="text/javascript" src="js/jquery.multiselect.js"></script>
        
        <title></title>
    </head>
    <?php
         
         $pro_title = $_POST['proj_title'];
         $result = mysqli_query($con,"SELECT Project_Id FROM Project WHERE Project_Name='$pro_title'");
         $r = mysqli_fetch_array($result);
         $id = $r['Project_Id'];
         
         $result2 = mysqli_query($con,"SELECT u.Name,u.User_Id FROM Project_Members AS p,User AS u WHERE (p.User_Id = u.User_Id) && (p.Project_Id='$id') ");
         
    ?>
    
    
    <body>
        <form id ="form_1" action="Insert_Task.php" method="POST">
        <div class='tg-modal tg-full_modal' id=''style="margin-top:210px;background-color:#a3daf5;height:525px;">
        <div class='tg-full_modal_panel'>
            <div class='tg-full_modal_content' >
                <div style="display:inline-block;vertical-align: middle">
                    <div class='textbox_ev_title' style="padding-top: 0px;">
                        <figure name="choose_icon" style="display:inline;margin:0px;">
                            <figcaption style="font-size:10px;">icon</figcaption>
                            <img name="my_icon" id="choose_icon" src="timeglider/icons/triangle_gray.png" alt="Icon" width="20px" height="20px">
                        </figure>
                        <input name="task_name" id ="task_name" class='event_title' type='text' value='  new task....'>
                    
                    </div>
                    <div class='textbox_ev_title'>

                        <label style="font: normal normal 15px 'Dancing Script','Segoe UI',sans-serif;color:#14B9D6;">start date:</label>
                        <input name="start_date" id="start_date" type='date' style="border-radius: 5px">
                        <label style="font: normal normal 15px 'Dancing Script','Segoe UI',sans-serif;color:#14B9D6;">time:</label>
                        <input name="start_time" id="start_time" type='time' style="border-radius: 5px">

                    </div>
                    <div class='textbox_ev_title'>

                        <label style="font: normal normal 15px 'Dancing Script','Segoe UI',sans-serif;color:#14B9D6;">end date:</label>
                        <input name="end_date" id="end_date" type='date' style="border-radius: 5px">
                        <label style="font: normal normal 15px 'Dancing Script','Segoe UI',sans-serif;color:#14B9D6;">time:</label>
                        <input name="end_time" id="end_time" type='time' style="border-radius: 5px">

                    </div>
                    <div class='textbox_ev_title' style="text-align:center;">

                       <label style="font: normal normal 15px 'Dancing Script','Segoe UI',sans-serif;color:#14B9D6;">importance</label>
                       <input type='range' min="0" max="100" step="2" onchange="updateTextInput(this.value)" style="border-radius: 5px">
                       <input  name="importance" id="textInput" type="text" maxLength="3" value="50" style="text-align:center ;width:30px;border-color:#14B9D6;border-radius:5px;border-width: thin ;font: normal normal 15px 'Dancing Script','Segoe UI',sans-serif;color:#14B9D6;" value="">

                   </div>
                    <div class='textbox_ev_title' style="text-align:center;">

                        <label style="font: normal normal 15px 'Dancing Script','Segoe UI',sans-serif;color:#14B9D6;">Assign To:</label>
                        <div class ="users-dropdown">
                                <select id="mult" title="Basic example" multiple="multiple" name="" size="5">
                                        <?php while($row = mysqli_fetch_array($result2))
                                        {?>
                                            <option id="selected" value="<?php echo $row['User_Id']?>"><?php echo $row['Name']?></option>
                                        <?php }?>
                                </select>
                          </div>

                    </div>
                    
                   
                    <div  style="margin-top: 20px ;text-align:center;">

                        <input type="submit" value="save" style="background-color: #14B9D6 ;font: bold normal 15px 'Dancing Script','Segoe UI',sans-serif;color: #a3daf5;border-color:#14B9D6;border-radius:5px;border-width: thin;padding-left: 25px;padding-right: 25px;margin-right: 15px">
                        <button id="cancel-bt" type="button"  style="background-color: #14B9D6; font: bold normal 15px 'Dancing Script','Segoe UI',sans-serif;color:#a3daf5;border-color:#14B9D6;border-radius:5px;border-width: thin;padding-left: 25px;padding-right: 25px">cancel</button>

                    </div>
                </div>
                    <div  style="margin-left:20px;padding:0px;display:inline-block;vertical-align: middle">
                        <p style="margin:0px;width:80px;background-color: white ;padding:0px;font: normal normal 15px 'Dancing Script','Segoe UI',sans-serif;color:#14B9D6;">Description</p>
                        <textarea name="description" id ="description" type="text" style="text-align: start ;border-color:transparent ;width:350px;height:200px;"></textarea>
                    </div>    
                    <input type="hidden" id ="proj" name="title" value=""/>
                    <input type="hidden" id ="mul" name="mult" value=""/>
                    
               </div>
        </div>
    </div>
</form>
        
        <script>
            
            var proj_title = $('#project-title').text();
            $('#proj').val(proj_title);
            
            //Drop  down members
                $("#mult").multiselect();
                
                //var mul_dd = $('#mult').val();
                
                
            function updateTextInput(val) {
      document.getElementById('textInput').value=val; 
    }
            $('#cancel-bt').click(function(){
                      
                    cancelClick();
               });
               
               function cancelClick()
               {
                   $('#dialog-form').empty();
               }
               
            $('#choose_icon').click(function(){
                $('#shapes-dialog').load('C:\\Users\\maryum.babar\\ptimeglider\\www\\Shapes_Form.php');
            });
            
        </script>
</body>
</html>



		