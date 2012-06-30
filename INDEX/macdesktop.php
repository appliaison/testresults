<div id="returned_value"></div>
<?
$accepted = num_accepted_for_this_typename_return_inactives("MAC Desktop");

$rejected = num_rejected_for_this_typename_return_inactives("MAC Desktop");	
	
?>	

<!-- start of stats bar -->
<div class="demo">
<div id="accordionstats" style="font-size:13px";>
<h3><a href="#"><?


echo "MAC Desktop   ";
echo "<img src='images/tick.png' width='13px' title='accepted' alt='accepted'/>";
echo  $accepted;
echo "&nbsp;&nbsp;&nbsp;&nbsp;";

echo "<img src='images/x.png' width='13px' title='rejected' alt='rejected'/>";
echo $rejected;

echo "<br />";
?></a>
</h3>
<div>

</div>
</div>
</div>
<!-- end of stats bar -->
<div class="demo">

<div id="accordion" class="accord">

	<?
	require 'db.php';
	$sql = "SELECT c.codeline_name AS codeline_name, c.codeline_id AS codeline_id, t.type_id AS type_id FROM codeline AS c "
	. " LEFT JOIN type AS t ON c.type_id = t.type_id "
    ." WHERE t.type_name LIKE '%MAC Desktop%' AND c.active = '1' ORDER BY codeline_name DESC";
	$rs = mysql_query($sql, $connect);
	
	
	while ($fetch = mysql_fetch_assoc($rs))
	{
	$codeline_id = $fetch['codeline_id'];
	$type_id = $fetch['type_id'];
	$accepted = num_accepted_for_this_codeline_and_typename_return_inactives($codeline_id, "MAC Desktop");
	$rejected = num_rejected_for_this_codeline_and_typename_return_inactives($codeline_id, "MAC Desktop");
	?>
	<h3><a onclick="populate_bundles_generic_unbounded('<?=$codeline_id?>', <?=$type_id?>)"><?=$fetch['codeline_name']?>
	<!-- start of accept-reject -->
	<img src='images/tick.png' width='13px' title='accepted' alt='accepted'/><?=$accepted?>
	<? echo "&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
	<img src='images/x.png' width='13px' title='accepted' alt='accepted'/><?=$rejected?>
	<!-- end of accept-reject -->
	
	</a></h3>

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
