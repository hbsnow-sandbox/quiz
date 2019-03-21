<?php
include('./question.php');

$answer = $items;
$sizeListFlipped = array_flip($sizeList);

usort($answer, function ($a, $b) use ($sizeListFlipped) {
    if ($a['num'] != $b['num']) {
        // 数値が完全に異なる場合には最優先
        return $a['num'] < $b['num'] ? -1 : 1;
    }

    if ($a['num'] !== $b['num']) {
        // 数としては同じだが、厳密には異なる場合には文字数の多い順
        return strlen($a['num']) < strlen($b['num']) ? -1 : 1;
    }

    // 数が一致したならサイズ順
    return $sizeListFlipped[$a['size']] < $sizeListFlipped[$b['size']] ? -1 : 1;
});

foreach ($answer as $v) {
    echo "{$v['num']} : {$v['size']}\n";
}
