<?php
function Read($file)
{
    if (file_exists($file)) {
        $absents = [];
        $handle = fopen("$file", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $n = substr("$line", -3, 1);
                $l = strlen($line);
                $l -= 4;
                $ip = substr($line, 0, $l);
                $array = [$ip, $n];
                array_push($absents, $array);
            }
            fclose($handle);
        }
        return $absents;
    } else {
        return [];
    }
}

function Read2($file)
{
    if (file_exists($file)) {
        $absents = [];
        $handle = fopen("$file", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $l = strlen($line);
                $l -= 2;
                $ip = substr("$line", 0, $l);
                array_push($absents, $ip);
            }
            fclose($handle);
        }
        return $absents;
    } else {
        return [];
    }
}

function ip_range($start, $end)
{
    $start = ip2long($start);
    $end = ip2long($end);
    return array_map('long2ip', range($start, $end));
}

function ReadParam($file)
{
  $array = [];
  $handle = fopen("$file", "r");
  if ($handle) {
      while (($line = fgets($handle)) !== false) {
          array_push($array, $line);
      }
      fclose($handle);
  }
  $temps = substr($array[0], 0, 5);
  $l = strlen($array[1]) - 1;
  $timing = substr($array[0], 0, $l);
  $couleur = substr($array[2], 0, 7);
  $final = array(
    'temps' => $temps,
    'timing' => $timing,
    'couleur' => $couleur,
    'nombre' => $array[3]
  );
  return($final);
}
