<!DOCTYPE html>
<?php include(dirname(__DIR__).'/Common/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="../Public/css/cart.css"> 
</head>
<body id="main">
    <form action="?page=admin-panel" method="POST">
    <button class="logo" type="submit" name="submit" value="back">
                <img src="../Public/img/logo.svg">
            </button>
    </form>
    <div class="container">
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr >
                <th style="text-align:left;"width="5%">ID</th>
                <th style="text-align:left;"width="5%">USER ID</th>
                <th style="text-align:right;" width="5%">ORDER DATE</th>
                <th style="text-align:right;" width="10%">STATUS</th>
                <th style="text-align:center;" width="10%">NEW STATUS</th>
                <th style="text-align:right;" width="10%">PARAMETERS ID</th>
                <th style="text-align:center; " width="10%">PRICE</th>
                <th style="text-align:center; " width="10%">NEW PRICE</th>
                <th style="text-align:center; " width="5%">CHANGE</th>
            </tr>
            <?php
            $counter=-1;
            foreach($orders as $order):
            $counter++;
            ?>
            <form class="admin" action="?page=admin-panel" method="POST">
                <tr class="table_style" id="productRecord">
                    <td><?= $order->getID() ?></td>
                    <td style="text-align:right;"><?= $order->getUserID()?></td>
                    <td  style="text-align:right;"><?= $order->getDate() ?></td>
                    <td  style="text-align:right;"><?= $order->getstatus()?></td>
                    <td  style="text-align:center;"class="box" >
                    <select name="status">
                        <option value="0">UNCHANGE</option>
                        <option value="PREPARING">PREPARING</option>
                        <option value="PROCESSED">PROCESSED</option>
                        <option value="READY">READY</option>
                    </select>
                    </td>
                    <td  style="text-align:right;"><?= $order->getParametersID()?></td>
                    <td  style="text-align:right;"><?= $order->getPrice()?></td>
                    <td  style="text-align:right;"><input type="text" name="price"></td>
                    <input type="hidden" name="orderID" value=<?=$order->getID()?>>
                    <td><button type="submit" name="submit" value="update"><i class="fas fa-edit"></i></button></td>
                    
                </tr>
                </form>
            <?php endforeach?>
            </tbody>
        </table>


        
    </div>
</body>
</html>