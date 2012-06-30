<?

require 'db.php';

$sql = "SELECT e.mail_id AS mail_id, e.mail_subjectline AS mail_subjectline, "
. " e.mail_reduced_subject AS mail_reduced_subject, e.body_id AS body_id "
. " FROM email AS e ORDER BY  mail_id DESC LIMIT 0, 1";

$rs = mysql_query($sql, $connect);

	while ($fetch = mysql_fetch_assoc($rs))
	{
		$mail_id = $fetch['mail_id'];

		$mail_subjectline = $fetch['mail_subjectline'];

		$mail_reduced_subject = $fetch['mail_reduced_subject'];

		$body_id = $fetch['body_id'];
		
		?>
		<li>
		<a href="mail.php?body_id=<?=$body_id?>" title="View this email"><img width="70" src="images/8.png" title="" /></a>
		<h5><a href="mail.php?body_id=<?=$body_id?>" title="View this email"><?=$mail_reduced_subject?></a></h5>
		<p class="info">Nov 29th 2008 by <a href="mail.php?body_id=<?=$body_id?>" title="View this email">
		<?=$mail_subjectline?></a></p>
		<p class="tags"><a href="#" title='Accepted'>Accepted</a> <a href="#" title='Parsed'>Parsed</a></p>
		<p class="tags"></p>
		</li>
		<?
	}

