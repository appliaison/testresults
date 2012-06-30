
</script>
	<script type="text/javascript">
	$(function() {
	$("#accordion").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		});
	
		$("#accordion_belwood").accordion({
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
		
		$("#accordion_adc_client").accordion({
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
		$("#accordion_enhanced_client").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});
		$("#accordion31").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});
		$("#accordion_smb_client").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});
		$("#accordion41").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});
		$("#accordion_ascendant").accordion({
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


<div id="returned_value"></div>
<?


$acceptedx = num_accepted_for_this_typename("MVS Standard Server") + 
num_accepted_for_this_typename("MVS Enhanced Server") +
num_accepted_for_this_typename("MVS SB Server") +
num_accepted_for_this_typename("Ascendant MVS Server");


$rejectedx = num_rejected_for_this_typename("MVS Standard Server") +
num_rejected_for_this_typename("MVS Enhanced Server") +
num_rejected_for_this_typename("MVS SB Server") +
num_rejected_for_this_typename("Ascendant MVS Server");	
	
?>	

<!-- start of stats bar -->
<div class="demo">
<div id="accordionstats" style="font-size:13px";>
<h3><a href="#">
<?


echo "MVS Server   ";
echo "<img src='images/tick.png' width='13px' title='accepted' alt='accepted'/>";
echo  $acceptedx;
echo "&nbsp;&nbsp;&nbsp;&nbsp;";

echo "<img src='images/x.png' width='13px' title='rejected' alt='rejected'/>";
echo $rejectedx;

echo "<br />";
require 'db.php';
?></a>
</h3>
<div>

</div>
</div>
</div>
<!-- end of stats bar -->
<div class="demo">
	<div id="accordion_belwood">
		<h3><a href="#">Belwood</a></h3>
		<div>
			<!-- start of shasta -->
		<div id="accordion11">
		<h3><a href="#">Shasta</a></h3>
		<div>
			<!-- start of inset -->
				<div id="accordion" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS Enhanced Server (Shashta)%' AND c.active = '1' ORDER BY codeline_name DESC";
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
				." WHERE t.type_name LIKE '%MVS Enhanced Server (Tahoe)%' AND c.active = '1' ORDER BY codeline_name DESC";
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
				." WHERE t.type_name LIKE '%MVS Enhanced Server (Yosemite)%' AND c.active = '1' ORDER BY codeline_name DESC";
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

	<div id="accordion_adc_client">
		<h3><a href="#">MVS Standard Server</a></h3>
		<!-- start of ADC - MVS Standard Client -->
		<div>

				<div id="accordion21" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS Standard Server%' AND c.active = '1' ORDER BY codeline_name DESC";
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

	<div id="accordion_enhanced_client">
		<h3><a href="#">MVS Enhanced Server</a></h3>
		<!-- start of MVS Enhanced Client -->
		<div>
				<div id="accordion31" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS Enhanced Server%' "
				. " AND t.type_name NOT LIKE '%MVS Enhanced Server (Shasta)%' "
				. " AND t.type_name NOT LIKE '%MVS Enhanced Server (Tahoe)%' "
				. " AND t.type_name NOT LIKE '%MVS Enhanced Server (Yosemite)%' "
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


	<div id="accordion_smb_client">
		<h3><a href="#">MVS Small Business Server</a></h3>
		<!-- start of MVS Small Business Client -->
		<div>
				<div id="accordion41" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS SB Server%' "
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
	<div id="accordion_ascendant">
		<h3><a href="#">Ascendant MVS Server</a></h3>
		<!-- start of MVS Small Business Client -->
		<div>
				<div id="accordion41" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%Ascendant MVS Server%' "
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
	</div>

</div><!-- End demo -->


<div class="demo-description">


</div><!-- End demo-description -->


</body>

</html>
