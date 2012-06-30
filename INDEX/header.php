<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TestResults</title>
<link href="css/topnav/topnav.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/jquery-1.3.2.js"></script>
<script src="lightbox-form.js" type="text/javascript"></script>
<link type="text/css" href="jquery-ui-1.7.2.custom/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/jquery-1.3.2.js"></script>
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/ui.accordion.js"></script>
<link type="text/css" href="jquery-ui-1.7.2.custom/development-bundle/demos.css" rel="stylesheet" />
		<script type="text/javascript">
	$(function() {
		$("#accordion").accordion({
			collapsible: true
		});
	});
	</script>
<script type="text/javascript"> 
$(document).ready(function(){

	$("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav
	
	$("ul.topnav li span").click(function() { //When trigger is clicked...
		
		//Following events are applied to the subnav itself (moving subnav up and down)
		$(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click

		$(this).parent().hover(function() {
		}, function(){	
			$(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up
		});

		//Following events are applied to the trigger (Hover events for the trigger)
		}).hover(function() { 
			$(this).addClass("subhover"); //On hover over, add class "subhover"
		}, function(){	//On Hover Out
			$(this).removeClass("subhover"); //On hover out, remove class "subhover"
	});

});
</script>

