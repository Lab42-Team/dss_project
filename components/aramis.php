<?php
$sourceAlternatives = [
    [[2,1,0], [3,0,0], [3,0,0], [1,1,1], [1,2,0], [2,1,0], [3,0,0], [2,1], [3,0], [3,0], [3,0,0]],
    [[3,0,0], [2,1,0], [2,1,0], [1,2,0], [2,1,0], [3,0,0], [2,1,0], [3,0], [2,1], [2,1], [3,0,0]],
    [[2,1,0], [2,1,0], [2,1,0], [2,1,0], [3,0,0], [2,1,0], [2,0,1], [3,0], [3,0], [3,0], [2,1,0]],
    [[2,1,0], [1,2,0], [2,1,0], [1,2,0], [2,1,0], [2,1,0], [2,1,0], [1,2], [3,0], [3,0], [2,1,0]],
    [[2,1,0], [2,1,0], [3,0,0], [2,1,0], [2,0,1], [2,0,1], [2,1,0], [3,0], [2,1], [3,0], [3,0,0]],
    [[2,1,0], [1,2,0], [2,1,0], [0,3,0], [1,2,0], [3,0,0], [2,1,0], [3,0], [3,0], [2,1], [2,1,0]],
    [[2,1,0], [2,1,0], [2,1,0], [2,1,0], [2,1,0], [1,1,1], [2,1,0], [1,2], [2,1], [1,2], [2,0,1]],
    [[3,0,0], [3,0,0], [2,1,0], [1,1,1], [1,0,2], [3,0,0], [3,0,0], [1,2], [3,0], [3,0], [2,1,0]],
    [[2,1,0], [2,1,0], [1,1,1], [0,2,1], [0,2,1], [2,0,1], [1,1,1], [1,2], [2,1], [2,1], [1,1,1]],
    [[1,2,0], [1,1,1], [2,0,1], [2,0,1], [2,1,0], [2,0,1], [2,0,1], [2,1], [2,1], [2,1], [2,0,1]]
];

function getRanksByAramis($array)
{

    $bestAlternative = [];
    $worstAlternative = [];

    $maxMark = array_sum($array[0][0]);

    for ($i = 0; $i < count($array[0]); $i++) {
        $lenCriterial = count($array[0][$i]);
        for ($j = 0; $j < $lenCriterial; $j++) {
            //worst
            $worstAlternative[$i][$j] = ($j == $lenCriterial - 1) ? $maxMark : 0;
            //best
            if ($j == 0) {
                $bestAlternative[$i][$j] = $maxMark;
            } else {
                $bestAlternative[$i][$j] = 0;
            }
        }
    }

    $summ = [
        'best' => [],
        'worst' => []
    ];

    for ($row = 0; $row < count($array); $row++) {
        $summ['best'][$row] = 0;
        $summ['worst'][$row] = 0;
        for ($column = 0; $column < count($array[$row]); $column++) {
            for ($item = 0; $item < count($array[$row][$column]); $item++) {
                $summ['best'][$row] = $summ['best'][$row] + abs($bestAlternative[$column][$item] - $array[$row][$column][$item]);

                $summ['worst'][$row] = $summ['worst'][$row] + abs($worstAlternative[$column][$item] - $array[$row][$column][$item]);
            }
        }
    }

    for ($i = 0; $i < count($array); $i++) {
        $result[$i] = round($summ['best'][$i] / ($summ['best'][$i] + $summ['worst'][$i]), 3);
    }

    $rankedAlternatives = $result;

    for ($j = 0; $j < count($rankedAlternatives) - 1; $j++) {
        for ($i = 0; $i < count($rankedAlternatives) - $j - 1; $i++) {
            if ($rankedAlternatives[$i] < $rankedAlternatives[$i + 1]) {
                $temp = $rankedAlternatives[$i + 1];
                $rankedAlternatives[$i + 1] = $rankedAlternatives[$i];
                $rankedAlternatives[$i] = $temp;
            }
        }
    }
    print_r($rankedAlternatives);
}

getRanksByAramis($sourceAlternatives);

?>
