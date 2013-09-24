
<!DOCTYPE html>
<html>
    <head>
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
<body>
        <form>
       <div class='tg-modal tg-full_modal' id='' style="margin-top:200px;background-color:transparent;height:525px;">
            <div class='tg-full_modal_panel'style="height:auto;width:400px;margin-left:50px;margin-top:10px"><div class='arrow-left'></div>
		<div class='tg-full_modal_content' >
                    <div id="shapes-form"class='textbox_ev_title' style="padding-top: 0px;">
                   
                        <figure style="display:inline;margin:2px;">
                      
                            <?php
                            $a=array();
                            if ($handle = opendir('timeglider/icons/')) {
                                while (false !== ($file = readdir($handle))) {
                                   if(preg_match("/\.png$/", $file)) 
                                        $a[]=$file;
                                else if(preg_match("/\.jpg$/", $file)) 
                                        $a[]=$file;
                                else if(preg_match("/\.jpeg$/", $file)) 
                                        $a[]=$file;

                                }
                                closedir($handle);
                            }

                            foreach($a as $i){
                                echo "<img id='sel-icon' name='choose_icon' class='select-icon' style='width:20px;height:20px;margin-right:10px;' src='timeglider/icons/".$i."' />";
                            }
                            ?>
                        </figure>
                    
                    
                   </div>
                    
                   <div  style="margin-top: 20px ;text-align:center;">

                    <input id="cancel-bt2" type="button" value="cancel" style="background-color: #14B9D6 ;font: bold normal 15px 'Dancing Script','Segoe UI',sans-serif;color: #a3daf5;border-color:#14B9D6;border-radius:5px;border-width: thin;padding-left: 25px;padding-right: 25px;margin-right: 15px">
                    
                    <input id="choose-bt"type="button" value="choose" style="background-color: #14B9D6; font: bold normal 15px 'Dancing Script','Segoe UI',sans-serif;color:#a3daf5;border-color:#14B9D6;border-radius:5px;border-width: thin;padding-left: 25px;padding-right: 25px">

                   </div>

            </div>
        </div>
    </div>
    </form>
        
</body>
    
    <script>
        var source;
         $('#cancel-bt2').click(function(){
                      
                    $('#shapes-dialog').empty();
               });
               
         
    
    $('.select-icon').click(function(){
                $('.select-icon').removeClass('selected-icon');
                $(this).toggleClass('selected-icon');
                source = $(this).attr("src");
              
            
        });
        var img;
        $('#choose-bt').click(function(){
           img = $('#choose_icon').attr('src',source); 
           var src = $('#choose_icon').attr("src");
            if(src.indexOf('/') >= 0) {
                src = src.substring(src.lastIndexOf('/')+1);
             }
             
              
             var input = $("<input>").attr("type", "hidden").val(src).attr("name","imgsrc");
            $('#form_1').append($(input));
            $('#shapes-dialog').empty();
            
        });
        
    </script>
</html>
