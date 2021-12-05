<?php 
#Alexandre Menard
#Advent Of Code 2021 - Day #1 - Part #1
#Source : https://adventofcode.com/2021/day/1

$file = './input_part1.txt';
$measurements = 0;
$last_depth = 0;

$input  = fopen($file, "r") or die("Error opening file");
$string = fread($input, filesize($file));
$array  = explode("\n", $string);

fclose($input);

foreach ($array as $key => $depth){
    if ($key === 0) {
        $last_depth = $depth;
        continue;
    }
    
    if ($last_depth < $depth) $measurements++;
    $last_depth = $depth;
}

echo $measurements;
?>