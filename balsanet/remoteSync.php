<?php
header('Access-Control-Allow-Origin: *');
$dbhost="localhost";
$dbname="klubaner_desaApp";
$dbuser="klubaner_income";
$dbpass="incomeSemarang_*";

$dir = dirname(__FILE__) . '/sepakung_dump.sql';
exec("mysqldump --user={$dbuser} --password={$dbpass} --host={$dbhost} {$dbname} --result-file={$dir} 2>&1", $output);
echo "<a href='https://sepakung.klubaners.web.id/balsanet/sepakung_dump.sql'>Download</a>";
?>
