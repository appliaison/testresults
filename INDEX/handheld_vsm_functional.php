<div id="returned_value"></div>
<?
$accepted = num_accepted_for_this_typeid_exact(375);

$rejected = num_rejected_for_this_typeid_exact(375);	
	
?>	

<!-- start of stats bar -->
<div class="demo">
<div id="accordionstats" style="font-size:13px";>
<h3><a href="#"><?


echo "Handheld : VSM Functional (by codeline)  ";
echo "<img src='images/tick.png' width='13px' title='total number accepted' alt='accepted' />";
echo  $accepted;
echo "&nbsp;&nbsp;&nbsp;&nbsp;";

echo "<img src='images/x.png' width='13px' title='total number rejected' alt='rejected'/>";
echo $rejected;

echo "<br />";
?></a>
</h3>

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
    ." WHERE t.type_id = 375 AND c.active = '1' ORDER BY codeline_name DESC";
	$rs = mysql_query($sql, $connect);

	while ($fetch = mysql_fetch_assoc($rs))
	{
	
	
	$codeline_id = $fetch['codeline_id'];
	$type_id = $fetch['type_id'];

	$accepted = num_accepted_for_this_codeline_and_typename($codeline_id, "VSM Functional");
	$rejected = num_rejected_for_this_codeline_and_typename($codeline_id, "VSM Functional");
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
