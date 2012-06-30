<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TestResults</title>
<link href="css/topnav/live_css.css" rel="stylesheet" type="text/css" />
<link href="css/topnav/topnav.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/jquery-1.3.2.js"></script>
<script src="lightbox-form.js" type="text/javascript"></script>
<script src="javascript/client-populate-bundles.js" type="text/javascript"></script>

<link type="text/css" href="jquery-ui-1.7.2.custom/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<link rel="Stylesheet" href="jquery-ui-1.7.2.custom/development-bundle/themes/base/ui.selectmenu.css" type="text/css" />

<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/ui.accordion.js"></script>
<link type="text/css" href="jquery-ui-1.7.2.custom/development-bundle/demos/demos.css" rel="stylesheet" />


	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/ui.selectmenu.js"></script>

	
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.core.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.blind.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.bounce.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.clip.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.drop.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.explode.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.fold.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.highlight.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.pulsate.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.scale.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.shake.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.slide.js"></script>
	<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/effects.transfer.js"></script>


	<style type="text/css">
		.toggler { width: 920px; }
		#button { padding: .5em 1em; text-decoration: none; }
		#button2 { padding: .5em 1em; text-decoration: none; }
		#effect { width: 880px;  padding: 0.4em; position: relative; }
		#effect h3 { margin: 0; padding: 0.4em; text-align: center; font-size:12px;}
		.ui-effects-transfer { border: 2px dotted gray; } 
		
			select { width: 200px; }
	    #status{
        width:50%;
        padding:10px;
        outline:none;
        height:36px;
    }
	
	.focusField{
        border:solid 2px #0972A4;
        background:#222222;
        color:#0972A4;
    }
    .idleField{
        background:#EEE;
        color: #0972A4;
		background:#000;
        border: solid 2px #0972A4;
    }
		

	</style>


<style type="text/css">

BODY { background-color: black; }

iv.fileinputs {
	position: relative;
}

div.fakefile {
	position: absolute;
	top: 0px;
	left: 0px;
	z-index: 1;
}

input.file {
	position: relative;
	text-align: right;
	-moz-opacity:0 ;
	filter:alpha(opacity: 0);
	opacity: 0;
	z-index: 2;
}


</style>
<script type="text/javascript">
$(document).ready(function() {
    $('input[type="text"]').addClass("idleField");
	$('input[type="text"]').focus(function() {
		$(this).removeClass("idleField").addClass("focusField");
        if (this.value == this.defaultValue){
        	this.value = '';
    	}
        if(this.value != this.defaultValue){
	    	this.select();
        }
    });
    $('input[type="text"]').blur(function() {
    	$(this).removeClass("focusField").addClass("idleField");
        if ($.trim(this.value == '')){
        	this.value = (this.defaultValue ? this.defaultValue : '');
    	}
    });
});

	$(function() {
	$('#selectorA').selectmenu({style:'dropdown'});

	$('#button').text("Find");
		//run the currently selected effect
		function runEffect(test){
			//get effect type from 
			//var selectedEffect = $('#effectTypes').val();
			var selectedEffect = "clip";
			var testtext = test;
			//most effect types need no options passed by default
			var options = {};
			//check if it's scale, transfer, or size - they need options explicitly set
			if(selectedEffect == 'scale'){  options = {percent: 0}; }
			else if(selectedEffect == 'size'){ options = { to: {width: 200,height: 60} }; }
			$('#effect').html(testtext);
			//run the effect
			$("#effect").show(selectedEffect,options,500);
			
		};
		
		//set effect from select menu value
		$("#button").click(function() {
			
			var jumper_codeline_id = $('#selectorA').val();
			var jumper_bundle = $('#selectorB').val();
			 $.get("server/server-populate-handheld-smoke-jumper-effects-box.php", { jumper_codeline_id: jumper_codeline_id, jumper_bundle: jumper_bundle },
			 function(data){
			 
			  runEffect(data);

			});
			
			return false;
		});
		
		$('#button2').click(function() {
		
		$('#effect').hide();
		});
		

	

	});
	
	
	
	</script>


<script type="text/javascript"> 

