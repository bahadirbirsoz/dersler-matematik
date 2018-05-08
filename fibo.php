<?php

function fiboRecursive($n)
{
    if ($n < 3)
        return 1;
    return fiboRecursive($n - 1) + fiboRecursive($n - 2);
    /**
     * 10
     * 9 8
     * 8 7 7 6
     * 7 6 6 5 6 5 5 4
     * 6 5 5 4 5 4 4 3 5 4 5 4 4 3 4 3 3 2
     *
     *
     */
}


function fiboArr($n)
{
    $arr = [1, 1];

    for ($i = 2; $i < $n; $i++) {
        $arr[$i] = $arr[$i - 1] + $arr[$i - 2];
    }

    return array_pop($arr);
}

function fiboAlt($n)
{
    $prev = 1;
    $current = 1;
    for ($i = 2; $i < $n; $i++) {
        if ($i % 2) {
            $current += $prev;
        } else {
            $prev += $current;
        }
    }

    return $n % 2 ? $prev : $current;

}

echo "Fibo Alt : \n";
$t1 = time() + microtime(true);
for ($i = 0; $i < 100000; $i++) {
    fiboAlt(30);
}
$t2 = time() + microtime(true);
echo "Süre : ", ($t2 - $t1), "\n";


echo "Fibo Array : \n";

$t1 = time() + microtime(true);
for ($i = 0; $i < 100000; $i++) {
    fiboArr(30);
}
$t2 = time() + microtime(true);
echo "Süre : ", ($t2 - $t1), "\n";


/**
 *
 *
 * 1 1 2 3 5 8 13 21 34 55 89 ...
 * f(4) = f(3) + f(2)
 *
 */

