<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../Public/css/board.css" />
    <link rel="stylesheet" type="text/css" href="../Public/css/heather.css"> 
    <link rel="stylesheet" type="text/css" href="../Public/css/menu.css"> 
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fbbf500712.js" crossorigin="anonymous"></script>
    <title>Printile</title>
</head>
<body>
<div id="main">
<?php include(dirname(__DIR__).'/Common/menu.php'); ?>
<?php include(dirname(__DIR__).'/Common/header.php'); ?>
    <div class="container">
        <?php foreach($products as $product): ?>
            <div class="element">
                <div class="picture">
                    <img src="../Public/img/vase.jpg">
                </div>
                <div class="dd"><div class="opinion"><i class="far fa-star"></i><a><?= $product->getOpinion() ?></a></div></div>
                <div class="description">
                    <b><?= $product->getName() ?></b>
                    <a><?= $product->getDescription() ?></a>
                    </div>
                <div class="price"><?=$product->getPrice() ?> $</div>    
                <button class="button1">Add to Cart<img src="../Public/img/arrow.svg"></button>
                <button class="button2">BUY NOW</button>
                
            </div>
        <?php endforeach ?>
    </div>
    <div class="footer">
    </div>
</div>
</body>
</html>