<?php
$dbhost       = "localhost";
/******local*******/
//$dbuser = "root";
//$dbpass = "";


$dbuser = 'powertec_robi';
$dbpass = '2B%w(OyJEJVK'; 
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('powertec_robi');

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
//mysql_select_db('btsautomation');

$bts_id = $_GET['bts_id'];

mysql_query(`SET CHARACTER SET utf8`);
        mysql_query("SET SESSION collation_connection =`utf8_general_ci`");
        
	
	$sql	=	"SELECT * FROM bts_status WHERE bts_id ='". $bts_id. "'"; 
 
 $result = mysql_query( $sql, $conn ); 
$i=1; 
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{											
	echo 's'.$row['door'].$row['generator'].$row['main'].$row['aviation'].$row['esc'].$row['others'].'e';
}
?>