<?php


namespace App\Weather;

use Exception;

class RemoteWeatherFetcher implements WeatherFetch
{
    public function fetch(string $city): ?WeatherInfo
    {
        $fp = fsockopen("ssl://downloads.codingcoursestv.eu", 443, $errno, $errstr, 30);
        if (!$fp) {
            return null;
        }

        $out = "GET /056%20-%20php/weather/weather.php?" . http_build_query(['city' => $city]) . " HTTP/1.1\r\n";
        $out .= "Host: downloads.codingcoursestv.eu\r\n";
        $out .= "Connection: Close\r\n\r\n";
        fwrite($fp, $out);

        $response = [];
        while (!feof($fp)) {
            $response[] = fgets($fp, 128);
        }
        fclose($fp);

        $responseStr = implode('', $response);
        $splittedResponse = explode("\r\n\r\n", $responseStr);

        if (!isset($splittedResponse[1])) {
            throw new Exception("Invalid response format: No body found.");
        }

        $data = json_decode($splittedResponse[1], true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Invalid JSON response: " . json_last_error_msg());
        }

        if (!isset($data['city'], $data['temperature'], $data['weather'])) {
            throw new Exception("Missing required weather data fields.");
        }

        return new WeatherInfo($data['city'], $data['temperature'], $data['weather']);
    }
}
