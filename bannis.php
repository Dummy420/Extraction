<?php
require_once("functions.php");
$ips = Read2("pping.txt");
 ?>
<head>
  <title>Gestion des Ip pingés</title>
    <link rel="icon" href="Visitor-logo.png" />
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <nav>
    <h1>Gestion des Ip bannies</h1>
    <ul>
      <li><a href="index.php">Retour a la page d'acceuil</a></li>
    </ul>
  </nav>
  <hr>
  <div style="align: center;">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <?php
    foreach ($ips as $ip) {
        //echo('<tr><td style="padding: 0px;"><input class="button" style="width: 100%; height: 100%;" type="submit" value="'. $ip .'" name="test"></input></td>');
        echo '<input class="button" type="submit" value="'. $ip .'" name="test">';
        echo '</tr>';
    }
        $key;
        if (isset($_POST['test'])) {
            for ($i = 0; $i < sizeof($ips); $i++) {
                if ($_POST['test'] == $ips[$i]) {
                    $key = $i;
                }
            }
            unset($ips[$key]);
            $handler = fopen("pping.txt", "w");
            foreach ($ips as $ip) {
                fwrite($handler, $ip . "\r\n");
            }
            header("Refresh: 0");
        }
    ?>
  </div>
</form>
<?php
if (sizeof($ips) > 0){
  echo '<form method="post" action="index.php">
      <input class="button" style="width: 100%;" type="submit" name="delB" value="Supprimer toutes les Ips"></input>
    </form>';
}
?>
</body>
