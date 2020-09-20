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

$bts_id = $_GET['i'];
$card_number = $_GET['c'];

if($bts_id){
	$bts_id = $bts_id;
	$sql	=	"SELECT * FROM bts_status WHERE bts_id ='". $bts_id. "'";  
	$result = mysql_query( $sql, $conn ); 
	while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{											
		//$door = 		$row['door'] ;
		$generator = 	$row['generator'] ;
		$main = 		$row['main'] ;
		$aviation = 	$row['aviation'] ;
		$esc = 			$row['esc'] ;
		$others = 		$row['others'] ;
	}
	$door = 1;
	$card_number = $card_number;
	//echo $bts_id.'-'.$door.'-'.$generator.'-'.$main.'-'.$aviation.'-'.$esc.'-'.$others; exit;
	$sql	=	"UPDATE `bts_status` SET `door` = '$door' WHERE bts_id ='". $bts_id. "'";
	$update = mysql_query( $sql, $conn );
	//--------------------log entry--------------//
	
	$sql2	=	"INSERT INTO bts_event_log(`bts_id`,`door`,`generator`,`main`,`aviation`,`esc`,`others`,`card_number`) VALUES ('$bts_id','$door','$generator','$main','$aviation','$esc','$others','$card_number') ";
	$result = mysql_query( $sql2, $conn );
	if($result){
					echo "1";
					}}?>