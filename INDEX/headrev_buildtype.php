<div id="returned_value"></div>
<?
$acceptedx = num_accepted_for_this_typename("headrev");

$rejectedx = num_rejected_for_this_typename("headrev");	
	
?>	

<!-- start of stats bar -->
<div class="demo">
<div id="accordionstats" style="font-size:13px";>
<h3><a href="#"><?


echo "Headrev(buildtype)   ";
echo "<img src='images/tick.png' width='13px' title='accepted' alt='accepted'/>";
echo  $acceptedx;
echo "&nbsp;&nbsp;&nbsp;&nbsp;";

echo "<img src='images/x.png' width='13px' title='rejected' alt='rejected'/>";
echo $rejectedx;

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
	$sql = "SELECT t.active, c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
	. " LEFT JOIN type AS t ON c.type_id = t.type_id "
    ." WHERE t.type_name LIKE '%headrev%' AND c.active = '1' AND t.active = 1 ORDER BY codeline_name DESC";
	$rs = mysql_query($sql, $connect);
	
	
	while ($fetch = mysql_fetch_assoc($rs))
	{
	$codeline_id = $fetch['codeline_id'];
	?>
	<h3><a onclick="populate_headrev_buildtype_bundles('<?=$codeline_id?>')"><?=$fetch['codeline_name']?></a></h3>

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
