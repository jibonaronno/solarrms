<?php
$dbhost = 'localhost';

$dbuser = 'root';
$dbpass = 'redhat07'; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($conn,'powertec_robi');

//$dbuser = 'powertec_robi';
//$dbpass = '2B%w(OyJEJVK'; 
//$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($conn, 'powertec_robi');

if(! $conn )
{
  die('Could not connect: ' . mysqli_error());
}

?>