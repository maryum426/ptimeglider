
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
        <title></title>
    </head>
    <?php
         $result = mysqli_query($con,"SELECT Emp_Id,Name FROM Employee");
        
    ?>
    
    
    <body>
        <form id ="form_proj" action="Add_Project.php" method="POST">
        <div class='tg-modal tg-full_modal' id=''style="margin-top:200px;background-color:#a3daf5;height:525px;">
        <div class='tg-full_modal_panel' style="width:425px">
            <div class='tg-full_modal_content' >
                <div style="display:inline-block;vertical-align: middle">
                    <div class='textbox_ev_title' style="padding-top: 0px;">
                        <label style="font: normal normal 20px 'Dancing Script','Segoe UI',sans-serif;color:#14B9D6;">Project Name:</label>
                        <input name="proj_name" id ="proj_name" class='event_title' type='text' value=''>
                        
                        <div  style="padding:0px;">
                        <p style="margin:0px;width:80px;font: normal normal 20px 'Dancing Script','Segoe UI',sans-serif;color:#14B9D6;">Description:</p>
                        <textarea name="proj_description" id ="description" type="text" style="text-align: justify ;border-radius: 5px;border-color:#14B9D6 ;width:380px;height:150px;"></textarea>
                        </div>    
                        
                    </div>
                    
                    <div  style="margin-top: 20px ;text-align:center;">

                        <input type="submit" value="save" style="background-color: #14B9D6 ;font: bold normal 15px 'Dancing Script','Segoe UI',sans-serif;color: #a3daf5;border-color:#14B9D6;border-radius:5px;border-width: thin;padding-left: 25px;padding-right: 25px;margin-right: 15px">
                        <button id="cancel-bt" type="button"  style="background-color: #14B9D6; font: bold normal 15px 'Dancing Script','Segoe UI',sans-serif;color:#a3daf5;border-color:#14B9D6;border-radius:5px;border-width: thin;padding-left: 25px;padding-right: 25px">cancel</button>

                    </div>
                </div>
                  
               </div>
        </div>
    </div>
</form>
        
        <script>
            
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
               
           
        </script>
</body>
</html>



		