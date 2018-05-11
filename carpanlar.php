<?php


function carpanlar($sayi)
{
    $bolen = 2;
    $sonuc = [];
    while ($sayi != 1) {

        if ($sayi % $bolen == 0) {
            $sayi /= $bolen;
            if (!array_key_exists($bolen, $sonuc)) {
                $sonuc[$bolen] = 0;
            }

            $sonuc[$bolen]++;
        } else {
            $bolen++;
        }
    }

    return $sonuc;

}

function obeb()
{
    $sayilar = func_get_args();

    $carpanlar = [];
    $tumTabanlar = [];
    foreach ($sayilar as $sayi) {
        $carpanlar[$sayi] = carpanlar($sayi);
        $tumTabanlar = array_merge($tumTabanlar, array_keys($carpanlar[$sayi]));
    }
    $tumTabanlar = array_unique($tumTabanlar);

    $ortakTabanlar = $tumTabanlar;


    foreach ($carpanlar as $sayi => $scarpanlar) {
        $ortakTabanlar = array_intersect($ortakTabanlar, array_keys($scarpanlar));
    }

    $obeb = [];
    foreach ($carpanlar as $sayi => $scarpanlar) {
        foreach ($ortakTabanlar as $taban) {

            if (!array_key_exists($taban, $obeb) || (array_key_exists($taban, $obeb) && ($scarpanlar[$taban] < $obeb[$taban]))) {
                $obeb[$taban] = $scarpanlar[$taban];
            }
        }
    }
    $cevap = 1;
    /**
     * 2 => 1
     * 3 =>
     */
    foreach ($obeb as $taban => $us) {
        $cevap *= pow($taban, $us);
    }

    return $cevap;

}


function okek()
{
    $sayilar = func_get_args();

    $carpanlar = [];
    $tumTabanlar = [];
    foreach ($sayilar as $sayi) {
        $carpanlar[$sayi] = carpanlar($sayi);
        $tumTabanlar = array_merge($tumTabanlar, array_keys($carpanlar[$sayi]));
    }
    $tumTabanlar = array_unique($tumTabanlar);


    $okek = [];
    foreach ($carpanlar as $sayi => $scarpanlar) {
        foreach ($tumTabanlar as $taban) {

            if (!array_key_exists($taban, $okek) || (array_key_exists($taban, $okek) && ($scarpanlar[$taban] > $okek[$taban]))) {
                $okek[$taban] = $scarpanlar[$taban];
            }
        }
    }
    $cevap = 1;
    foreach ($okek as $taban => $us) {
        $cevap *= pow($taban, $us);
    }

    return $cevap;
}



/**
 * OBEB
 *
 *
 * 18
 * 2 => 1
 * 3 => 2
 *
 * 24
 * 2 => 3
 * 3 => 1
 *
 *
 *
 *
 * OKEK
 *
 *
 *
 *
 *
 *
 */


