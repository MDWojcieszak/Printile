<!DOCTYPE html>
    <link rel="stylesheet" type="text/css" href="../Public/css/cart.css"> 
</head>
<body id="main">
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
                    <select name="infil">
                        <option value="0">UNCHANGE</option>
                        <option value="PREPARING">PREPARING</option>
                        <option value="PROCESSED">PROCESSED</option>
                        <option value="READY">READY</option>
                    </select>
                    </td>
                    <td  style="text-align:right;"><?= $order->getParametersID()?></td>
                    <td  style="text-align:right;"><?= $order->getPrice()?></td>
                    <td  style="text-align:right;"><input type="text"></td>
                    <td><button class="button1"type="submit" name="submit" value="removeFromCart"><i class="fas fa-trash"></i></button></td>
                    
                </tr>
                </form>
            <?php endforeach?>
            </tbody>
        </table>
    </div>
</body>
</html>