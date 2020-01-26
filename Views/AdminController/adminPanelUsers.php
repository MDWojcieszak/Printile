<!DOCTYPE html>
<?php
    if($_SESSION['role'] != 1) {
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=no-permission");
    }
?>
<?php include(dirname(__DIR__).'/Common/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="../Public/css/cart.css"> 
</head>
<body id="main">
    <form action="?page=admin-panel-users" method="POST">
    <button class="logo" type="submit" name="submit" value="back">
                <img src="../Public/img/logo.svg">
            </button>
    <div class="container">
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr >
                <th style="text-align:left;"width="5%">USER ID</th>
                <th style="text-align:right;" width="10%">EMAIL</th>
                <th style="text-align:center;" width="10%">NAME</th>
                <th style="text-align:right;" width="10%">SURNAME</th>
                <th style="text-align:center; " width="10%">ROLE</th>
                <th style="text-align:center; " width="5%">NEW ROLE</th>
                <th style="text-align:center; " width="5%">CHANGE</th>
            </tr>
            <?php
            $counter=-1;
            foreach($users as $user):
            $counter++;
            ?>
            <form class="admin" action="?page=admin-panel-users" method="POST">
                <tr class="table_style" id="productRecord">
                    <td style="text-align:right;"><?= $user->getId()?></td>
                    <td  style="text-align:right;"><?= $user->getEmail() ?></td>
                    <td  style="text-align:right;"><?= $user->getName()?></td>
                    <td  style="text-align:right;"><?= $user->getSurname()?></td>
                    <td  style="text-align:right;"><?php 
                        $role = $user->getRole();
                        if($role == 1) echo 'ADMIN';
                        else if($role == 2) echo 'USER PREMIUM';
                        else echo 'USER';
                    ?></td>
                    <td  style="text-align:center;"class="box" >
                    <select name="role">
                        <option value="0">UNCHANGE</option>
                        <option value="1">ADMIN</option>
                        <option value="2">USER PREMIUM</option>
                        <option value="3">USER</option>
                    </select>
                    </td>
                    <input type="hidden" name="userID" value=<?=$user->getId()?>>
                    <td><button type="submit" name="submit" value="update"><i class="fas fa-edit"></i></button></td>
                    
                </tr>
                </form>
            <?php endforeach?>
            </tbody>
        </table>
        </form>


        
    </div>
</body>
</html>