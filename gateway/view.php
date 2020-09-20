<?php

$json = json_decode(file_get_contents("pinlog.json"),true);
//print_r($json);

foreach($json as $rec001)
{
	echo 'DC IN:'.$rec001['dcinob'].'  DC OUT'.$rec001['dcoutob'].'  DC Kwh:'.$rec001['dckwhout']. '   PV1 VOLT: '. $rec001['pv1volt'] . '<br />';
}

echo '<br /><br />'

?>