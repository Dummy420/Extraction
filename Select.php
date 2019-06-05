<?php
require_once("functions.php");
$ips = ip_range('132.166.44.1', '132.166.47.254');
$i = 1;
foreach ($ips as $ip) {
    echo $i . ' ';
    echo($ip);
    echo '<br>';
    $i ++;
}
?>
 <head>
   <title>Selection particulière</title>
 </head>
 <body>

 </body>
