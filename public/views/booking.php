<!doctype <html>
    <head>
        <link rel = "stylesheet" type="text/css" href="public/css/style.css">
        <script src="https://kit.fontawesome.com/62855bbf4d.js" crossorigin="anonymous"></script>

        <title>booking
        </title>
    </head>

    <body>
        <div class="booking-container">
            <div class="logo">
                <img src="public/img/logo.svg">
            </div>
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <book-text>BOOK A CAR</book-text>

                <form action="booking" method="POST" ENCTYPE="multipart/form-data">
                <customer-data>
                    <left>
                        <input name="name" type = "text" placeholder="NAME">
                        <input name="phone_number" type = "text" placeholder="000-000-00">
                        <input name="car_name" type = "text" placeholder="CAR NAME">
                    </left>
                    <right>
                        <input name="surname" type = "text" placeholder="SURNAME">
                        <input name="date" type = "date" placeholder="DATE">
                        <renting-time>
                            <input name="days" type = "number" min="0" placeholder="DAYS">
                            <input type="number" name="hours" min="0" max="23" step="1" placeholder="HOURS">
                        </renting-time>                    
                    </right>
                </customer-data>
                <button type ="submit">BOOK</button>
                </form>
        </div>
    </body>