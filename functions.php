<?php
function Read($file)
{
    if (file_exists($file)) {
        $absents = [];
        $handle = fopen("$file", "r");
        $i = 0;
        $array = [];
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                if ($i % 2 == 0) {
                    array_push($array, substr($line, 0, -1));
                } else {
                    array_push($array, substr($line, 0, -1));
                    array_push($absents, $array);
                    $array = [];
                }
                $i++;
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
                $ip = substr("$line", 0, -1);
                array_push($absents, $ip);
            }
            fclose($handle);
        }
        return $absents;
    } else {
        return [];
    }
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
    $timing = substr($array[1], 0, $l);
    $n = substr($array[2], 0, 2);
    $final = array(
    'temps' => $temps,
    'timing' => $timing,
    'nombre' => $n,
  );
    return($final);
}
