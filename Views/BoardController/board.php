<!DOCTYPE html>
<?php include(dirname(__DIR__).'/Common/head.php'); ?>
    <link rel="Stylesheet" type="text/css" href="../Public/css/board.css" />
    <script src="../Public/js/cart.js"></script>
    
</head>
<body id="main">
<?php include(dirname(__DIR__).'/Common/menu.php'); ?>
<?php include(dirname(__DIR__).'/Common/header.php'); ?>
    <div class="container">
        <?php foreach($products as $product): ?>
            <form class="form1" action="?page=board" method="POST">
                <div class="element">
                    <div class="picture">
                        <img src=<?= $product->getImage() ?>>
                    </div>
                    <div class="dd"><div class="opinion"><i class="far fa-star"></i><a><?= $product->getOpinion() ?></a></div></div>
                    <div class="description">
                        <b><?= $product->getName() ?></b>
                        <a><?= $product->getDescription() ?></a>
                        </div>
                    <div class="price"><?=$product->getPrice() ?> $</div>
                    <input type="number" id="quantity" class="quantity" name="quantity" value="1" size="2" />
                    <input type="hidden" id = "cartID" name="productID" value=<?=$product->getId()?>>
                    <button class="button1" type="submit" name="submit" value="addToCart" onclick="addToCart();">Add to Cart<img src="../Public/img/arrow.svg"></button>
                    <button class="button2">BUY NOW</button>
                    
                </div>
            </form>
        <?php endforeach ?>
        </div>
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
</body>
</html>