<!DOCTYPE html>
<html>
<head>
    <title>Weather</title>
</head>
<body>
    <h1>Current weather in {{ $city }}</h1>
    <p>Temperature: {{ $temp }} &deg;C</p>
    <img src="https://openweathermap.org/img/wn/{{ $icon }}.png" alt="Weather icon">
</body>
</html>
