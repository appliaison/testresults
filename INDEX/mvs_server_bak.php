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
<style type="text/css">

BODY { background-color: black; }

</style>
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

		$("#accordion13").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
					
		});
		
		$("#accordion131").accordion({
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
		$("#accordion5").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});
		$("#accordion51").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});
		$("#accordion52").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});

	});
	</script>
</head>

<body>

<?
require "navigator.php";
require "db.php";
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
			<!-- start of shasta -->
		<div id="accordion11">
		<h3><a href="#">Shashta</a></h3>
		<div>
			<!-- start of inset -->
				<div id="accordion" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS Enhanced Client (Shashta)%' AND c.active = '1' ORDER BY codeline_name DESC";
				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				$codeline_id = $fetch['codeline_id'];
				?>
				<h3><a onclick="populate_bundles_mvs('<?=$codeline_id?>')"><?=$fetch['codeline_name']?></a></h3>

				<div id="accordion<?=$codeline_id?>_return"> </div>

				<?
				}
				?>
				</div>
			<!-- end of inset -->
		</div>

		</div>
		<!-- end of shashta -->
		<!-- start of tahoe -->
		<div id="accordion12">
		<h3><a href="#">Tahoe</a></h3>
		<div>
		<!-- start of inset -->
				<div id="accordion121" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS Enhanced Client (Tahoe)%' AND c.active = '1' ORDER BY codeline_name DESC";
				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				$codeline_id = $fetch['codeline_id'];
				?>
				<h3><a onclick="populate_bundles_mvs('<?=$codeline_id?>')"><?=$fetch['codeline_name']?></a></h3>

				<div id="accordion<?=$codeline_id?>_return"> </div>

				<?
				}
				?>
				</div>
			<!-- end of inset -->
			
		</div>

		</div>
		<!-- end of tahoe -->
		<!-- start of yosemite -->
		<div id="accordion13">
		<h3><a href="#">Yosemite</a></h3>
		<div>
		<!-- start of inset -->
				<div id="accordion131" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS Enhanced Client (Yosemite)%' AND c.active = '1' ORDER BY codeline_name DESC";
				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				$codeline_id = $fetch['codeline_id'];
				?>
				<h3><a onclick="populate_bundles_mvs('<?=$codeline_id?>')"><?=$fetch['codeline_name']?></a></h3>

				<div id="accordion<?=$codeline_id?>_return"> </div>

				<?
				}
				?>
				</div>
			<!-- end of inset -->
			
		</div>

		</div>
		<!-- end of yosemite -->


		</div>
	</div>

	<div id="accordion2">
		<h3><a href="#">ADC Client</a></h3>
		<!-- start of ADC - MVS Standard Client -->
		<div>

				<div id="accordion21" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS Standard Client%' AND c.active = '1' ORDER BY codeline_name DESC";
				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				$codeline_id = $fetch['codeline_id'];
				?>
				<h3><a onclick="populate_bundles_mvs('<?=$codeline_id?>')"><?=$fetch['codeline_name']?></a></h3>

				<div id="accordion<?=$codeline_id?>_return"> </div>

				<?
				}
				?>
				</div>
		</div>
		<!-- end of ADC - MVS Standard Client -->
	</div>

	<div id="accordion3">
		<h3><a href="#">Enhanced Client</a></h3>
		<!-- start of MVS Enhanced Client -->
		<div>
				<div id="accordion31" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS Enhanced Client%' "
				. " AND t.type_name NOT LIKE '%MVS Enhanced Client (Shashta)%' "
				. " AND t.type_name NOT LIKE '%MVS Enhanced Client (Tahoe)%' "
				. " AND t.type_name NOT LIKE '%MVS Enhanced Client (Yosemite)%' "
				. " AND c.active = '1' ORDER BY codeline_name DESC";
				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				$codeline_id = $fetch['codeline_id'];
				?>
				<h3><a onclick="populate_bundles_mvs('<?=$codeline_id?>')"><?=$fetch['codeline_name']?></a></h3>

				<div id="accordion<?=$codeline_id?>_return"> </div>

				<?
				}
				?>
				</div>
		</div>
		<!-- end of MVS Enhanced Client -->
	</div>


	<div id="accordion4">
		<h3><a href="#">MVS Small Business Client</a></h3>
		<!-- start of MVS Small Business Client -->
		<div>
				<div id="accordion41" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS SMB Client%' "
				. " AND c.active = '1' ORDER BY codeline_name DESC";
				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				$codeline_id = $fetch['codeline_id'];
				?>
				<h3><a onclick="populate_bundles_mvs('<?=$codeline_id?>')"><?=$fetch['codeline_name']?></a></h3>

				<div id="accordion<?=$codeline_id?>_return"> </div>

				<?
				}
				?>
				</div>
		</div>
		<!-- end of MVS Small Business Client -->
	</div>
	<div id="accordion5">
		<h3><a href="#">Ascendant MVS</a></h3>
			<div>		
				<div id="accordion51">
					<h3><a href="#">v5.5 SP1</a></h3>
					<div>
						<p>Accepted for further testing</p>
					</div>
				</div>
				<!-- end of inset -->
						<!-- start of inset -->
				<div id="accordion52">
				<h3><a href="#">v4.5 SP2</a></h3>
				<div>
					<p>Accepted for further testing</p>
				</div>
			</div>
		</div>
	</div>


</div><!-- End demo -->


<div class="demo-description">


</div><!-- End demo-description -->


</body>

</html>
