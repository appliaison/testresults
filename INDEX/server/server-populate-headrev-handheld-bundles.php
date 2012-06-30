<?php

require 'db.php';

$handheld_id = $_GET['handheld_id'];
?>
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
	<h3><a onchange="populate_headrev_buildtype_bundles('<?$codeline_id?>')"><?=$fetch['codeline_name']?></a></h3>
	
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
			<h3><a href="#"><?=$fetch2['mail_subjectline']?></a></h3>
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
	?>

	
</div>
<?
$sql = "SELECT e.mail_id AS mail_id , e.mail_subjectline AS mail_subjectline"
. " FROM email AS e LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id WHERE hh.handheld_id = $handheld_id ";

$rs = mysql_query($sql, $connect);

$fetch = mysql_fetch_assoc($rs);

$mail_subjectline = $fetch['mail_subjectline'];