jQuery(function(){
 
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
		$("#accordionstats2").accordion({
			collapsible: false,
			active: false,
			autoHeight: false,
			header: 'h3'
		});
		$('#accordionstats').accordion({ 
			collapsible: false,
			autoHeight: false,
			icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' } 
		});
		$("#accordion").accordion({
			collapsible: true,
			active: true,
			autoHeight: false,
			icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' } 
		});
		$("#accordion2").accordion({
			collapsible: true,
			autoHeight: false,
			icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' } 
		});
		$("#accordion3").accordion({
			collapsible: true,
			autoHeight: false,
			icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' } 
		});
		$("#accordion4").accordion({
			collapsible: true,
			autoHeight: false,
			icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' } 
		});
		$("#accordion5").accordion({
			collapsible: true,
			autoHeight: false,
			icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' } 
		});
		
		

	});
	</script>
</head>

<body>


<?
require 'navigator.php';
?>
<div style="clear: both;"> </div>
<div id="filter"></div>
<div id="historybox">

</div>
<?

function num_accepted_for_this_typeid_exact($typeid)
{
	require 'db.php';
	// start of accept-reject
	$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_id  = $typeid AND e.active = 1 AND t.active = 1  ";
	
	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	 $sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_id  = $typeid  "
	. " AND e.active = 1 AND t.active = 1 AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	$rejected = $fetchrejected['rejected'];	

	return $accepted = $total - $rejected;

	// end of accept-reject
	

}
function num_rejected_for_this_typeid_exact($typeid)
{
	require 'db.php';
	// start of accept-reject
	$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_id  = $typeid  AND e.active = 1 AND t.active = 1  ";
	
	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	$sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_id  = $typeid   "
	. " AND e.active = 1 AND t.active = 1 AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);

	return $rejected = $fetchrejected['rejected'];	
	
	// end of accept-reject
}


function num_accepted_for_this_typename_exact($typename)
{
	require 'db.php';
	// start of accept-reject
	$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_name = '$typename' AND e.active = 1 AND t.active = 1  ";
	
	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	 $sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_name LIKE '%$typename%' "
	. " AND e.active = 1 AND t.active = 1 AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	$rejected = $fetchrejected['rejected'];	

	return $accepted = $total - $rejected;

	// end of accept-reject
	

}
function num_rejected_for_this_typename_exact($typename)
{
	require 'db.php';
	// start of accept-reject
	$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_name = '$typename' AND e.active = 1 AND t.active = 1  ";
	
	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	$sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_name LIKE '%$typename%'  "
	. " AND e.active = 1 AND t.active = 1 AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);

	return $rejected = $fetchrejected['rejected'];	
	
	// end of accept-reject
}


function num_accepted_for_this_typename($typename)
{
	require 'db.php';
	// start of accept-reject
	$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_name LIKE '%$typename%' AND e.active = 1 AND t.active = 1  ";
	
	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	 $sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_name LIKE '%$typename%' "
	. " AND e.active = 1 AND t.active = 1 AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	$rejected = $fetchrejected['rejected'];	

	return $accepted = $total - $rejected;

	// end of accept-reject
	

}
function num_rejected_for_this_typename($typename)
{
	require 'db.php';
	// start of accept-reject
	$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_name LIKE '%$typename%' AND e.active = 1 AND t.active = 1  ";
	
	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	$sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_name LIKE '%$typename%'  "
	. " AND e.active = 1 AND t.active = 1 AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);

	return $rejected = $fetchrejected['rejected'];	
	
	// end of accept-reject
}
function num_accepted_for_this_typename_return_inactives($typename)
{
	require 'db.php';
	// start of accept-reject
	$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_name LIKE '%$typename%'  ";
	
	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	 $sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_name LIKE '%$typename%' "
	. "  AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	$rejected = $fetchrejected['rejected'];	

	return $accepted = $total - $rejected;

	// end of accept-reject
	

}
function num_rejected_for_this_typename_return_inactives($typename)
{
	require 'db.php';
	// start of accept-reject
	$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_name LIKE '%$typename%'   ";
	
	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	$sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_name LIKE '%$typename%'  "
	. " AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);

	return $rejected = $fetchrejected['rejected'];	
	
	// end of accept-reject
}
function num_accepted_for_this_codeline_and_typename($codeline_id, $typename)
{
	require 'db.php';
	// start of accept-reject
		$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_name LIKE '%$typename%' AND e.codeline_id = $codeline_id AND e.active = 1 AND t.active = 1  ";

	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	$sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_name LIKE '%$typename%' AND e.codeline_id = $codeline_id "
	. " AND e.active = 1 AND t.active = 1 AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	$rejected = $fetchrejected['rejected'];	

	return $accepted = $total - $rejected;
	// end of accept-reject
	

}
function num_rejected_for_this_codeline_and_typename($codeline_id, $typename)
{
	require 'db.php';
	// start of accept-reject
	$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_name LIKE '%$typename%' AND e.codeline_id = $codeline_id AND e.active = 1 AND t.active = 1  ";

	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	$sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_name LIKE '%$typename%' AND e.codeline_id = $codeline_id "
	. " AND e.active = 1 AND t.active = 1 AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	
	return $rejected = $fetchrejected['rejected'];	
	// end of accept-reject
}
function num_accepted_for_this_codeline_and_typename_return_inactives($codeline_id, $typename)
{
	require 'db.php';
	// start of accept-reject
		$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_name LIKE '%$typename%' AND e.codeline_id = $codeline_id  ";

	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	$sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_name LIKE '%$typename%' AND e.codeline_id = $codeline_id "
	. "  AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	$rejected = $fetchrejected['rejected'];	

	return $accepted = $total - $rejected;
	// end of accept-reject
	

}
function num_rejected_for_this_codeline_and_typename_return_inactives($codeline_id, $typename)
{
	require 'db.php';
	// start of accept-reject
	$sqltotal = "SELECT COUNT(*) AS total FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id  "
	." WHERE t.type_name LIKE '%$typename%' AND e.codeline_id = $codeline_id  ";

	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	$sqlrejected = "SELECT COUNT(*) AS rejected FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
	." WHERE t.type_name LIKE '%$typename%' AND e.codeline_id = $codeline_id "
	. "  AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	
	return $rejected = $fetchrejected['rejected'];	
	// end of accept-reject
}


