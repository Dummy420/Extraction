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
                    echo 'ip';
                    array_push($array, substr($line, 0, -1));
                } else {
                    echo 'n';
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
                $l = strlen($line);
                $l -= 1;
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
    $timing = substr($array[1], 0, $l);
    $n = substr($array[2], 0, 2);
    $final = array(
    'temps' => $temps,
    'timing' => $timing,
    'nombre' => $n,
  );
    return($final);
}
