<?php 
#Alexandre Menard
#Advent Of Code 2021 - Day #1 - Part #1
#Source : https://adventofcode.com/2021/day/1

$file            = './input/input_day1.txt';
$measurements    = 0;
$measurements_p2 = 0;
$last_depth      = 0;
$sums            = array();
$last_sum        = 0;

$input  = fopen($file, "r") or die("Error opening file");
$string = fread($input, filesize($file));
$array  = explode("\n", $string);

fclose($input);

foreach ($array as $key => $depth){

    $sums[$key]     += (int)$depth ?? 0;
    $sums[$key + 1] += (int)$depth ?? 0;
    $sums[$key + 2] += (int)$depth ?? 0;
    
    if ($key === 0) {
        $last_depth = $depth;
        continue;
    }

    if ($last_depth < $depth) $measurements++;
    $last_depth = $depth;
}

foreach ($sums as $key => $value) {
    if($key === 0) {
        $last_sum = $value;
        continue;
    }

    if ($key > 2) {
        if ($last_sum < $value) $measurements_p2++;
        $last_sum = $value;
    }
}

echo '<h1>Day 1</h1>';
echo '<span>Answer Part 1 : </span>' . $measurements;
echo '<br/>';
echo '<span>Answer Part 2 : </span>' . $measurements_p2;
?>