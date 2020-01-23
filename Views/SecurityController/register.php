<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fbbf500712.js" crossorigin="anonymous"></script>
    <title>picmash</title>
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
        <form action="?page=register" method="POST">
            <div class="message">
            <?php
                if(isset($messages)){
                    $key=array_search('name',$messages);
                    if( $key !=NULL)
                        echo $messages[$key+1];
                }
                ?>
                </div>
            <input name="name" type="text" placeholder="name">
            <div class="message">
            <?php
                    if(isset($messages)){
                        $key=array_search('surname',$messages);
                        if( $key !=NULL)
                            echo $messages[$key+1];
                    }
                ?>
                </div>
            <input name="surname" type="text" placeholder="surname">
            <div class="message">
            <?php
                    if(isset($messages)){
                        $key=array_search('email',$messages);
                        if( $key !=NULL)
                            echo $messages[$key+1];
                    }
                ?>
                </div>
            <input name="email" type="text" placeholder="email@email.com">
            <div class="message">
            <?php
                    if(isset($messages)){
                        $key=array_search('password',$messages);
                        if( $key !=NULL)
                            echo $messages[$key+1];
                    }
                ?>
                </div>
            <input name="password" type="password" placeholder="password">
            <button type="submit"name="submit" value="register">
                REGISTER
                <img src="../Public/img/arrow.svg">
            </button>
            <button type="submit" class="button2">
                <img src="../Public/img/google.svg"class="iconStyle">
                Register with Google
                <img src="../Public/img/arrow.svg" class="iconStyle2">
            </button>
            <button type="submit" class="button2">
                <img src="../Public/img/facebook.svg"class="iconStyle">
                Register with Facebook
                <img src="../Public/img/arrow.svg" class="iconStyle2">
            </button>
            <button type="submit" class="button2">
                <img src="../Public/img/twitter.svg"class="iconStyle">
                Register with Twitter
                <img src="../Public/img/arrow.svg" class="iconStyle2">
            </button>
            <button type="submit" name="submit" value="back" class="button3">
                BACK </button>
        </form>
    </div>
    <div class="footer">
    FOOTER
    </div>
</body>
</html>