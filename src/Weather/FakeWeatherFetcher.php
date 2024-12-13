<?php


namespace App\Weather;


class FakeWeatherFetcher implements WeatherFetch{

    public function fetch(string $city): WeatherInfo
    {
        return new WeatherInfo($city, 270, 'sunny');
    }
}