<?php
//https://downloads.codingcoursestv.eu/056%20-%20php/weather/weather.php


use App\Weather\FakeWeatherFetcher;
use App\Weather\RadomWeatherFectcher;
use App\Weather\RandomWeatherFetcher;
use App\Weather\RemoteWeatherFetcher;

require __DIR__ . '/inc/all.inc.php';

date_default_timezone_set('UTC');

$fetcher = new RemoteWeatherFetcher();
$info = $fetcher -> fetch('Bangalore');



require __DIR__ . '/main.php';