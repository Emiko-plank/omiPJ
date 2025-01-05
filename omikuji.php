<?php

$omikuji = [
    "大吉:" => 22,  // 10%
    "中吉" => 20,  // 20%
    "小吉" => 30,  // 30%
    "吉" => 15,    // 25%
    "末吉" => 10,  // 10%
    "凶" => 2,     // 4%
    "大凶" => 1     // 1%
];

$total_probability = array_sum($omikuji);
$random_num = rand(1, $total_probability);

$cumulative_probability = 0;
foreach ($omikuji as $result => $probability) {
    $cumulative_probability += $probability;
    if ($random_num <= $cumulative_probability) {
        echo "今日の運勢は「" . $result . "」です！";
        break;
    }
}

?>