switch ($_GET['type']) 
{
    case "otasl":
        include 'otasl.php';
        break;
    case "handheld_smoke":
        include 'handheld_smoke.php';
        break;
	case "handheld_smoke_by_handheld":
        include 'handheld_smoke_by_handheld.php';
        break;
	case "qstat":
        include 'qstat.php';
        break;	
	case "handheld_release":
        include 'handheld_release.php';
        break;
	case "handheld_carrier_acceptance":
        include 'handheld_carrier_acceptance.php';
        break;
	case "handheld_vsm_functional":
        include 'handheld_vsm_functional.php';
        break;
	case "fermion":
        include 'fermion.php';
        break;
	case "cfp":
		include 'cfp.php';
		break;
	case "bootrom":
		include 'bootrom.php';
		break;
	case "usbdriver":
		include 'usbdriver.php';
		break;
	case "cdlayout":
		include 'cdlayout.php';
		break;
	case "hhvxml":
		include 'hhvxml.php';
		break;
	case "vsm":
		include 'vsm.php';
		break;
	case "simulator":
		include 'simulator.php';
		break;
	case "desktop":
		include 'desktop.php';
		break;
	case "macdesktop":
		include 'macdesktop.php';
		break;
	case "blackberrysmallbusinessserver":
		include 'blackberrysmallbusinessserver.php';
		break;
	case "bes":
		include 'bes.php';
		break;
	case "signingauthority":
		include 'signingauthority.php';
		break;
	case "wallet":
		include 'wallet.php';
		break;
	case "vault":
		include 'vault.php';
		break;
	case "axloader":
		include 'axloader.php';
		break;
	case "lemonade":
		include 'lemonade.php';
		break;
	case "gmailenhancedemailclient":
		include 'gmailenhancedemailclient.php';
		break;
	case "handheldinternetsearch":
		include 'handheldinternetsearch.php';
		break;
	case "pubhandheldapp":
		include 'pubhandheldapp.php';
		break;
	case "bugcollector":
		include 'bugcollector.php';
		break;
	case "bisworkpackages-otakeygenandseamlesssignon":
		include 'bisworkpackages-otakeygenandseamlesssignon.php';
		break;
	case "bisworkpackages-addressbooksync":
		include 'bisworkpackages-addressbooksync.php';
		break;
	case "orbiter":
		include 'orbiter.php';
		break;
	case "mds":
		include 'mds.php';
		break;	
	case "mvs_client":
		include 'mvs_client.php';
		break;
	case "mvs_server":
		include 'mvs_server.php';
		break;	
	case "headrev_buildtype":
		include 'headrev_buildtype.php';
		break;		
	case "headrev_handheld":
	include 'headrev_handheld.php';
	break;	
	
	case "help":
	include 'help.php';
	break;	
	
	default :
    include 'live_section.php';
	break;
		
}
mysql_close($connect);
?>
