<?php include('header.php');?>
    <div id="templatemo_header_pic">
      <div id="templatemo_slogan">We provide the best quality service for you.</div>
     
    </div>
    
  <div id="templatemo_content">
     <div id="templatemo_top" style="min-height:400px;">
      <h1>All BTS Event Log</h1>
      <p>
		<style>
			table tr td{padding:5px;}
			.odd{
				background-color:#E1FFFF;
			}
			.even{
				background-color:#C0E3FF;
			}
		</style>
		<div style="width:650px; float:left">
			<table border="1"  style="width:100%; border-collapse:collapse">
										<tr>
											<th>SL</th>
											<th>DC KWH</th>
											<th>DC In</th>
											<th>DC OUT</th>
											<th>PV1 Volt</th>
											<th>PV2 Volt</th>
											<th>Act Power</th>
											<th>Input Power</th>
											<th>A Voltage</th>
											<th>A Current</th>
											<th>B Voltage</th>
											<th>B Current</th>
											<th>C Voltage</th>
											<th>C Current</th>
											<th>Alarm 1</th>
											<th>Alarm 2</th>
											<th>Alarm 3</th>
											<th>Time</th>
										</tr>

						<?php 
						
						/*$data = file_get_contents('http://nervoustech.com:8090/gateway/pinlog.json');
						$decodedData = json_decode($data);
						//echo "My Data: ". $json_data["dckwhout"];
						
						$dckwh=array();
						$dcin=array();
						$dcout=array();
						$pv1volt=array();
						$pv2volt=array();
						$actpower=array();
						$inputpower=array();
						$avoltage=array();
						$acurrent=array();
						$bvoltage=array();
						$bcurrent=array();
						$cvoltage=array();
						$ccurrent=array();
						$alarm1=array();
						$alarm2=array();
						$alarm3=array();
						$datetime=array();
						
						foreach ($decodedData as $value) { 
							$dckwh[]=$value->dckwhout;
							$dcin[]=$value->dcinob;
							$dcout=$value->dcoutob;
							$pv1volt[]=$value->dcinob;
							$pv2volt=$value->dcoutob;
							$actpower[]=$value->dcinob;
							$avoltage=$value->dcoutob;
							$acurrent[]=$value->dcinob;
							$bvoltage=$value->dcoutob;
							$bcurrent[]=$value->dcinob;
							$cvoltage=$value->dcoutob;
							$ccurrent[]=$value->dcinob;
							$alarm1=$value->dcoutob;
							$alarm2=$value->dcoutob;
							$alarm3=$value->dcoutob;
							$datetime=$value->dtime;
							
						}
						echo sizeof($dckwh);
						print_r($dckwh);
						echo "<br>";
						echo sizeof($dcin);
						print_r($dcin);
						*/
						$dbhost       = "localhost";
						$dbuser = "root";
						$dbpass = "";
						
						
						//$dbuser = 'powertec_robi';
						//$dbpass = '2B%w(OyJEJVK'; 
						$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
						mysqli_select_db($conn,'powertec_robi');
						
						$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
						if(! $conn )
						{
						  die('Could not connect: ' . mysql_error());
						}
						$sql = 'SELECT * FROM powertec_robi.bts_event_log';
						$result = mysqli_query( $conn, $sql  );
						//echo nl2br("SL  Card No     Time      Success\n");
						$i=1;											
						while($row = mysqli_fetch_array($result))
						{										
											$class=$i%2;
											if($class==1)
												$class ='odd';
											else
												$class ='even';
											?>
											<tr class="<?php echo $class;?>">
											<td><?php echo $i; ?></td>											
											<td><?php if(!empty($row['card_number'])) {echo $row['card_number'];} else {echo $row['user_id'] ;} ?></td>
											<td><?php echo $row['bts_id'] ; ?></td>
											<td><?php echo status_text($row['door']);?></td>													
											<td><?php echo status_text($row['generator']) ; ?></td>													
											<td><?php echo status_text($row['main']) ; ?></td>													
											<td><?php echo status_text($row['aviation']) ; ?></td>													
											<td><?php echo status_text($row['esc']) ; ?></td>													
											<td><?php echo status_text($row['others']) ; ?></td>													
											<td><?php echo $row['modify_date'] ; ?></td>													
										</tr>
							
						<?php 
						$i++; 
						}?>
						</table>	

		</div>

	  </p>
    </div>
    <?php 
  function status_text($value){
	if($value==0)
		return "OFF";
	else
		Return "ON";
  }
  ?>
  </div>
<?php include('footer.php');?>