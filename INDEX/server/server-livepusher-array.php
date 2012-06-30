<?

require 'db.php';

$number = $_GET['number'];


$sql = "SELECT e.mail_id AS mail_id, e.mail_subjectline AS mail_subjectline, "
. " e.mail_reduced_subject AS mail_reduced_subject, e.body_id AS body_id, e.mail_date AS mail_date, e.status AS status "
. " FROM email AS e ORDER BY  mail_date DESC LIMIT $number, 1";

$rs = mysql_query($sql, $connect);

	while ($fetch = mysql_fetch_assoc($rs))
	{
		$mail_id = $fetch['mail_id'];

		$mail_subjectline = $fetch['mail_subjectline'];

		$mail_reduced_subject = $fetch['mail_reduced_subject'];

		$body_id = $fetch['body_id'];
		
		$mail_date = $fetch['mail_date'];
		
		
		?>
		<li>
		<a target="_blank" href="mail.php?body_id=<?=$body_id?>" title="View this email"><img width="60" src="images/bbappworld.png" title="" /></a>
		<h5><a target="_blank" href="mail.php?body_id=<?=$body_id?>" title="View this email"><?=$mail_reduced_subject?></a></h5>
		<p class="info"><?=$mail_date?> : <a target="_blank" href="mail.php?body_id=<?=$body_id?>" title="View this email">
		<?=$mail_subjectline?></a></p>
		<p class="tags">
		<? if ($fetch['status'] == 'Y')
		{
		echo '<a target="_blank" href="mail.php?body_id=' . $body_id . '"' .  'title="Accepted">Accepted</a>';
		}
		else
		{
		echo '<a target="_blank" href="mail.php?body_id=' . $body_id . '"' .  'title="Rejected">Rejected</a>';
		}
		?>
		
		<p class="tags"></p>
		</li>
		<?
	}

