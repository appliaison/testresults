<?

echo "This is a test of configuration";

require 'db.php';

$sql = "SELECT * FROM config WHERE config_id = 3";

$