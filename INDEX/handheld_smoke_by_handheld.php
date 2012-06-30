<div id="returned_value"></div>
<?
$acceptedx = num_accepted_for_this_typename("Handheld");

$rejectedx = num_rejected_for_this_typename("Handheld");	
	
?>	

<!-- start of stats bar -->
<div class="demo">
<div id="accordionstats" style="font-size:13px";>
<h3><a href="#"><?


echo "Handheld : Smoke(by handheld)   ";
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
	$list_of_handhelds = return_list_of_handhelds();
	
	sort($list_of_handhelds);
	
	foreach ($list_of_handhelds as $handheld_name)
	{
		if (strlen($handheld_name) > 1)
		{
		$sql = "SELECT * FROM handheld WHERE handheld_name = '$handheld_name' ";
		$rs = mysql_query($sql, $connect);
		$fetch = mysql_fetch_assoc($rs);
		$handheld_id = $fetch['handheld_id'];
		
		$accepted = num_accepted_for_this_handheld_id_exact($handheld_id);
		$rejected = num_rejected_for_this_handheld_id_exact($handheld_id);
		
		?>
		<h3><a onclick="populate_handheld_handheld_bundles('<?=$handheld_id?>')"><?=$handheld_name?>
		<img src='images/tick.png' width='13px' title='accepted' alt='accepted'/><?=$accepted?>
		<img src='images/x.png' width='13px' title='accepted' alt='accepted'/><?=$rejected?>
		</a></h3>

		<div id="accordion<?=$handheld_id?>_return"> </div>		
		<?
		}
	}
	?>

	
</div>

<?
function num_accepted_for_this_handheld_id_exact($handheld_id)
{
	require 'db.php';
	// start of accept-reject

		$sqltotal = "SELECT COUNT(*) AS total"
	. " FROM email AS e "
	. " LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id "
	. " LEFT JOIN handheld AS h ON h.handheld_id = hh.handheld_id "
	. " WHERE h.handheld_id = $handheld_id AND e.active = 1 ";
	

	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	$sqlrejected = "SELECT COUNT(*) AS rejected"
	. " FROM email AS e "
	. " LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id "
	. " LEFT JOIN handheld AS h ON h.handheld_id = hh.handheld_id "
	. " WHERE h.handheld_id = $handheld_id "
	. " AND e.active = 1 AND e.status = 'N' ";
	
	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	$rejected = $fetchrejected['rejected'];	

	return $accepted = $total - $rejected;
	// end of accept-reject
	

}

function num_rejected_for_this_handheld_id_exact($handheld_id)
{
	require 'db.php';
	
	$sqlrejected = "SELECT COUNT(*) AS rejected"
	. " FROM email AS e "
	. " LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id "
	. " LEFT JOIN handheld AS h ON h.handheld_id = hh.handheld_id "
	. " WHERE  h.handheld_id = $handheld_id "
	. " AND e.active = 1 AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	
	return $rejected = $fetchrejected['rejected'];	
	// end of accept-reject
}



function return_list_of_handhelds()
{

	require 'db.php';
	$list_of_handhelds = array();
	$sql1 = "SELECT * FROM type WHERE type_name = 'Handheld'";
	
	$rs1 = mysql_query($sql1, $connect);
	
	$fetch1 = mysql_fetch_assoc ($rs1);
	
	$type_id = $fetch1['type_id'];
	
	
	
	$sql2 = "SELECT * FROM codeline WHERE type_id = $type_id AND active = 1";
	
	$rs2 = mysql_query($sql2, $connect);
	
	
	
	while ($fetch2 = mysql_fetch_assoc ($rs2))
	{
		$codelines[] = $fetch2['codeline_id'];
	}
		
	
	
	
	$sql3 = "SELECT * FROM email WHERE (1=0) ";
	
	foreach ($codelines as $codeline_id)
	{
	
		$sql3 .= " OR codeline_id = $codeline_id ";
		
	}

	$rs3 = mysql_query($sql3, $connect);
	
	while ($fetch3 = mysql_fetch_assoc($rs3))
	{
		$mailids[] = $fetch3['mail_id'];
	}
	
	$sql4 = "SELECT DISTINCT handheld_id FROM hh_link WHERE (1=0) ";
	


	foreach ($mailids as $mail_id)
	{
		$sql4 .= " OR mail_id = $mail_id ";
	}
	
	$sql4 .= " ORDER BY mail_id DESC";
	
	$rs4 = mysql_query($sql4, $connect);
	
	while ($fetch4 = mysql_fetch_assoc($rs4))
	{
	
		$handheldids[] = $fetch4['handheld_id'];
	}
	
	
	foreach ($handheldids as $handheld_id)
	{
		// first check if this handheld has an alias
		
		$sql5 = "SELECT handheld_id_alias FROM handheld WHERE handheld_id = $handheld_id AND active = 1 ";
		$rs5 = mysql_query($sql5, $connect);
		$fetch5 = mysql_fetch_assoc($rs5);
		$length = strlen($fetch5['handheld_id_alias']);
		
		if ($length)
		{
			$sql6 = " SELECT DISTINCT h2.handheld_name AS handheld_name FROM handheld AS h1 LEFT JOIN handheld AS h2 ON h1.handheld_id_alias = h2. handheld_id WHERE h1.handheld_id = $handheld_id AND h2.active = 1 ORDER BY handheld_name ASC";
		}
		else
		{
		
			$sql6 = "SELECT DISTINCT handheld_name, active FROM handheld WHERE handheld_id = $handheld_id AND active = 1 ORDER BY handheld_name ASC";
		}

		
		$rs6 = mysql_query($sql6, $connect);
		$num_results = mysql_num_rows($rs6);
		if ($num_results)
		{
			$fetch6 = mysql_fetch_assoc($rs6);
			$list_of_handhelds[] = $fetch6['handheld_name'];
		}
	
	}

return $list_of_handhelds;
}

?>


</div><!-- End demo -->



<div class="demo-description">


</div><!-- End demo-description -->


</body>

</html>
