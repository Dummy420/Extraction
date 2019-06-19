<?php
require_once('functions.php');
if (isset($_POST['sender'])) {
    $time = $_POST['time'];
    $heure = substr($time, 0, 2);
    $minute = substr($time, -2);
    $mili = $heure * '3.6e+6';
    $mili += $minute * 60000;
    $handle = fopen('parametres.txt', 'w');
    fwrite($handle, $_POST['time'] . "\n" . $mili . "\n" . $_POST['nombre']);
    fclose($handle);
}
$param = ReadParam("parametres.txt");
 ?>
<head>
  <link rel="icon" href="Images\Visitor-logo.png" />
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <nav>
    <h1>Paramètes</h1>
    <ul>
      <li><a href="index.php">AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</a></li>
    </ul>
  </nav>
  <hr>
  <?php
  if(isset($_POST['info'])) {
    echo '<h2>' . $_POST ['info'] . '</h2>';
  }
   ?>
  <form method="post">
    <input type="time" name="time" value="<?php echo $param['temps']; ?>">
    <input type="number" name="nombre" min="3" value="<?php echo $param['nombre']; ?>">
    <input type="submit" name="sender" value="Enregister">
    <input type="hidden" value="Enregistrées!" name="info">
  </form>
  <span class="petit">
    <hr>
    <?php include('footer.html'); ?>
  </span>
</body>
