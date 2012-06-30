<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TestResults</title>
<link href="css/topnav/topnav.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/jquery-1.3.2.js"></script>
<script src="lightbox-form.js" type="text/javascript"></script>
<script src="javascript/client-populate-bundles.js" type="text/javascript"></script>
<link type="text/css" href="jquery-ui-1.7.2.custom/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/ui.accordion.js"></script>
<link type="text/css" href="jquery-ui-1.7.2.custom/development-bundle/demos/demos.css" rel="stylesheet" />

<script type="text/javascript"> 
$(document).ready(function(){
	
	//hide the all of the element with class msg_body
		$(".accordion_body").hide();
		//toggle the componenet with class msg_body
		$(".accordion_head").click(function(){
			$(this).next(".accordion_body").slideToggle(250);
		});

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
	<script type="text/javascript">
	$(function() {
	$("#accordion").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		});
	
		$("#accordion1").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
			
		});
		$("#accordion11").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
			
			
		});
		$("#accordion111").accordion({
			collapsible: true,
			active: true,
			autoHeight: false			
		});
		
		$("#accordion1111").accordion({
			collapsible: true,
			active: true,
			autoHeight: false			
		});
	
		$("#accordion1112").accordion({
			collapsible: true,
			active: true,
			autoHeight: false			
		});
		
		$("#accordion12").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
					
		});
		
		$("#accordion121").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
					
		});
		
		$("#accordion1211").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
					
		});
		$("#accordion1212").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
					
		});
		
		$("#accordion13").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
					
		});
		
		$("#accordion2").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
			
		});
		
		$("#accordion21").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
			
		});
		
		$("#accordion211").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
			
		});
		$("#accordion212").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
			
		});
		
		$("#accordion22").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
			
		});
		$("#accordion3").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});
		$("#accordion31").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});
		$("#accordion4").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});
		$("#accordion41").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});

	});
	</script>
</head>

<body>

<?
require("navigator.php");
?>

<div id="filter"></div>
<div id="historybox">

</div>

<br/>
<br/>
<br/>
<br/>

<div class="demo">

<div id="accordion1">
	<h3><a href="#">Belwood</a></h3>
	<div>
		<!-- start of inset -->
	<div id="accordion11">
	<h3><a href="#">Shasta</a></h3>
	<div>
		<!-- start of inset -->
		<div id="accordion111">
		<h3><a href="#">1.1.0</a></h3>
		<div>
			<!-- start of double inset -->		
				<div id="accordion1111">
				<h3><a href="#">Bundle xx</a></h3>
				<div>
				</div>
				</div>			
			<!-- end of double inset -->
			
			<!-- start of double inset -->		
				<div id="accordion1112">
				<h3><a href="#">Bundle xxx</a></h3>
				<div>
				</div>
				</div>			
			<!-- end of double inset -->
		</div>
		</div>
		<!-- end of inset -->
	</div>

	</div>
	<!-- end of inset -->
	<!-- start of inset -->
	<div id="accordion12">
	<h3><a href="#">Tahoe</a></h3>
	<div>
		<!-- start of inset -->
		<div id="accordion121">
		<h3><a href="#">1.1.0</a></h3>
		<div>
			<!-- start of double inset -->		
				<div id="accordion1211">
				<h3><a href="#">Bundle xx</a></h3>
				<div>
				</div>
				</div>			
			<!-- end of double inset -->
			
			<!-- start of double inset -->		
				<div id="accordion1212">
				<h3><a href="#">Bundle xxx</a></h3>
				
				<div>
				</div>
				</div>			
			<!-- end of double inset -->
		</div>
		</div>
		<!-- end of inset -->
	</div>

	</div>
	<!-- end of inset -->
	<!-- start of inset -->
	<div id="accordion13">
	<h3><a href="#">Yosemite</a></h3>
	<div>
		<p>Email information</p>
	</div>

	</div>
	<!-- end of inset -->
	
	</div>
</div>


<div id="accordion2">

	<h3><a href="#">ADC Client</a></h3>
	<div>
		<!-- start of inset -->
		<div id="accordion21">
		<h3><a href="#">1.1.0</a></h3>
		<div>
			<!-- start of double inset -->		
				<div id="accordion211">
				<h3><a href="#">Bundle xx</a></h3>
				<p>Accepted for further testing</p>
				</div>			
			<!-- end of double inset -->
			
			<!-- start of double inset -->		
				<div id="accordion212">
				<h3><a href="#">Bundle xxx</a></h3>
				<div>
				<p>Accepted for further testing</p>
				</div>
				</div>			
			<!-- end of double inset -->
		</div>
		</div>
		<!-- end of inset -->
		
			<!-- start of inset -->
		<div id="accordion22">
		<h3><a href="#">1.2.0</a></h3>
		<div>
			<p>Accepted for further testing</p>
		</div>
		</div>
		<!-- end of inset -->
	</div>
</div>

<div id="accordion3">
	<h3><a href="#">Enhanced Client</a></h3>
	<div>
		<!-- start of inset -->
		<div id="accordion31">
		<h3><a href="#">1.1.0</a></h3>
		<div>
			<p>Accepted for further testing</p>
		</div>
		</div>
		<!-- end of inset -->
	</div>
</div>


<div id="accordion4">
	<h3><a href="#">Small Business Client</a></h3>
	<div>
		<!-- start of inset -->
	<div id="accordion41">
	<h3><a href="#">1.1.0</a></h3>
	<div>
		<p>Accepted for further testing</p>
	</div>

	</div>
	<!-- end of inset -->
	</div>
</div>


</div><!-- End demo -->


<div class="demo-description">


</div><!-- End demo-description -->


</body>

</html>
