#Weather App in PHP:

This is a basic weather application built with PHP that fetches and displays weather information for a given city. 

The app uses PHP's fsockopen function to make HTTP requests and dynamically updates the user interface based on the fetched weather data.

#Prerequisites:

1. PHP 8.0 or higher

2. A local server (e.g., XAMPP, WAMP, or MAMP)

3. A web browser

#File Overview:

RemoteWeatherFetcher.php

Contains the logic for fetching weather data from the remote server using fsockopen.

Handles the response and converts it into usable JSON data.

WeatherFetch.php

Defines the interface for fetching weather data.

WeatherInfo.php

Represents the weather information for a city.

Includes properties such as city, temperature, and weatherType.

index.php

Entry point for the application.

Displays the weather information fetched by the RemoteWeatherFetcher.

styles.css

Contains styles for the application, ensuring a visually appealing interface.

images/

Stores background images and icons used in the app.


Example Output:

When you fetch weather data for "Bangalore":

Temperature: 300 K

Weather Type: Cloudy

Background Image: Cloudy sky
