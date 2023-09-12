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
    <section class ='car-form'>
    <h1>UPLOAD</h1>
    <form action="addCar" method="POST" ENCTYPE="multipart/form-data">
        <div class="messages">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <input name="title" type="text" placeholder="title">
        <textarea name="description" rows=5 placeholder="description"></textarea>

        <input type="file" name="file"/><br/>
        <button type="submit">send</button>
    </form>
    </section>
</div>
</body>