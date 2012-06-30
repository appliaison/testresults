<?php

require 'db.php';

$codeline_id = $_GET['codeline_id'];

$type_id = $_GET['type_id'];

$iteration = $_GET['iteration'];

$base = $iteration * 30;

$offset = $base + 30;

$sql = "SELECT DISTINCT e.bundle AS bundle, e.status AS status FROM email AS e"
. " WHERE codeline_id = $codeline_id  AND e.type_id = $type_id ORDER BY bundle DESC LIMIT 0, $offset ";

$rs = mysql_query($sql, $connect);
$counter = 0;
while ($fetch = mysql_fetch_assoc($rs))
{
	$counter++;
	$bundle = $fetch['bundle'];
	?>
	
	<div  id="<? echo "accord" . $counter; ?>"  class="accord">
	<h3><a href="#"><?php echo $fetch['bundle']; ?> 	
	<?
	if ($fetch['status']=='N')
	{
	echo "<img src='images/x.png' width='13px' title='rejected' alt='rejected'/>";
	
	}
	else
	{
	echo "<img src='images/tick.png' width='13px' title='accepted' alt='accepted'/>";
	}
	?></a></h3>
	<?
	
	$sql2 = "SELECT e.body_id AS body_id, e.mail_date AS mail_date, "
	. " e.mail_subjectline AS mail_subjectline, hh.handheld_id AS handheld_id, "
	. " h.handheld_name AS handheld_name, e.status AS status"
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
$iteration++;
?>
<div class="accord2">	
<!-- start of more -->
<h3><a onclick="populate_bundles_generic('<?=$codeline_id?>', '<?=$type_id?>', <?=$iteration?>)">
more
</a> </h3>

<!-- end of more -->	
</div>