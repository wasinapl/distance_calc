<?php

class Distance{
    static private $PI = 3.141592653589793;
    static private $RADIUS = 6378.16;

    static function Radians($x){
        return $x * self::$PI / 180;
    }

    static function CalcDistance($pointA, $pointB){
        $dlon = self::Radians($pointA->longitude - $pointB->longitude);
        $dlat = self::Radians($pointA->latitude - $pointB->latitude);

        $a = (sin($dlat / 2) * sin($dlat / 2)) + cos(self::Radians($pointA->latitude)) * cos(self::Radians($pointB->latitude)) * sin($dlon / 2) * sin($dlon / 2);
        $angle = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return round($angle * self::$RADIUS, 3);
    }
}

?>