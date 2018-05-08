<?php

function faktoriyel($sayi)
{
    $sonuc = 1;
    for ($i = 1; $i <= $sayi; $i++) {
        $sonuc *= $i;
    }
    return $sonuc;
}

function faktoriyelRecursive($sayi)
{
    if ($sayi < 2) {
        return 1;
    }
    return $sayi * faktoriyelRecursive($sayi - 1);
}

$t1 = time() + microtime(true);
for ($i = 0; $i < 100000; $i++) {

    //$sonuc = faktoriyelRecursive(50);
    $sonuc = faktoriyel(50);
}
$t2 = time() + microtime(true);
echo "Süre : ", ($t2 - $t1), "\n";

//$sonuc = faktoriyelRecursive(60);
//echo "Sonuc : $sonuc\n";


/**
 *
 *
 * x! = x * (x-1) * (x-2) ..... 3 * 2 * 1
 * x! = x * (x-1)!
 * x! = x * (x-1) * (x-2)!
 */


