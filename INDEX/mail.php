<?

require 'db.php';

$body_id = $_GET['body_id'];



$sql = "SELECT b.mail_body AS mail_body, e.mail_subjectline AS mail_subjectline, e.mail_date AS mail_date, "
. " e.mail_sender AS mail_sender, e.mail_reduced_subject AS mail_reduced_subject " 
. " FROM email_body AS b LEFT JOIN email AS e ON b.body_id = e.body_id WHERE b.body_id = $body_id ";

$rs = mysql_query ($sql, $connect);

$fetch = mysql_fetch_assoc ($rs);

echo "Subject : " . $fetch['mail_subjectline'];
echo "<br />";
echo "Reduced Subject : " . $fetch['mail_reduced_subject'];
echo "<br />";
echo "Sender : " . $fetch['mail_sender'];
echo "<br />";
echo "Date : " . $fetch['mail_date'];
echo "<br />";
//echo $fetch['mail_body'];

$clean_mail_body = str_replace("%0a%20%20%20%20%20%20%20%20http:/", "http://", $fetch['mail_body']);

echo $clean_mail_body;

?>