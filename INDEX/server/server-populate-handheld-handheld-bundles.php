<?php

require 'db.php';

$handheld_id = $_GET['handheld_id'];
?>
<div id="accordion" class="accord">

	<?
	require 'db.php';
	
	$sqlcount = "SELECT t.active, c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
	. " LEFT JOIN type AS t ON c.type_id = t.type_id "
    ." WHERE t.type_name = 'Handheld' AND c.active = '1' AND t.active = 1 ORDER BY codeline_name DESC";
	

	

	
		$sql = "SELECT t.active, c.codeline_name AS codeline_name, c.codeline_id AS codeline_id FROM codeline AS c "
		. " LEFT JOIN type AS t ON c.type_id = t.type_id "
		." WHERE t.type_name = 'Handheld' AND c.active = '1' AND t.active = 1 ORDER BY codeline_name DESC";
		$rs = mysql_query($sql, $connect);
		
		
		while ($fetch = mysql_fetch_assoc($rs))
		{
		$codeline_id = $fetch['codeline_id'];
		
		// here - we need to find the number of emails in this codeline
		
		$sql2count = "SELECT COUNT(*) AS emailcount"
		. " FROM email AS e "
		. " LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id "
		. " LEFT JOIN handheld AS h ON h.handheld_id = hh.handheld_id "
		. " WHERE e.codeline_id = $codeline_id  AND h.handheld_id = $handheld_id ORDER BY e.mail_id";

		$rs2count = mysql_query($sql2count, $connect);
		
		$fetch2count  = mysql_fetch_assoc($rs2count);

	    $count = $fetch2count['emailcount'];
		
			if ($count)
			{
			$accepted = num_accepted_for_this_codeline_and_handheld_id_exact($codeline_id, $handheld_id);
			$rejected = num_rejected_for_this_codeline_and_handheld_id_exact($codeline_id, $handheld_id);
			
			
			?>
				<h3><a><?=$fetch['codeline_name']?>
				<img src='images/tick.png' width='13px' title='accepted' alt='accepted'/><?=$accepted?>
				<img src='images/x.png' width='13px' title='accepted' alt='accepted'/><?=$rejected?>
				</a>
				</h3>
			
				<!-- start of inset -->
				<div class="accord2" id="accordion<?=$codeline_id?>_return"> 
				<?
				$sql2 = "SELECT e.body_id AS body_id, e.mail_date AS mail_date, "
				. " e.mail_subjectline AS mail_subjectline, hh.handheld_id AS handheld_id, "
				. " h.handheld_name AS handheld_name"
				. " FROM email AS e "
				. " LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id "
				. " LEFT JOIN handheld AS h ON h.handheld_id = hh.handheld_id "
				. " WHERE e.codeline_id = $codeline_id  AND h.handheld_id = $handheld_id ORDER BY e.mail_id";

				$rs2 = mysql_query($sql2, $connect);
				while ($fetch2 = mysql_fetch_assoc($rs2))
				{
				?>
				<h3><a href="#"><?=$fetch2['mail_subjectline']?></a>
				
				</h3>
				<div>
					<p><? echo $fetch2['handheld_name']; ?></p>
					<p>
					<a target="_blank" href ="mail.php?body_id=<?=$fetch2['body_id']?>" ><img src="email.png" border="0" /></a>
					</p>
					 <? echo $fetch2['mail_date']; ?>
				</div>
				<?
				}
				?>

				</div>
				<!-- end of inset -->
					
			<?
			}
		}
	
	?>

	
</div>
<?
function num_accepted_for_this_codeline_and_handheld_id_exact($codeline_id, $handheld_id)
{
	require 'db.php';
	// start of accept-reject

		$sqltotal = "SELECT COUNT(*) AS total"
	. " FROM email AS e "
	. " LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id "
	. " LEFT JOIN handheld AS h ON h.handheld_id = hh.handheld_id "
	. " WHERE e.codeline_id = $codeline_id  AND h.handheld_id = $handheld_id";
	

	$rstotal = mysql_query($sqltotal, $connect);

	$fetchtotal = mysql_fetch_assoc($rstotal);	

	$total = $fetchtotal['total'];

	$sqlrejected = "SELECT COUNT(*) AS rejected"
	. " FROM email AS e "
	. " LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id "
	. " LEFT JOIN handheld AS h ON h.handheld_id = hh.handheld_id "
	. " WHERE e.codeline_id = $codeline_id  AND h.handheld_id = $handheld_id "
	. " AND e.active = 1 AND e.status = 'N' ";
	
	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	$rejected = $fetchrejected['rejected'];	

	return $accepted = $total - $rejected;
	// end of accept-reject
	

}

function num_rejected_for_this_codeline_and_handheld_id_exact($codeline_id, $handheld_id)
{
	require 'db.php';
	
	$sqlrejected = "SELECT COUNT(*) AS rejected"
	. " FROM email AS e "
	. " LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id "
	. " LEFT JOIN handheld AS h ON h.handheld_id = hh.handheld_id "
	. " WHERE e.codeline_id = $codeline_id  AND h.handheld_id = $handheld_id "
	. " AND e.active = 1 AND e.status = 'N' ";

	$rsrejected = mysql_query($sqlrejected, $connect);

	$fetchrejected = mysql_fetch_assoc($rsrejected);
	
	return $rejected = $fetchrejected['rejected'];	
	// end of accept-reject
}


?>



