<?php

function tsp($graph)
{
    $path = [];
    $p = [];

    for ($i = 0; $i < count($graph); $i++) $path[$i] = $i;
    for ($i = 0; $i < count($graph) + 1; $i++) $p[$i] = $i;

    $bestPath = $path;
    $bestCost = 0;
    for ($i = 1; $i < count($bestPath); $i++) $bestCost += $graph[$bestPath[$i - 1]][$bestPath[$i]];

    $i = 1;
    while ($i < count($graph)) {
        $p[$i]--;

        $j = $i % 2 * $p[$i];
        $tmp = $path[$j];
        $path[$j] = $path[$i];
        $path[$i] = $tmp;

        $i = 1;
        while ($p[$i] == 0) {
            $p[$i] = $i;
            $i++;
        }

        $cost = 0;
        for ($k = 1; $k < count($path); $k++) $cost += $graph[$path[$k - 1]][$path[$k]];
        if ($cost < $bestCost) {
            $bestPath = $path;
            $bestCost = $cost;
        }
    }

    return $bestPath;
}

$graph10 = [
    [0, 20, 42, 35, 20, 42, 35, 16, 23, 99],
    [20, 0, 30, 34, 30, 34, 30, 17, 24, 97],
    [42, 30, 0, 12, 30, 12, 12, 18, 25, 96],
    [35, 34, 12, 0, 34, 12, 34, 19, 26, 95],
    [20, 30, 30, 34, 0, 12, 34, 11, 27, 94],
    [42, 34, 12, 12, 12, 0, 12, 12, 28, 93],
    [35, 30, 12, 34, 34, 12, 0, 13, 29, 92],
    [16, 17, 18, 19, 11, 12, 13, 0, 30, 91],
    [23, 24, 25, 26, 27, 28, 29, 30, 0, 90],
    [99, 97, 96, 95, 94, 93, 92, 91, 90, 0],
];

$startTime = microtime(true);
tsp($graph10);
$endTime = microtime(true);
echo $endTime - $startTime;
