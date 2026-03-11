<?php
function isPrime($n) {
    if ($n < 2) return false;
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

function countDivisors($n) {
    $count = 0;
    for ($i = 1; $i * $i <= $n; $i++) {
        if ($n % $i == 0) {
            $count += ($i * $i == $n) ? 1 : 2;
        }
    }
    return $count;
}

$N = intval($_GET['n'] ?? 18); // input dari URL
$bestP = -1;
$maxDiv = -1;

for ($p = 2; $p <= $N; $p++) {
    if (isPrime($p) && $N % $p == 0) {
        $telur = $N * $p;
        $div = countDivisors($telur);
        if ($div > $maxDiv || ($div == $maxDiv && $p < $bestP)) {
            $maxDiv = $div;
            $bestP = $p;
        }
    }
}

echo $bestP;
?>