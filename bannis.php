<?php
require_once("functions.php");
$ips = Read2("pping.txt");
var_dump($ips);
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
  <table style="width: 60%;">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <?php
    foreach($ips as $ip)
    {
      echo('<tr><td style="padding: 0px;"><input style="width: 100%; height: 100%;" type="submit" value="'. $ip .'" name="test"></input></td>');
      echo '</tr>';
      if(isset($_POST['test']))
      {
        if(in_array($_POST['test'], $ips))
        {
          if($key = array_search($_POST['test'], $ips))
          {
            unset($ips[$key]);
            $handler = fopen("pping.txt", "w");
            foreach($ips as $ip)
            {
              fwrite($handler, $ip . "\r\n");
            }
            header("Refresh:0");
          }
        }
      }
    }

    if(isset($_POST['delB']))
    {
      $handle = fopen('pping.txt', "w");
      fwrite($handle, '');
      header("Refresh: 0");
    }
    ?>
  </table>
    <input type="submit" name="delB" value="Supprimer toutes les Ips"></input>
  </form>
</body>
