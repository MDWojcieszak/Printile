<?php
    $_SESSION["total_quantity"] +=$_POST['quantity'];
    $counter = 0;
    foreach($_SESSION["products"] as $id)
    {
        
        if($id == $_POST['productID'])
        {
            $_SESSION["quantity"][$counter]+=$_POST['quantity'];
            break;
        }
        $counter++;
    }
    if($counter == count($_SESSION["products"])){
        array_push($_SESSION["products"],$_POST['productID']);
        array_push($_SESSION["quantity"],$_POST['quantity']);
    }
?>