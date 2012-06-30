<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TestResults</title>
<link href="css/topnav/topnav.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/jquery-1.3.2.js"></script>
<script src="lightbox-form.js" type="text/javascript"></script>
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
		$("#accordion2").accordion({
			collapsible: true,
			autoHeight: false
			
		});
		$("#accordion3").accordion({
			collapsible: true,
			autoHeight: false
		});
		$("#accordion4").accordion({
			collapsible: true,
			autoHeight: false
		});
		$("#accordion5").accordion({
			collapsible: true,
			autoHeight: false
		});
	});
	</script>
</head>

<body>

<div class="container" style="z-index:2">

    <div id="header">
    	
        <ul class="topnav">
            <li><a onclick="openbox('otasl');">OTASL</a></li>
			<li><a onclick="openbox('handheld');">Handheld</a></li>
			<li><a onclick="openbox('fermion');">Fermion</a></li>
            <li>
                <a>ARM Tools</a>
                <ul class="subnav">
                    <li><a onclick="openbox('cfp');">CFP</a></li>
                    <li><a onclick="openbox('bootrom');">Bootrom</a></li>
                    <li><a onclick="openbox('usbdriver');">USB Driver</a></li>
                </ul>
            </li>
			<li>
                <a>Carrier Support</a>
                <ul class="subnav">
                    <li><a onclick="openbox('cdlayout');">CD Layout</a></li>
                    <li><a onclick="openbox('hhvxml');" >Handheld VXML</a></li>
                    <li><a onclick="openbox('vsm');" >VSM</a></li>
					<li><a onclick="openbox('simulator');">Simulator</a></li>
                </ul>
            </li>
			<li>
                <a>Desktop Manager</a>
                <ul class="subnav">
                    <li><a onclick="openbox('desktop');">PC</a></li>
                    <li><a onclick="openbox('macdesktop');" >Mac</a></li>
                </ul>
            </li>
			<li>
                <a>BES</a>
                <ul class="subnav">
                    <li><a onclick="openbox('blackberrysmallbusinessserver');">Blackberry Small Business Server</a></li>
                    <li><a onclick="openbox('bes');">BES</a></li>
                </ul>
            </li>
			<li>
                <a>Miscellaneous</a>
                <ul class="subnav">
                    <li><a onclick="openbox('rimsigningauthority');">Signing Authority</a></li>
                    <li><a onclick="openbox('mds');">MDS</a></li>
                </ul>
            </li>
            <li><a href="?type=headrev">headrev</a></li>
        </ul>
    </div>
</div>


<div id="filter"></div>
<br/>
<br/>
<br/>
<br/>

<div id="returned_value"></div>





<div class="demo-description">


</div><!-- End demo-description -->


</body>

</html>
