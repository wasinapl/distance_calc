<?php

class Point
{
    public $latitude;
    public $longitude;

    function __construct($point)
    {
        $this->latitude = $point['latitude'];
        $this->longitude = $point['longitude'];
    }

    function validate(){
        return $this->latitude >= -90 && $this->latitude <= 90 && $this->longitude >= -90 && $this->longitude <= 90;
    }

}
