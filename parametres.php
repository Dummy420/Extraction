<?php
require_once('functions.php');
if (isset($_POST['sender'])) {
    $time = $_POST['time'];
    $heure = substr($time, 0, 2);
    $minute = substr($time, -2);
    $mili = $heure * '3.6e+6';
    $mili += $minute * 60000;
    echo $mili, $_POST['couleur'];
    $handle = fopen('parametres.txt', 'w');
    fwrite($handle,$_POST['time'] . "\n" . $mili . "\n" . $_POST['couleur']);
    fclose($handle);
    echo "<p>Enregistré!";
}
print_r (ReadParam("parametres.txt"));
$param = ReadParam("parametres.txt");
echo $param['timing'];
 ?>

<body>
  <form method="post">
    <input type="time" name="time" value="<?php echo substr($param['temps'], 0, 5); ?>">
    <input type="color" name="couleur" value="#ab0000">
    <input type="submit" name="sender" value="Enregister">
  </form>
  <a href="index.php">AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</a>
</body>
