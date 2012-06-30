<?

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
				$sql6 = "SELECT h2.handheld_id, h2.handheld_name FROM handheld AS h1 LEFT JOIN handheld AS h2 ON h1.handheld_id_alias = h2. handheld_id WHERE h1.handheld_id = $handheld_id AND h2.active = 1 ORDER BY handheld_name ASC";
			}
			else
			{
			
				$sql6 = "SELECT handheld_id, handheld_name, active FROM handheld WHERE handheld_id = $handheld_id AND active = 1 ORDER BY handheld_name ASC";
			}

			
			$rs6 = mysql_query($sql6, $connect);
			$num_results = mysql_num_rows($rs6);
			if ($num_results)
			{
				$fetch6 = mysql_fetch_assoc($rs6);
				$list_of_handhelds[] = $fetch6['handheld_name'];
			}
		
		}
		
echo "<pre>";
print_r($list_of_handhelds);
echo "</pre>";

sort($list_of_handhelds);
echo "<br />";

echo "<pre>";
print_r($list_of_handhelds);
echo "</pre>";
/*
foreach ($list_of_handhelds as $handheld_id)
	{
	$sql = "SELECT * FROM handheld WHERE handheld_id = $handheld_id ";
	$rs = mysql_query($sql, $connect);
	$fetch = mysql_fetch_assoc($rs);
	echo $handheld_name = $fetch['handheld_name'] . "<br />";
	
	}
*/
	?>
