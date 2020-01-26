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
                <th style="text-align:left;"width="5%">ID</th>
                <th style="text-align:right;" width="5%">ORDER DATE</th>
                <th style="text-align:right;" width="10%">STATUS</th>
                <th style="text-align:right;" width="10%">PARAMETERS ID</th>
                <th style="text-align:center; " width="10%">PRICE</th>
                <th style="text-align:center; " width="5%">Add To Cart</th>
            </tr>
            <?php
            $counter=-1;
            foreach($orders as $order):
            $counter++;
            ?>
            <form class="admin" action="?page=ordersPanel" method="POST">
                <tr class="table_style" id="productRecord">
                    <td><?= $order->getID() ?></td>
                    <td  style="text-align:right;"><?= $order->getDate() ?></td>
                    <td  style="text-align:right;"><?= $order->getstatus()?></td>
                    <td  style="text-align:right;"><?= $order->getParametersID()?></td>
                    <td  style="text-align:right;"><?= $order->getPrice()?></td>
                    <input type="hidden" name="orderID" value=<?=$order->getID()?>>
                    <?php if($order->getStatus()== 'READY'){?>
                    <td><button type="submit" name="submit" value="update"><i class="fas fa-cart-plus"></i></button></td>
                    <?php } 
                    ?>
                    
                </tr>
                </form>
            <?php endforeach?>
            </tbody>
        </table>
        </form>


    </div>
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>
</body>
</html>