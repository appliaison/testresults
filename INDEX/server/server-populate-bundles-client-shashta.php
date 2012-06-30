<?php

require 'db.php';

$codeline_id = $_GET['codeline_id'];



$sql = "SELECT DISTINCT bundle FROM email WHERE codeline_id = $codeline_id  ORDER BY bundle DESC LIMIT 0, 30";

$rs = mysql_query($sql, $connect);
$counter = 0;
while ($fetch = mysql_fetch_assoc($rs))
{
	$counter++;
	$bundle = $fetch['bundle'];
	?>
	
	<div  id="<? echo "accord" . $counter; ?>"  class="accord">
	<h3><a href="#"><?php echo $fetch['bundle']; ?></a></h3>
	<?
	
	$sql2 = "SELECT e.body_id AS body_id, e.mail_date AS mail_date, "
	. " e.mail_subjectline AS mail_subjectline, hh.handheld_id AS handheld_id, "
	. " h.handheld_name AS handheld_name"
    . " FROM email AS e "
	. " LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id "
	. " LEFT JOIN handheld AS h ON h.handheld_id = hh.handheld_id "
	. " WHERE e.codeline_id = $codeline_id AND e.bundle = $bundle ORDER BY e.mail_id";

	
	$rs2 = mysql_query($sql2, $connect);
	$counter2 = 0;
	

	$counter2 ++;
	?>
			<div class="accord2">
			<?
			while ($fetch2 = mysql_fetch_assoc($rs2))
			{
			?>
			<!-- start of mails for this bundle -->
			<h3><a href="#"><?=$fetch2['mail_subjectline']?></a></h3>
			<div>
				<p><?=$fetch2['handheld_name']?>
				
				</p>
				<p>
				<a target="_blank" href ="mail.php?body_id=<?=$fetch2['body_id']?>" ><img src="email.png" border="0" /></a>
				</p>
				 <? echo $fetch2['mail_date']; ?>
			</div>
			<!-- end of mails for this bundle -->
			<?
			}
			?>
		
			
			</div>
		
		
	</div>
	<?php
	
	
}
?>
