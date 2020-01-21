<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../Public/css/board.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fbbf500712.js" crossorigin="anonymous"></script>
    <title>Printile</title>
</head>
<body>
    <form class="header" action="?page=board" method="POST">
        <div class="uppHeader">
            <button class="style2" type="submit" name="submit" value="cart">
                <i class="fas fa-shopping-cart"></i> Cart(0)</button>
            <button  type="submit" name="submit" value="logout">
                <i class="far fa-user"></i> Logout</button>
        </div>
        <div class="line1"></div>
        <div class="underHeader">
            <button class="logo" type="submit" name="submit" value="main">
                <img src="../Public/img/logo.svg">
            </button>
            <div class="menu">
                <button class="fas fa-bars fa-2x" type="submit" name="submit"value="error"></button>
            </div>
            <div class="options">
                <div class="dropdown">
                    <button class="dropbtn" type="submit" name="submit" value="products">PRODUCTS</button>
                    <div class="dropdown-content">
                        <button type="submit" name="submit" value="error">POPULAR</button>
                        <button type="submit" name="submit" value="error">3D FILES</button>
                        <button type="submit" name="submit" value="error">3D MODELS</button>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn" type="submit" name="submit" value="error">3D DESIGN</button>
                    <div class="dropdown-content">
                        <button type="submit" name="submit" value="error">READY TO DOWNLOAD</button>
                        <button type="submit" name="submit" value="error">ORDER 3D DESIGN</button>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn" type="submit" name="submit" value="error">ORDER PRINT</button>
                    <div class="dropdown-content">
                        <button type="submit" name="submit" value="error">ORDER STANDARD</button>
                        <button type="submit" name="submit" value="error">ORDER PREMIUM</button>
                        <button type="submit" name="submit" value="error">ORDER BY CONTACT FORM</button>
                    </div>
                </div>
            </div>
            <div class="search">
                <input name="search" type="text" placeholder="Search...">
                <button type="submit" name="submit" value="search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

    </form>
    <div class="container">
        <div class="hiddenMenu">

        </div>
        <div class="element">
            <img src="../Public/img/vase.jpg">
            <div class="opinion"><i class="far fa-star"></i><a>4.8</a></div>
        </div>
    </div>
    <div class="footer">
    </div>
</body>
</html>