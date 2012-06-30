<div id="returned_value"></div>
<?
$accepted = num_accepted_for_this_typename_exact("Handheld");

$rejected = num_rejected_for_this_typename_exact("Handheld");	
	
?>	

<!-- start of stats bar -->
<div class="demo">
<div id="accordionstats" style="font-size:13px";>
<h3><a href="#"><?


echo "Handheld : Smoke (by codeline)  ";
echo "<img src='images/tick.png' width='13px' title='total number accepted' alt='accepted' />";
echo  $accepted;
echo "&nbsp;&nbsp;&nbsp;&nbsp;";

echo "<img src='images/x.png' width='13px' title='total number rejected' alt='rejected'/>";
echo $rejected;

echo "<br />";
?></a>
</h3>
<!-- start of jump to -->
	
		<table>
		<tr align="top">
		<td>
		<label for="selectorA">Codeline:</label>
		<? 
		require 'db.php';
		$sqlselectorA = "SELECT * FROM codeline WHERE type_id = 117 AND active = 1";
		$rsselectorA = mysql_query($sqlselectorA, $connect);
		echo '<select name="selectorA" id="selectorA">';
		while ($fetcha = mysql_fetch_assoc($rsselectorA))
		{
			?>
			
				<option value="<?=$fetcha['codeline_id']?>"><?=$fetcha['codeline_name']?></option>

			<?
		}
		echo '</select>';
		?>
		</td>
		</tr>
		<tr>
		<td>
		
		<label for="selectorB">Bundle:</label>
		<input name="selectorB" id="selectorB" type="text" size="5"/>
		
		</td>
		</tr>
		<tr>
		<td>
		</td>
		</tr>
		<tr>
		<td>
		<a href="#" id="button" class="ui-state-default ui-corner-all">Find</a>
		<a href="#" id="button2" class="ui-state-default ui-corner-all">Close</a>
		</td>
		</tr>
		<tr>
		<td>
		</td>
		</tr>
		<tr>
		<td>
		<div class="toggler">
		<div id="effect" class="ui-widget-content ui-corner-all">
		Please select a codeline and bundle in the drop downs above to retrieve Smoke testresults. Alternatively, you can click through the codelines below to find what you need.	
		</div>
		</td>
		</tr>
	</table>
	
	</div>


<!-- end of jump to -->
</div>
</div>
<!-- end of stats bar -->

<div class="demo">

<div id="accordion" class="accord">

	<?
	$iteration = 0;
	require 'db.php';
	$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id, t.type_id AS type_id FROM codeline AS c "
	. " LEFT JOIN type AS t ON c.type_id = t.type_id "
    ." WHERE t.type_name = 'Handheld' AND c.active = '1' ORDER BY codeline_name DESC";
	$rs = mysql_query($sql, $connect);

	while ($fetch = mysql_fetch_assoc($rs))
	{
	
	
	$codeline_id = $fetch['codeline_id'];
	$type_id = $fetch['type_id'];

	$accepted = num_accepted_for_this_codeline_and_typename($codeline_id, "Handheld");
	$rejected = num_rejected_for_this_codeline_and_typename($codeline_id, "Handheld");
	?>
	<h3>
	<a onclick="populate_bundles_generic('<?=$codeline_id?>', '<?=$type_id?>', <?=$iteration?> )"><?=$fetch['codeline_name']?> 
	
	<!-- start of accept-reject -->
	
	<img src='images/tick.png' width='13px' title='number accepted' alt='accepted'/><?=$accepted?>
	<? echo "&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
	<img src='images/x.png' width='13px' title='number rejected' alt='rejected'/><?=$rejected?>
	<!-- end of accept-reject -->
	</a>
	</h3>

	<div id="accordion<?=$codeline_id?>_return"> </div>
	
	<?
	}
	?>

	
</div>

</div><!-- End demo -->



<div class="demo-description">


</div><!-- End demo-description -->


</body>

</html>
