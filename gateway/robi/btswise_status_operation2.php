<?php include('header.php');?>
<meta http-equiv="refresh" content="10">
<?php
$dbhost       = "localhost";
/******local*******/
//$dbuser = "root";
//$dbpass = "";

$dbuser = 'powertec_robi';
$dbpass = '2B%w(OyJEJVK'; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($conn, 'powertec_robi');

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysqli_error());
}
//mysqli_select_db('btsautomation');

$bts_id = $_GET['bts_id'];
/*$operations = $_GET['operations'];
if($operations){
	$bts_id = $_GET['bts_id'];
	$door = $_GET['door'];
	$generator = $_GET['generator'];
	$main = $_GET['main'];
	$aviation = $_GET['aviation'];
	$esc = $_GET['esc'];
	$others = $_GET['others'];

	$sql	=	"UPDATE `bts_status` SET `bts_id` = '$bts_id',`door` = '$door',`generator` = '$generator',`main` = '$main',`aviation` = '$aviation',`esc` = '$esc',`others` = '$others' WHERE bts_id ='". $bts_id. "'";
$insert = mysqli_query( $sql, $conn );
}
*/
//echo $bts_id;
$sql	=	"SELECT * FROM powertec_robi.bts_status WHERE bts_id ='". $bts_id. "'"; 
 
 $result = mysqli_query(  $conn, $sql ); 
$i=1; 
while($row = mysqli_fetch_array($result))
{											
	$class=$i%2;
	if($class==1)
		$class ='odd';
	else
		$class ='even';
		
	$bts_id = 		$bts_id;
	$door = 		$row['door'] ;
	$generator = 	$row['generator'] ;
	$main = 		$row['main'] ;
	$aviation = 	$row['aviation'] ;
	$esc = 			$row['esc'] ;
	$others = 		$row['others'] ;
				
$i++; 
}?>

	  <?php
		//echo $door. $generator. $main. $aviation. $esc. $others; exit; 

			if($door==1){
				$class1 ="on";
				$status1 = "On";
			}
			else{
				$class1 ="of";
				$status1 = "Off";
			}


			if($generator==1){
				$class2 ="on";
				$status2 = "On";
			}
			else{
				$class2 ="of";
				$status2 = "Off";
			}
			
			if($main==1){
				$class3 ="on";
				$status3 = "On";
			}
			else{
				$class3 ="of";
				$status3 = "Off";
			}
			if($aviation==1){
				$class4 ="on";
				$status4 = "On";
			}
			else{
				$class4 ="of";
				$status4 = "Off";
			}
			if($esc==1){
				$class5 ="on";
				$status5 = "On";
			}
			else{
				$class5 ="of";
				$status5 = "Off";
			}
			if($others==1){
				$class6 ="on";
				$status6 = "On";
			}
			else{
				$class6 ="of";
				$status6 = "Off";
			}				
		?>
		<style>
			.on{
					background-color:red;
					display: block;
					width: 110px;
					height: 45px;		
					padding: 1px;
					text-align: center;
					border-radius: 5px;
					color: white;
					font-weight: bold;
					float:left;
					cursor:pointer;
			}
			.of{
					background-color:green;
					display: block;
					width: 110px;
					height: 45px;			
					padding: 1px;
					text-align: center;
					border-radius: 5px;
					color: white;
					font-weight: bold;
					float:left;
					cursor:pointer;
			}
		table tr td{text-align:center;}
		</style>
	<div id="templatemo_header_pic">
	<div id="templatemo_slogan">We provide the best quality service for you.</div>

	</div>
<div id="templatemo_content">
	<div id="templatemo_top" style="min-height:500px;">
	<h1>BTS '<?php echo $bts_id?>' Status, Click to Operate</h1>
		<div style="width:650px; float:left">
			<table style="width:100%">
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
					<td>5</td>
					<td>6</td>
				</tr>
				<tr>
					<td><button class="<?php echo $class1;?>" onclick="window.location.href='only_operations.php?bts_id=<?php echo $bts_id?>&operations=1&door=<?php if($door==1) echo 0; else echo 1;?>&generator=<?php echo $generator?>&main=<?php echo $main?>&aviation=<?php echo $aviation?>&esc=<?php echo $esc?>&others=<?php echo $others?>'">Door <?php echo $status1;?></button></td>
					<td><button class="<?php echo $class2;?>" onclick="window.location.href='only_operations.php?bts_id=<?php echo $bts_id?>&operations=1&door=<?php echo $door; ?>&generator=<?php if($generator==1) echo 0; else echo 1;?>&main=<?php echo $main?>&aviation=<?php echo $aviation?>&esc=<?php echo $esc?>&others=<?php echo $others?>'">Generator <?php echo $status2;?></button></td>
					<td><button class="<?php echo $class3;?>" onclick="window.location.href='only_operations.php?bts_id=<?php echo $bts_id?>&operations=1&door=<?php echo $door;?>&generator=<?php echo $generator?>&main=<?php if($main==1) echo 0; else echo 1;?>&aviation=<?php echo $aviation?>&esc=<?php echo $esc?>&others=<?php echo $others?>'">Main <?php echo $status3;?></button></td>
					<td><button class="<?php echo $class4;?>" onclick="window.location.href='only_operations.php?bts_id=<?php echo $bts_id?>&operations=1&door=<?php echo $door;?>&generator=<?php echo $generator?>&main=<?php echo $main?>&aviation=<?php if($aviation==1) echo 0; else echo 1;?>&esc=<?php echo $esc?>&others=<?php echo $others?>'">Aviation <?php echo $status4;?></button></td>
					<td><button class="<?php echo $class5;?>" onclick="window.location.href='only_operations.php?bts_id=<?php echo $bts_id?>&operations=1&door=<?php echo $door;?>&generator=<?php echo $generator?>&main=<?php echo $main?>&aviation=<?php echo $aviation?>&esc=<?php if($esc==1) echo 0; else echo 1;?>&others=<?php echo $others?>'">ESC <?php echo $status5;?></button></td>
					<td><button class="<?php echo $class6;?>" onclick="window.location.href='only_operations.php?bts_id=<?php echo $bts_id?>&operations=1&door=<?php echo $door;?>&generator=<?php echo $generator?>&main=<?php echo $main?>&aviation=<?php echo $aviation?>&esc=<?php echo $esc?>&others=<?php if($others==1) echo 0; else echo 1;?>'">Others <?php echo $status6;?></button></td>
				</tr>
			</table>	

		</div>
	</div>
</div>
<?php include('footer.php');?>