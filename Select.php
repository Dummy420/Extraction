<?php
ini_set('max_execution_time', 0);
require_once("functions.php");
$ips = ip_range('132.166.44.1', '132.166.47.254');
$i = 1;
foreach ($ips as $ip) {
    echo $i . ' ';
    echo($ip . " ");
    $i ++;
    exec("ping -n 1 -w 500  $ip", $output, $status);
    echo $status;
    echo '<br>';
}
?>
 <head>
   <title>Selection particulière</title>
 </head>
 <body>

 </body>
