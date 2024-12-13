<?php


namespace App\Weather;


interface WeatherFetch{
    public function fetch(string $city): ?WeatherInfo;
}