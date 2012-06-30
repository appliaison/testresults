<script type="text/javascript">
	$(function() {
	$("#accordion").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		});
	
		$("#accordion_belwood").accordion({
			collapsible: true,
			active: false,
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
			active: false,
			autoHeight: false
			
		});
		
		$("#accordion21").accordion({
			collapsible: true,
			active: false,
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
		$("#accordion_enhanced").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});
		$("#accordion31").accordion({
			collapsible: true,
			active: true,
			autoHeight: false
		
		});
		$("#accordion_smb").accordion({
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
<div id="returned_value"></div>
<?

$acceptedx = num_accepted_for_this_typename_return_inactives("MVS Standard Client") + 
num_accepted_for_this_typename_return_inactives("MVS Enhanced Client") +
num_accepted_for_this_typename_return_inactives("MVS SB Client");


$rejectedx = num_rejected_for_this_typename_return_inactives("MVS Standard Client") +
num_rejected_for_this_typename_return_inactives("MVS Enhanced Client") +
num_rejected_for_this_typename_return_inactives("MVS SB Client");		
	
?>	

<!-- start of stats bar -->
<div class="demo">
<div id="accordionstats" style="font-size:13px";>
<h3><a href="#">
<?


echo "MVS Client   ";
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
				." WHERE t.type_name LIKE '%MVS Enhanced Client (Shasta)%' AND c.active = '1' ORDER BY codeline_name DESC";
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

	<div id="accordion_adc_client">
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

	<div id="accordion_enhanced">
		<h3><a href="#">Enhanced Client</a></h3>
		<!-- start of MVS Enhanced Client -->
		<div>
				<div id="accordion31" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS Enhanced Client%' "
				. " AND t.type_name NOT LIKE '%MVS Enhanced Client (Shasta)%' "
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


	<div id="accordion_smb">
		<h3><a href="#">MVS Small Business Client</a></h3>
		<!-- start of MVS Small Business Client -->
		<div>
				<div id="accordion41" class="accord">
				<?
				
				$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
				. " LEFT JOIN type AS t ON c.type_id = t.type_id "
				." WHERE t.type_name LIKE '%MVS SB Client%' "
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


</div><!-- End demo -->


<div class="demo-description">


</div><!-- End demo-description -->


</body>

</html>
