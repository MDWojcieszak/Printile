<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Public/css/header.css"> 
    <link rel="stylesheet" type="text/css" href="../Public/css/menu.css"> 
    <link rel="stylesheet" type="text/css" href="../Public/css/cart.css"> 
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fbbf500712.js" crossorigin="anonymous"></script>
    <title>Printile</title>
</head>
<body>
<div id="main">
<?php include(dirname(__DIR__).'/Common/menu.php'); ?>
<?php include(dirname(__DIR__).'/Common/header.php'); ?>
<span onclick="closeNav()">

<div class="container">
    <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
        <tr >
            <th style="text-align:left;">Name</th>
            <th style="text-align:left;"width="5%">Code</th>
            <th style="text-align:right;" width="5%">Quantity</th>
            <th style="text-align:right;" width="10%">Unit Price</th>
            <th style="text-align:right;" width="10%">Price</th>
            <th style="text-align:center; " width="5%">Remove</th>
        </tr>
        <?php 
         $counter=-1;
        foreach($products as $product):
        $counter++;
        ?>
        <form class="form1" action="?page=cart" method="POST">
            <tr class="table_style">
				<td><img src=<?= $product->getImage() ?> class="cart-item-image" /><?= $product->getName() ?></td>
				<td><?= $product->getId() ?></td>
				<td style="text-align:right;"><?= $_SESSION['quantity'][$counter]?></td>
				<td  style="text-align:right;"><?= $product->getPrice() ?></td>
                <td  style="text-align:right;"><?= $product->getPrice()*$_SESSION['quantity'][$counter] ?></td>
                <input type="hidden" name="productID" value=<?=$product->getId()?>>
                <td><button class="button1"type="submit" name="submit" value="removeFromCart"><i class="fas fa-trash"></i></button></td>
				
            </tr>
            </form>
        <?php endforeach?>
</div>

</span>
</div>
</body>
</html>