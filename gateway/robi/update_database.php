<?php include('header.php');$bts_id=$_GET['bts_id'];?>
    <div id="templatemo_header_pic">
      <div id="templatemo_slogan">We provide the best quality service for you.</div>
     
    </div>
    
  <div id="templatemo_content">
     <div id="templatemo_top" style="min-height:400px;">
      <h1>BTS <?php echo $bts_id;?> Event Log</h1>
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
		<div style="width:850px; float:left">
			<table border="1"  style="width:100%; border-collapse:collapse">
										<tr>
											<th>SL</th>
											<th>C1-DCKWH</th>
											<th>C1-DC In</th>
											<th>C1-DC OUT</th>
											<th>C1-CUR</th>
											<th>C1-Watt</th>
											<th>C2-DCKWH</th>
											<th>C2-DC In</th>
											<th>C2-DC OUT</th>
											<th>C2-CUR</th>
											<th>C2-Watt</th>
											<th>C3-DCKWH</th>
											<th>C3-DC In</th>
											<th>C3-DC OUT</th>
											<th>C3-CUR</th>
											<th>C3-Watt</th>
											
											<th>PV1 Volt</th>
											<th>PV2 Volt</th>
											<th>Act Power</th>
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
						
						//$data = file_get_contents('http://nervoustech.com:8090/gateway/pinlog.json');
						$data = file_get_contents('http://103.110.113.54:8090/gateway/pinlog.json');
						$decodedData = json_decode($data,true);
						
						$device_id=array();
						$site_id=array();
						$imei=array();
						$ccid=array();
						$cellno=array();
						$c1dckwh=array();
						$c1dcin=array();
						$c1dcout=array();
						$c1cur=array();
						$c1watt=array();
						
						$c2dckwh=array();
						$c2dcin=array();
						$c2dcout=array();
						$c2cur=array();
						$c2watt=array();
						
						$c3dckwh=array();
						$c3dcin=array();
						$c3dcout=array();
						$c3cur=array();
						$c3watt=array();
						
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
						
						//echo sizeof($decodedData);
						
						for ($x = 0; $x < sizeof($decodedData); $x++) {
							$device_id[$x]=$decodedData[$x]["devid"];
							$site_id[$x]=$decodedData[$x]["siteid"];
							$imei[$x]=$decodedData[$x]["imei"];
							$ccid[$x]=$decodedData[$x]["ccid"];
							$cellno[$x]=$decodedData[$x]["cellno"];
							$c1dckwh[$x]=$decodedData[$x]["charger"][0]["dckwhout"];
							//echo $c1dckwh[$x]." ";
							$c1dcin[$x]=$decodedData[$x]["charger"][0]["dcinob"];
							$c1dcout[$x]=$decodedData[$x]["charger"][0]["dcoutob"];
							$c1cur[$x]=$decodedData[$x]["charger"][0]["current"];
							$c1watt[$x]=$decodedData[$x]["charger"][0]["watt"];
							
							
							$c2dckwh[$x]=$decodedData[$x]["charger"][1]["dckwhout"];
							$c2dcin[$x]=$decodedData[$x]["charger"][1]["dcinob"];
							$c2dcout[$x]=$decodedData[$x]["charger"][1]["dcoutob"];
							$c2cur[$x]=$decodedData[$x]["charger"][1]["current"];
							$c2watt[$x]=$decodedData[$x]["charger"][1]["watt"];
							
							
							$c3dckwh[$x]=$decodedData[$x]["charger"][2]["dckwhout"];
							$c3dcin[$x]=$decodedData[$x]["charger"][2]["dcinob"];
							$c3dcout[$x]=$decodedData[$x]["charger"][2]["dcoutob"];
							$c3cur[$x]=$decodedData[$x]["charger"][2]["current"];
							$c3watt[$x]=$decodedData[$x]["charger"][2]["watt"];
							
							
							
							$pv1volt[$x]=$decodedData[$x]["inverter"][0]["pv1volt"];
							//echo $pv1volt[$x]."<br>";
							$pv2volt[$x]=$decodedData[$x]["inverter"][0]["pv2volt"];
							//echo $pv2volt[$x]."<br>";
							$actpower[$x]=$decodedData[$x]["inverter"][0]["inpower"];
							//echo $actpower[$x]."<br>";
							$avoltage[$x]=$decodedData[$x]["inverter"][0]["avolt"];
							//echo $avoltage[$x]."<br>";
							$acurrent[$x]=$decodedData[$x]["inverter"][0]["acur"];
							//echo $acurrent[$x]."<br>";
							$bvoltage[$x]=$decodedData[$x]["inverter"][0]["bvolt"];
							$bcurrent[$x]=$decodedData[$x]["inverter"][0]["bcur"];
							$cvoltage[$x]=$decodedData[$x]["inverter"][0]["cvolt"];
							$ccurrent[$x]=$decodedData[$x]["inverter"][0]["ccur"];
							$alarm1[$x]=$decodedData[$x]["inverter"][0]["alarm1"];
							$alarm2[$x]=$decodedData[$x]["inverter"][0]["alarm2"];
							$alarm3[$x]=$decodedData[$x]["inverter"][0]["alarm3"];
							$datetime[$x]=$decodedData[$x]["dtime"];
						}
						
						$v=sizeof($decodedData);
						$i=$v-1;					
						$j=0;				
						//for ($x = 0; $x < sizeof($decodedData); $x++) {
							//echo $x."->>".$c1dcin[$x]." ".$c2dcin[$x]." ".$c3dcin[$x]." ".$datetime[$x]."<br>";
							
						//}
						
						echo $datetime[0]."<br>";
						
						$dbhost = "localhost";
						$dbuser = "root";
						$dbpass = "redhat07";
						
						$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
						mysqli_select_db($conn,'powertec_robi');
							
						
						$i=5;
						while($i >0 )
						{										
											$class=$i%2;
											if($class==1)
												$class ='odd';
											else
												$class ='even';
											?>
											<?php
											
											$avoltagetemp=number_format(floatval(((int)$avoltage[$i]/10)), 1);
											$acurrenttemp=number_format(floatval(((int)$acurrent[$i]/1000)), 2);
											
											$bvoltagetemp=number_format(floatval(((int)$bvoltage[$i]/10)), 1);
											$bcurrenttemp=number_format(floatval(((int)$bcurrent[$i]/1000)), 2);
											
											
											$cvoltagetemp=number_format(floatval(((int)$cvoltage[$i]/10)), 1);
											$ccurrenttemp=number_format(floatval(((int)$ccurrent[$i]/1000)), 2);
											
											$pv1volttemp=floatval((int)$pv1volt[$i]/10);
											$pv2volttemp=floatval((int)$pv2volt[$i]/10);
											
											?>
											
											<tr class="<?php echo $class;?>">
											<td><?php if($j==0){echo "Live";}else{echo $i;} ?></td>											
														
											<td><?php echo $c1dckwh[$i];?></td>
											<td><?php echo $c1dcin[$i];?></td>
											<td><?php echo $c1dcout[$i];?></td>	
											<td><?php echo $c1cur[$i];?></td>
											<td><?php echo $c1watt[$i];?></td>
											
																				
											<td><?php echo $c2dckwh[$i];?></td>
											<td><?php echo $c2dcin[$i];?></td>
											<td><?php echo $c2dcout[$i];?></td>	
											<td><?php echo $c2cur[$i];?></td>
											<td><?php echo $c2watt[$i];?></td>
											
																				
											<td><?php echo $c3dckwh[$i];?></td>
											<td><?php echo $c3dcin[$i];?></td>
											<td><?php echo $c3dcout[$i];?></td>	
											<td><?php echo $c3cur[$i];?></td>
											<td><?php echo $c3watt[$i];?></td>
											
											
											<td><?php echo $pv1volttemp;?></td>													
											<td><?php echo $pv2volttemp; ?></td>													
											<td><?php echo $actpower[$i];?></td>													
											<td><?php echo $avoltagetemp;?></td>													
											<td><?php echo $acurrenttemp;?></td>													
											<td><?php echo $bvoltagetemp;?></td>													
											<td><?php echo $bcurrenttemp;?></td>													
											<td><?php echo $cvoltagetemp;?></td>													
											<td><?php echo $ccurrenttemp;?></td>																									
											<td><?php echo $alarm1[$i] ;?></td>
											<td><?php echo $alarm2[$i] ;?></td>													
											<td><?php echo $alarm3[$i] ;?></td>	
											<td><?php echo $datetime[$i] ;?></td>												
										</tr>
										
										
						
							
						<?php 
						//$sql = "INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";
						$sql= "INSERT INTO `bts_data_log` ( `DEVICE-ID`, `SITE-ID`, `IMEI`, `CCID`, `CELLNO`, `C1-DCKWH`, `C1-DC-IN`, `C1-DC-OUT`, `C1-CUR`, `C1-WATT`, `C2-DCKWH`, `C2-DC-IN`, `C2-DC-OUT`, `C2-CUR`, `C2-WATT`, `C3-DCKWH`, `C3-DC-IN`, `C3-DC-OUT`, `C3-CUR`, `C3-WATT`, `PV1-VOLT`, `PV2-VOLT`, `ACT-POWER`, `A-VOLTAGE`, `A-CURRENT`, `B-VOLTAGE`, `B-CURRENT`, `C-VOLTAGE`, `C-CURRENT`, `ALARM-1`, `ALARM-2`, `ALARM-3`, `SITE-TIME`) 
						VALUES ( '$device_id[$i]', '$site_id[$i]', '$imei[$i]', '$ccid[$i]', '$cellno[$i]', '$c1dckwh[$i]', '$c1dcin[$i]', '$c1dcout[$i]', '$c1cur[$i]', '$c1watt[$i]', '$c2dckwh[$i]', '$c2dcin[$i]', '$c2dcout[$i]', '$c2cur[$i]', '$c2watt[$i]', '$c3dckwh[$i]', '$c3dcin', '$c3dcout[$i]', '$c3cur[$i]', '$c3watt[$i]', '$pv2volttemp', '$pv1volttemp', '$actpower[$i]', '$avoltagetemp', '$acurrenttemp', '$bvoltagetemp', '$bcurrenttemp', '$cvoltagetemp', '$ccurrenttemp', '$alarm1[$i]', '$alarm2[$i]', '$alarm3[$i]', '$datetime[$i]')";
						
						echo $sql."<br>"; 

						if ($conn->query($sql) === TRUE) {
						  echo "New record created successfully";
						} else {
						  echo "Error: " . $sql . "<br>" . $conn->error;
						}
						$i--; $j++;
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