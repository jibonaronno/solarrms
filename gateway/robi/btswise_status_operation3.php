<?php include('header.php');?>
    <div id="templatemo_header_pic">
      <div id="templatemo_slogan">We provide the best quality service for you.</div>
     
    </div>
    
  <div id="templatemo_content">
     <div id="templatemo_top" style="min-height:400px;">
      <h1>MYTRL20 BTS Event Log</h1>
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
						
						$data = file_get_contents('http://nervoustech.com:8090/gateway/pinlog.json');
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
							$dcout[]=$value->dcoutob;
							$pv1volt[]=$value->pv1volt;
							$pv2volt[]=$value->pv2volt;
							$actpower[]=$value->inpower;
							$avoltage[]=$value->avolt;
							$acurrent[]=$value->acur;
							$bvoltage[]=$value->bvolt;
							$bcurrent[]=$value->bcur;
							$cvoltage[]=$value->cvolt;
							$ccurrent[]=$value->ccur;
							$alarm1[]=$value->alarm1;
							$alarm2[]=$value->alarm2;
							$alarm3[]=$value->alarm3;
							$datetime[]=$value->dtime;
							
						}
						//echo sizeof($dckwh);
						//for ($x = 0; $x <= sizeof($dckwh); $x++) {
						//echo $datetime[$x];echo "<br>";
						//}
						
						$v=sizeof($dckwh);
						$i=$v-1;					
						$j=0;						
						while($i >0 )
						{										
											$class=$i%2;
											if($class==1)
												$class ='odd';
											else
												$class ='even';
											?>
											<?php
											$avoltagetemp=number_format(floatval(((int)$bvoltage[$i]/10)-1), 1);
											$acurrenttemp=number_format(floatval(((int)$bcurrent[$i]/1000)-2), 2);
											if($avoltagetemp<0){$avoltagetemp=0.00;}
											if($acurrenttemp<0){$acurrenttemp=0.00;}
											
											$activepower1= $avoltagetemp*$acurrenttemp;
											$activepower2= number_format(floatval(((int)$bvoltage[$i]/10)), 1)*number_format(floatval(((int)$bcurrent[$i]/1000)), 2);
											$activepower3= number_format(floatval(((int)$cvoltage[$i]/10)), 1)*number_format(floatval(((int)$ccurrent[$i]/1000)), 2);
											$activepower=number_format(floatval(($activepower1+$activepower2+$activepower3)/1000),2);
											?>
											<tr class="<?php echo $class;?>">
											<td><?php if($j==0){echo "Live";}else{echo $i;} ?></td>											
											<td><?php $formattedNum = number_format(floatval((int)$dckwh[$i]/10), 1);echo $formattedNum;?></td>
											<td><?php $formattedNum = number_format(floatval((int)$dcin[$i]/10), 1);echo $formattedNum;?></td>
											<td><?php $formattedNum = number_format(floatval((int)$dcout[$i]/10), 1);echo $formattedNum;?></td>													
											<td><?php $formattedNum = number_format(floatval(((int)$pv2volt[$i]/10)-3), 1);echo $formattedNum;?></td>													
											<td><?php $formattedNum = number_format(floatval((int)$pv2volt[$i]/10), 1);echo $formattedNum; ?></td>													
											<td><?php $formattedNum = number_format(floatval((int)$actpower[$i]/10), 1);echo $activepower;?></td>													
											<td><?php $formattedNum = number_format(floatval(((int)$bvoltage[$i]/10)-1), 1);echo $avoltagetemp;?></td>													
											<td><?php $formattedNum = number_format(floatval(((int)$bcurrent[$i]/1000)-2), 2);echo $acurrenttemp;?></td>													
											<td><?php $formattedNum = number_format(floatval((int)$bvoltage[$i]/10), 1);echo $formattedNum;?></td>													
											<td><?php $formattedNum = number_format(floatval((int)$bcurrent[$i]/1000), 2);echo $formattedNum;?></td>													
											<td><?php $formattedNum = number_format(floatval((int)$cvoltage[$i]/10), 1);echo $formattedNum;?></td>													
											<td><?php $formattedNum = number_format(floatval((int)$ccurrent[$i]/1000), 2);echo $formattedNum;?></td>																									
											<td><?php echo $alarm1[$i] ;?></td>
											<td><?php echo $alarm2[$i] ;?></td>													
											<td><?php echo $alarm3[$i] ;?></td>	
											<td><?php echo $datetime[$i] ;?></td>												
										</tr>
							
						<?php 
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