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
        <input name="name" type="text" placeholder="name">
        <input name="type" type="text" placeholder="type">
        <input name="price" type="text" placeholder="price">
        <available-cars>
            <newText>available </newText>
            <input name="available" type="checkbox" placeholder="available" value="1">
        </available-cars>

<!--        <textarea name="description" rows=5 placeholder="description"></textarea>-->

        <input type="file" name="file"/><br/>
        <button type="submit">send</button>
    </form>
    </section>
</div>
</body>