<!DOCTYPE html>
<?php include(dirname(__DIR__).'/Common/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="../Public/css/cart.css"> 
</head>
<body id="main">
<?php include(dirname(__DIR__).'/Common/menu.php'); ?>
<?php include(dirname(__DIR__).'/Common/header.php'); ?>

    <div class="container">
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr >
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;"width="5%">Code</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="14%">Unit Price</th>
                <th style="text-align:right;" width="10%">Price</th>
                <th style="text-align:center; " width="5%">Remove</th>
            </tr>
            <?php
            $counter=-1;
            foreach($products as $product):
            $counter++;
            ?>
            <form class="form1" action="?page=cart" method="POST">
                <tr class="table_style" id="productRecord">
                    <td><img src=<?= $product->getImage() ?> class="cart-item-image" /><?= $product->getName() ?></td>
                    <td><?= $product->getId() ?></td>
                    <td style="text-align:right;"><?= $_SESSION['quantity'][$counter]?></td>
                    <td  style="text-align:right;"><?= $product->getPrice() ?></td>
                    <td  style="text-align:right;"><?= $product->getPrice()*$_SESSION['quantity'][$counter] ?></td>
                    <input type="hidden" id="cartID" name="productID" value=<?=$product->getId()?>>
                    <td><button class="button1"type="submit" name="submit" value="removeFromCart"><i class="fas fa-trash"></i></button></td>
                    
                </tr>
                </form>
            <?php endforeach?>
            </tbody>
        </table>
    </div>
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
</body>
</html>