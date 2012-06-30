<div id="filter"></div>
<div id="historybox">

</div>

<br/>
<br/>
<br/>
<br/>

<div id="returned_value"></div>

<div class="demo">

<div id="accordion" class="accord">

	<?
	require 'db.php';
	$sql = "SELECT t.active, c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
	. " LEFT JOIN type AS t ON c.type_id = t.type_id "
    ." WHERE t.type_name LIKE '%MDS%' AND c.active = '1' AND t.active = 1 ORDER BY codeline_name DESC";
	$rs = mysql_query($sql, $connect);
	
	
	while ($fetch = mysql_fetch_assoc($rs))
	{
	$codeline_id = $fetch['codeline_id'];
	?>
	<h3><a onclick="populate_mds_bundles('<?=$codeline_id?>')"><?=$fetch['codeline_name']?></a></h3>

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
