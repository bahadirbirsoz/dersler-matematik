<?php

class Asal
{


    public static function getObeb()
    {
        $sayilar = func_get_args();

        $carpanlar = [];
        $tumTabanlar = [];
        foreach ($sayilar as $sayi) {
            $carpanlar[$sayi] = static::getAsalCarpanlar($sayi);
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

    public static function getAsalCarpanlar($sayi)
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


    public static function isAsal($num)
    {
        $carpanlar = static::getAsalCarpanlar($num);
        return count($carpanlar) == 1 && array_pop($carpanlar) == 1;
    }

    public static function getAsal($n)
    {
        $asal = [];
        $num = 2;
        for ($i = 0; $i < $n; $i) {
            if (static::isAsal($num)) {
                $asal[] = $num;
                $i++;
            }
            $num++;
        }
        return $asal;
    }

    public static function isAralarindaAsal()
    {
        $obeb = call_user_func_array("Asal::getObeb", func_get_args());
        return $obeb == 1;
    }
}




