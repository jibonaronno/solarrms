<?php
//nervoustech.com:8090/gateway/pinlog.php?dckwhout=2.2&dcinob=55.0&dcoutob=20.0
//?serial=01&devid=01&siteid=MYTRL20&imei=27836427346&ccid=UUD736455&cellno=+8801818843434&dckwhout=10&dcinob=22&dcoutob=33&ackwhsun=44&3=1&alarm1=0&alarm2=0&alarm3=0&pv1volt=330&pv2volt=330&avolt=220&bvolt=220&cvolt=230&acur=1&bcur=2&ccur=1
if(isset($_GET['serial']) && isset($_GET['devid']) && isset($_GET['siteid']) && isset($_GET['imei']) && isset($_GET['ccid']) && isset($_GET['cellno']) && isset($_GET['dckwhout']) && isset($_GET['dcinob']) && isset($_GET['dcoutob']) && isset($_GET['ackwhsun']) && isset($_GET['inpower']) && isset($_GET['alarm1']) && isset($_GET['alarm2']) && isset($_GET['alarm3']) && isset($_GET['pv1volt']) && isset($_GET['pv2volt']) && isset($_GET['avolt']) && isset($_GET['bvolt']) && isset($_GET['cvolt']) && isset($_GET['acur']) && isset($_GET['bcur']) && isset($_GET['ccur']))
{
    $devid=$_GET['devid'];$siteid=$_GET['siteid'];$imei=$_GET['imei'];$ccid=$_GET['ccid'];$cellno=$_GET['cellno'];
	$c1dckh=$_GET['dckwhout'];$c1dcin=$_GET['dcinob'];$c1dcout=$_GET['dcoutob'];$c1dccur=$_GET['dccurrentob'];$c1watt=0;
	$c2dckh=$_GET['dckwhout1'];$c2dcin=$_GET['dcinob1'];$c2dcout=$_GET['dcoutob1'];$c2dccur=$_GET['dccurrentob1'];$c2watt=0;
	$c3dckh=$_GET['dckwhout2'];$c3dcin=$_GET['dcinob2'];$c3dcout=$_GET['dcoutob2'];$c3dccur=$_GET['dccurrentob2'];$c3watt=0;
	$pv1volt=$_GET['pv1volt'];$pv2volt=$_GET['pv2volt'];$inpower=$_GET['inpower'];
	$avolt=$_GET['avolt'];$acur=$_GET['acur'];$bvolt=$_GET['bvolt'];$bcur=$_GET['bcur'];$cvolt=$_GET['cvolt'];$ccur=$_GET['ccur'];
	$alarm1=$_GET['alarm1'];$alarm2=$_GET['alarm2'];$alarm3=$_GET['alarm3'];
	


	$date = new DateTime();
    $date->setTimeZone(new DateTimeZone("Asia/Dhaka"));
    $get_datetime = $date->format('d.m.Y H:i:s');
    $json = json_decode(file_get_contents("pinlog.json"),true);
    $json[] = array('serial'=>$_GET['serial'], 'devid'=>$_GET['devid'], 'siteid'=>$_GET['siteid'], 'imei'=>$_GET['imei'], 'ccid'=>$_GET['ccid'], 'cellno'=>$_GET['cellno'], 'charger'=>array(array('chargerid'=>'01', 'dckwhout'=>$_GET['dckwhout'], 'dcinob'=>$_GET['dcinob'], 'dcoutob'=>$_GET['dcoutob'], 'current'=>$_GET['dccurrentob'], 'watt'=>'0'), array('chargerid'=>'02', 'dckwhout'=>$_GET['dckwhout1'], 'dcinob'=>$_GET['dcinob1'], 'dcoutob'=>$_GET['dcoutob1'], 'current'=>$_GET['dccurrentob1'], 'watt'=>'0'), array('chargerid'=>'03', 'dckwhout'=>$_GET['dckwhout2'], 'dcinob'=>$_GET['dcinob2'], 'dcoutob'=>$_GET['dcoutob2'], 'current'=>$_GET['dccurrentob2'], 'watt'=>'0')), 'inverter'=>array(array('inverterid'=>'01', 'inpower'=>$_GET['inpower'], 'ackwhsun'=>$_GET['ackwhsun'], 'pv1volt'=>$_GET['pv1volt'], 'pv2volt'=>$_GET['pv2volt'], 'avolt'=>$_GET['avolt'], 'bvolt'=>$_GET['bvolt'], 'cvolt'=>$_GET['cvolt'], 'acur'=>$_GET['acur'], 'bcur'=>$_GET['bcur'], 'ccur'=>$_GET['ccur'], 'alarm1'=>$_GET['alarm1'], 'alarm2'=>$_GET['alarm2'], 'alarm3'=>$_GET['alarm3'])),  'dtime'=>$get_datetime);
    file_put_contents("pinlog.json", json_encode($json));

    echo "OK " . $get_datetime;
	
						$dbhost = "localhost";
						$dbuser = "root";
						$dbpass = "redhat07";
						
						$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
						mysqli_select_db($conn,'powertec_robi');
						$sql= "INSERT INTO `bts_data_log` ( `DEVICE_ID`, `SITE_ID`, `IMEI`, `CCID`, `CELLNO`, `C1_DCKWH`, `C1_DC_IN`, `C1_DC_OUT`, `C1_CUR`, `C1_WATT`, `C2_DCKWH`, `C2_DC_IN`, `C2_DC_OUT`, `C2_CUR`, `C2_WATT`, `C3_DCKWH`, `C3_DC_IN`, `C3_DC_OUT`, `C3_CUR`, `C3_WATT`, `PV1_VOLT`, `PV2_VOLT`, `ACT_POWER`, `A_VOLTAGE`, `A_CURRENT`, `B_VOLTAGE`, `B_CURRENT`, `C_VOLTAGE`, `C_CURRENT`, `ALARM_1`, `ALARM_2`, `ALARM_3`, `SITE_TIME`) 
						 VALUES ( '$devid', '$siteid', '$imei', '$ccid', '$cellno', '$c1dckh', '$c1dcin', '$c1dcout', '$c1dccur', '$c1watt', '$c2dckh', '$c2dcin', '$c2dcout', '$c2dccur', '$c2watt', '$c3dckh', '$c3dcin', '$c3dcout', '$c3dccur', '$c3watt', '$pv1volt', '$pv2volt', '$inpower', '$avolt', '$acur', '$bvolt', '$bcur', '$cvolt', '$ccur', '$alarm1', '$alarm2', '$alarm3', '$get_datetime')";
						
						echo $sql."<br>"; 

						if ($conn->query($sql) === TRUE) {
						  //echo "New record created successfully";
						} else {
						  //echo "Error: " . $sql . "<br>" . $conn->error;
						}
						$conn -> close();

}
else
{
    echo 'ERROR ' . $get_datetime;
}

//http://localhost/robi/pinlog.php?dckwhout=2.2&dcinob=55.0&dcoutob=20.0?serial=01&devid=01&siteid=MYTRL20&imei=27836427346&ccid=UUD736455&cellno=+8801818843434&dckwhout=10&dcinob=22&dcoutob=33&ackwhsun=44&3=1&alarm1=0&alarm2=0&alarm3=0&pv1volt=330&pv2volt=330&avolt=220&bvolt=220&cvolt=230&acur=1&bcur=2&ccur=1
						

?>
