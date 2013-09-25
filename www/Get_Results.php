
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
        
        
        <!-- drop down project-->
       
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css' />
        <script type="text/javascript" src="js/modernizr.custom.79639.js"></script> 
        <noscript><link rel="stylesheet" type="text/css" href="css/noJS.css" /></noscript>
        
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
           session_start();
            $param1 = $_SESSION["j_data"];
            $id = $_GET['id'];
            
             $result = mysqli_query($con,"SELECT Project_Id,Project_Name FROM Project");
             $result2 = mysqli_query($con,"SELECT u.User_Id,u.Name
                                            FROM User u
                                            WHERE u.User_Id NOT IN (SELECT p.User_Id
                                                                       FROM  Project_Members p
                                                                      WHERE p.Project_Id = '$id')");
            //echo $param1;
            ?>
      <script>
        $(document).ready(function () { 
            var pt = $('#project-title').text();
                          
         $('#add_proj').click(function(){
                             //alert("Hello");
                             $('#dialog-form').load(' Add_New_Project.php');
                    });
            //Drop  down members
                $("#mult").multiselect();
            //Drop down project
            var v;
            function DropDown(el) {
				this.dd = el;
				this.placeholder = this.dd.children('span');
				this.opts = this.dd.find('ul.dropdown > li');
				this.val = '';
				this.index = -1;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						return false;
					});	
                                        
                                        obj.opts.on('click',function(){
						var opt = $(this);
                                                
						obj.val = opt.text();
						obj.index = opt.index();
                                                v = opt.attr("id");
                                                $('#projid').val(v);
                                                //alert(v);
						obj.placeholder.text(obj.val);
					});
				},
				getValue : function() {
					return this.val;
				},
				getIndex : function() {
					return this.index;
				}
                        }

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
                                        
					$('.wrapper-dropdown-5').removeClass('active');
				});
                        });
                        
                        
                       
                    /*var timeline_data;
                    
                    $('#form3').submit(function(event){
                      //alert("Hello");
                       
                       //var proj_id = $('#proj_selected').val();
                        //alert(proj_id);
                        
                        event.preventDefault();
                       
                        var dataString= $('#form3').serialize();
                        $.ajax({
                        type: "POST",
                        url: "Send_JSON.php",
                        data: dataString ,
                        success: function(data) {
                            console.log("Hello");
                            
                            //timeline_data='[{"id":"js_history","title":"Task Timeline","description":"Javascript emerged in a specific context: the fast-paced development of Netscape browser.","focus_date":"2011-06-20 12:00:00","initial_zoom":"39","image_lane_height":50,"events":[{"id":"1","title":"Task 1","description":"jkdsjfgg","startdate":"2013-01-13 15:14:19","enddate":"2013-01-27 15:14:22","date_display":"da","high_threshold":50,"importance":"35","icon":"circle_green.png","status":"closed"}]}]';
                            data = data.replace(/\s+/, ""); 
                            var tg1 = $("#placement").timeline({
                            "min_zoom":15,
                            "max_zoom":60, 
                            "data_source":data
                            });
                            console.log(data);
                            var tg2 = tg1.data("timeline");
                           
                             
                            tg2.addEvent();
                        
                        },
                        error: function (data){
                            alert("Hi");
                        }
                        
                        
                            });
                         });*/
                    
            
     
     function updateTextInput(val) {
            document.getElementById('textInput').value=val; 
                 }
                 
   });
    </script>
       <body> 
           
           
           <!-- Create New Event Form Start-->
           <div id="dialog-form"  style="z-index:6000;" title="Create new user">
 
            </div>
           <!-- Create New Event Form End-->
           
           
           <!-- Shapes Form Start-->
           
           <div id="shapes-dialog" style="z-index:7000;" title="Select Icon">
         
           </div>
           <!-- Shapes Form End-->
           
                        
           
            <h1 style="font: normal normal 40px 'Dancing Script','Segoe UI',sans-serif;margin-left:40%;"> Project Timeline</h1>
            
            <div class="header-form">
                <form id="project" method="POST" action=" Send_JSON.php">
                        <label>Select A Project:</label>
                        <div class="container">
                            <div id="dd" class="wrapper-dropdown-5" tabindex="1"><span>Select A Project</span>
                                    <ul class="dropdown" >
                                        <?php while($row = mysqli_fetch_array($result))
                                        {?>
                                            <li id="<?php echo $row['Project_Id']?>" value="<?php echo $row['Project_Id']?>"><?php echo $row['Project_Name']?></li>
                                        
                                        <?php }?>
                                    </ul>
                            </div>
                        </div>
                            <input type="hidden" id ="projid" name="selected" value=""/>
                             <img id="add_proj" src="timeglider/img/plus_strong_cyan.png"> 
                            <input id="submit-bt" class="submit" type="submit"  value="Open">
                          <div class ="users-dropdown">
                                <select id="mult" title="Basic example" multiple="multiple" name="example-basic" size="5">
                                        <?php while($row = mysqli_fetch_array($result2))
                                        {?>
                                            <option id="selected" value="<?php echo $row['User_Id']?>"><?php echo $row['Name']?></option>
                                        <?php }?>
                                </select>
                              <input type="hidden" id ="page_name" name="page_name" value=""/>
                          </div>       
                            
                </form> 
                     
                        
                
            </div>
            <div id='placement'></div>
           
            
                <script>
                    
                  
                var data = <?php echo $param1; ?> ;
                
           var tg1 = $("#placement").timeline({
                            "min_zoom":15,
                            "max_zoom":60, 
                            "data_source":data
                            });
                            
                            var tg2 = tg1.data("timeline");
                           
                            tg2.addEvent();
                   
                   $('#page_name').val("Get_Results");
                            
                 
            
			
                </script>
    </body>
    
    
</html>