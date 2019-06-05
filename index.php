<?php
ini_set('max_execution_time', 0); //sert a éviter un plantage au bout de 120s
$absents = [];
$punis = [];

require_once("functions.php");
require_once("Co.php"); //On récupère le singleton pour la connection
//on va lire les infos déjà déposées dans le fichier .txt et les sauvegarder dans un tableau
$absents = Read('faux.txt');
$punis = Read2('pping.txt');

$fp = fopen("faux.txt", 'w'); //renseignement du fichier texte pour l'ecriture
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$link = Link::getInstance(); //recupération de la connection a la base SQL
$co = $link->getlink();

//on effectue la requête SQL et on la store dans la variable $result
$result = $link->Select("SELECT `materiel_reference`, `utilisateur_final`, `adresse_ip`, `commentaire`, `reforme`, `surveillance` FROM `materiel` WHERE `surveillance` = 1");?>
<head>
  <link rel="icon" href="Visitor-logo.png"/>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Surveillance du Materiel</title>
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
//paste this code under the head tag or in a separate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
<body>
  <div class="se-pre-con"></div>
<nav>
  <h1>Surveillance des Équipements</h1>
  <ul>
    <li><a href="bannis.php">Gestion des Ip a Pinger</a><li>
    <li><a href="Select.php">Selection particulière</a></li>
  </ul>
</nav>
  <hr>
<table>
<tr>
  <th scope="col">Numéro</th>
  <th scope="col">ID</th>
  <th scope="col">Utilisateur</th>
  <th scope="col">Adresse Ip</th>
  <th scope="col">Commentaire</th>
  <th scope="col">Réforme</th>
  <th scope="col">Surveillance</th>
  <th scope="col">Resultat Ping</th>
</tr>

  <?php

//création du tableau pour afficher les valeurs recupérées dans $result
for ($i = 0; $i < sizeof($result); $i++) {
    $status = "Non Pingé";
    $bgcolor = '#d1d1d1';
    $ip = $result[$i][2];
    echo '<tr scope="row">';
    $ii = $i + 1;
    echo '<td>' . $ii . '</td>';
    echo('<td>'.$result[$i][0].'</td>');
    echo('<td>'.$result[$i][1].'</td>');
    echo('<td>'.$result[$i][2].'</td>');
    echo('<td>'.$result[$i][3].'</td>');
    echo('<td>'.$result[$i][4].'</td>');
    echo('<td>'.$result[$i][5].'</td>');

    if (!in_array($result[$i][2], $punis)) {
        try {
            exec("ping -n 1 $ip", $output, $status);
        } catch (Exeption $e) {
            $status = "Erreur";
        }
        if ($status == 1) {
            $status = 'Ping non réussi';
            $bgcolor = '#e80000';
            $n = 1;
            for ($j = 0; $j < sizeof($absents); $j++) {
                if ($result[$i][2] == $absents[$j][0]) {
                    $n = $absents[$j][1];
                    $n++;
                    if ($n == "\r") {
                        $n = 1;
                    }
                }
            }
            if ($n <= 2) {
                fwrite($fp, $result[$i][2] . " " . $n . "\r\n");
            } else {
                $handle = fopen("pping.txt", "a");
                fwrite($handle, $result[$i][2]."\r\n");
                fclose($handle);
            }
        } elseif ($status == 0) {
            $status = 'Ping Réussi';
            $bgcolor = '#00C600';
        }
    }
    echo('<td bgcolor="'. $bgcolor .'">'.$status.'</td>');
    echo '</tr>';
}
fclose($fp);?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <input type="submit" id="BigB">
</form>
</body>
