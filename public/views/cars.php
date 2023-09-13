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
                        <button><?= $newCar->getPrice() ?></button>
                    </car>
                <?php endforeach; ?>
            </available-cars>
        </div>
    </body>