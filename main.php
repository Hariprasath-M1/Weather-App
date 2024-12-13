<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Weather App</title>
</head>

<body>

    <?php
    $backgrounds = [
        'stormy' => 'images/back3.jpg',
        'cloudy' => 'images/cloud1.jpg',
        'snowy' => 'images/back7.jpg',
        'sunny' => 'images/sun.jpg'
    ];

    $bgImage = null;
    if (isset($backgrounds[$info->weatherType])) {
        $bgImage = $backgrounds[$info->weatherType];
    }

    ?>

    <div class="app-container"
        <?php if (!empty($bgImage)): ?>
        style="background-image: url('<?php echo e($bgImage); ?>');"
        <?php endif; ?>>
        <div class="top-bar">
            <div class="top-bar__location">
                <i class="fas fa-map-marker-alt"></i><?php echo e($info->city); ?>
            </div>
            <div class="top-bar__date">
                <?php echo e(date('l')) ?>, <?php echo e(date('d')); ?><sup>th</sup>
            </div>
        </div>
        <div class="weather-info">
            <img class="weather-info__image" src="images/cloudd.png" alt="Cloudy Weather">

            <h1 class="weather-info__temperature"><?php echo e($info->getFahrenheit()); ?>° / <?php echo e($info->getCelsius()); ?>°</h1>

            <?php if ($info->weatherType === 'stormy'): ?>
                <p class="weather-info__desc">
                    <i class="fas fa-cloud-showers-heavy"></i> Stormy
                </p>
            <?php elseif ($info->weatherType === 'sunny'): ?>
                <p class="weather-info__desc">
                    <i class="fas fa-sun"></i> Sunny
                </p>
            <?php elseif ($info->weatherType === 'snowy'): ?>
                <p class="weather-info__desc">
                    <i class="fas fa-snowflake"></i> Snowy
                </p>
            <?php elseif ($info->weatherType === 'cloudy'): ?>
                <p class="weather-info__desc">
                    <i class="fas fa-cloud"></i> Cloudy
                </p>
            <?php endif; ?>

        </div>
    </div>
</body>

</html>