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
            <book-text>BOOK A CAR</book-text>
            <booking-form>
                <customer-data>
                    <left>
                        <input name="name" type = "text" placeholder="NAME">
                        <input name="phone_number" type = "text" placeholder="000-000-00">
                        <input name="car_name" type = "text" placeholder="CAR NAME">
                    </left>
                    <right>
                        <input name="surname" type = "text" placeholder="SURNAME">
                        <input name="term" type = "date" placeholder="DATE">
                        <renting-time>
                            <input name="days" type = "number" placeholder="DAYS">
                            <input name="hours" type = "number" placeholder="HOURS">   
                        </renting-time>                    
                    </right>
                </customer-data>
                <button>BOOK</button>
            </booking-form>
        </div>
    </body>