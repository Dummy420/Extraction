<?php
require_once("functions.php");

//On garde les ips bannies dans l'array "$ips"
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
        //On affiche chaque ip dans son bouton lui correspondant
        echo '<input class="button" type="submit" value="'. $ip .'" name="test">';
    }
        $key;
        //si on clique sur un bouton
        if (isset($_POST['test'])) {
            for ($i = 0; $i < sizeof($ips); $i++) {
                if ($_POST['test'] == $ips[$i]) {
                    $key = $i;
                }
            }
            //on le retire de la liste
            unset($ips[$key]);
            $handler = fopen("pping.txt", "w");
            foreach ($ips as $ip) {
                fwrite($handler, $ip . "\r\n");
                //on réecrit la liste dans le txt sans l'ip qui viens d'être supprimée
            }
            //On rafraichit la page
            header("Refresh: 0");
        }
    ?>
  </div>
</form>
<?php
if (sizeof($ips) > 0){
  //Le form sert a renvoyer vers l'index, qui va automatiquement vider la liste des ips bannies
  echo '<form method="post" action="index.php">
      <input class="button" style="width: 100%;" type="submit" name="delB" value="Supprimer toutes les Ips"></input>
    </form>';
}
?>
</body>
