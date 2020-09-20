<?php
//nervoustech.com:8090/gateway/pinlog.php?dckwhout=2.2&dcinob=55.0&dcoutob=20.0
//?serial=01&devid=01&siteid=MYTRL20&imei=27836427346&ccid=UUD736455&cellno=+8801818843434&dckwhout=10&dcinob=22&dcoutob=33&ackwhsun=44&3=1&alarm1=0&alarm2=0&alarm3=0&pv1volt=330&pv2volt=330&avolt=220&bvolt=220&cvolt=230&acur=1&bcur=2&ccur=1
if(isset($_GET['serial']) && isset($_GET['devid']) && isset($_GET['siteid']) && isset($_GET['imei']) && isset($_GET['ccid']) && isset($_GET['cellno']) && isset($_GET['dckwhout']) && isset($_GET['dcinob']) && isset($_GET['dcoutob']) && isset($_GET['ackwhsun']) && isset($_GET['inpower']) && isset($_GET['alarm1']) && isset($_GET['alarm2']) && isset($_GET['alarm3']) && isset($_GET['pv1volt']) && isset($_GET['pv2volt']) && isset($_GET['avolt']) && isset($_GET['bvolt']) && isset($_GET['cvolt']) && isset($_GET['acur']) && isset($_GET['bcur']) && isset($_GET['ccur']))
{
    $date = new DateTime();
    $date->setTimeZone(new DateTimeZone("Asia/Dhaka"));
    $get_datetime = $date->format('d.m.Y H:i:s');
    $json = json_decode(file_get_contents("pinlog.json"),true);
    $json[] = array('serial'=>$_GET['serial'], 'devid'=>$_GET['devid'], 'siteid'=>$_GET['siteid'], 'imei'=>$_GET['imei'], 'ccid'=>$_GET['ccid'], 'cellno'=>$_GET['cellno'], 'charger'=>array(array('chargerid'=>'01', 'dckwhout'=>$_GET['dckwhout'], 'dcinob'=>$_GET['dcinob'], 'dcoutob'=>$_GET['dcoutob'])), 'inverter'=>array(array('inverterid'=>'01', 'inpower'=>$_GET['inpower'], 'ackwhsun'=>$_GET['ackwhsun'], 'pv1volt'=>$_GET['pv1volt'], 'pv2volt'=>$_GET['pv2volt'], 'avolt'=>$_GET['avolt'], 'bvolt'=>$_GET['bvolt'], 'cvolt'=>$_GET['cvolt'], 'acur'=>$_GET['acur'], 'bcur'=>$_GET['bcur'], 'ccur'=>$_GET['ccur'], 'alarm1'=>$_GET['alarm1'], 'alarm2'=>$_GET['alarm2'], 'alarm3'=>$_GET['alarm3'])),  'dtime'=>$get_datetime);
    file_put_contents("pinlog.json", json_encode($json));

    echo 'ok50976';
}

else
{
    echo 'error\r\n';
}

?>
