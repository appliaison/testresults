<?

echo "this is dbtest";

$connect  = mysql_connect('localhost', 'testuser', 'f00b4r');

$select = mysql_select_db('gosmoketest');

$sql = "SELECT * FROM user ";

$rs = mysql_query($sql, $connect);

while ($fetch = mysql_fetch_assoc($rs))
{
	echo $fetch['username'];
	
}