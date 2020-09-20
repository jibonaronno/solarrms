<?php include('header.php');?>
<?php include('db.php');
$domain="http://localhost/robi/";
//$domain="http://nervoustech.com:8090/gateway/robi/";
?>

    <div id="templatemo_header_pic">
      <div id="templatemo_slogan">We provide the best quality service for you.</div>
     
    </div>
    
  <div id="templatemo_content">
    <div id="templatemo_top" style="min-height:500px;">
      <h1>Welcome to the ROBI BTS Automation System</h1>
      <p>Please select the site for operations </p>
		<table border="1"  style="width:100%; border-collapse:collapse">
		<tr>
		<th>SL</th>
		<th>BTS ID</th>
		<th>BTS Log</th>
		<th>BTS Images</th>
		<th>Area</th>
		<th>Division</th>
		<th>District</th>
		<!--<th>Success</th>-->					
		</tr>

		<?php 
		
		$sql = 'SELECT * FROM bts_information';
		$result = mysqli_query(  $conn, $sql );
		//echo nl2br("SL  Card No     Time      Success\n");


		$i=1;


		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{

		$class=$i%2;
		if($class==1)
		$class ='odd';
		else
		$class ='even';
		?>
		<tr class="<?php echo $class;?>">
		<td><?php echo $i; ?></td>											
		<td><?php echo $row['bts_name'] ; ?></td>
		<td><a href="btswise_status_operation.php?bts_id=<?php echo $row['bts_id'] ; ?>"><?php echo $row['bts_id'] ; ?></a></td>
		<td><a href="btswise_images_1.php?bts_id=<?php echo $row['bts_id'] ; ?>"><?php echo $row['bts_id'] ; ?></a></td>
		<td><?php echo $row['area'] ; ?></td>													
		<td><?php echo $row['division'] ; ?></td>													
		<td><?php echo $row['district'] ; ?></td>													
		</tr>

		<?php 
		$i++; 
		}?>
		</table>	
    </div>
  </div>

<?php include('footer.php');?>