<!doctype <html>
    <head>
        <link rel = "stylesheet" type="text/css" href="public/css/style.css">

        <title>CARS</title>
    </head>
    <body>
        <div class=" booking-container">
            <div class="logo">
                <img src="public/img/logo.svg">
            </div>
            <available-cars>
                <?php foreach ($cars as $newCar): ?>
                    <car>
                        <img src="public/uploads/<?= $newCar->getPhoto() ?>">
                        <car-name-text><?= $newCar->getName() ?></car-name-text>
                        <car-name-text><?= $newCar->getType() ?></car-name-text>
                        <car-name-text>PRICE: <?= $newCar->getPrice() ?>PLN PER DAY</car-name-text>
                        <?php if ($newCar->getAvailable()): ?>
                            <car-name-text>AVAILABLE</car-name-text>
                        <?php else: ?>
                            <car-name-text>UNAVAILABLE FROM <?=$newCar->getUnavailableTimeFrom($newCar->getName()) ?> </car-name-text>
                        <car-name-text>TO <?=$newCar->getUnavailableTimeTo($newCar->getName()) ?></car-name-text>
                        <?php endif; ?>
                    </car>
                <?php endforeach; ?>
            </available-cars>
<!--            <button>CHOOSE CAR</button>-->
        </div>
    </body>