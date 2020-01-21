<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fbbf500712.js" crossorigin="anonymous"></script>
    <title>Printile</title>
</head>
<body>
    <div class="header">
        HEADER
    </div>
    <div class="container">

        <div class="logo">
            <img src="../Public/img/logo.svg">
            <img src="../Public/img/name.svg">
        </div>
        <form action="?page=login" method="POST">
            <div class="messages">
                <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
            </div>
            <input name="email" type="text" placeholder="email@email.com">
            <input name="password" type="password" placeholder="password">
            <button type="submit" name="submit" value="login">
                CONTINUE
                <img src="../Public/img/arrow.svg">
            </button>
            <button type="button" class="button2" type="submit">
                <img src="../Public/img/google.svg"class="iconStyle">
                Continue with Google
                <img src="../Public/img/arrow.svg" class="iconStyle2">
            </button>
            <button type="submit" name="submit" value="register" class="button3">REGISTER</button>
        </form>
    </div>
    <div class="footer">
    FOOTER
    </div>
</body>
</html>