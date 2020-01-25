<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Product.php';
require_once __DIR__.'//..//Repository//ProductsRepository.php';


class BoardController extends AppController {

    public function action()
    {
        if($_POST['submit'] == 'main'){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
            return;
        }
        if($_POST['submit'] == 'logout'){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=logout");
            return;
        }
        if($_POST['submit'] == 'products')
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
            return;
        }
        if($_POST['submit'] == 'error')
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=error");
            return;
        }
        if($_POST['submit'] == 'database')
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}adminer/adminer.php");
            return;
        }
        if($_POST['submit'] == 'cart')
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=cart");
            return;
        }
        if($_POST['submit'] == 'popular')
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=popular");
            return;
        }
        if($_POST['submit'] == 'addToCart')
        {
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
            return;
        }
        if($_POST['submit'] == 'removeFromCart')
        {
            $counter = 0;
            foreach($_SESSION["products"] as $id)
            {
                
                if($id == $_POST['productID'])
                {
                    $_SESSION["total_quantity"] -=$_SESSION["quantity"][$counter];
                    array_splice($_SESSION["quantity"],$counter,1);
                    array_splice($_SESSION["products"],$counter,1);
                    return; 
                }
                $counter++;
            }
            
        }
    }
    public function main()
    {   
        $productsRepository = new ProductsRepository();
        $data=array();
        for($i=1;$i<20;$i++)
        {
            $element = $productsRepository->getProduct($i);
            if(isset($element))
            {
                array_push($data,$element);
            }
        }
        if($this->isPost())
        {
            $this->action();
        }
        $this->render('board', ['products' => $data]);
    }

    public function cart()
    {
        $productsRepository = new ProductsRepository();
        

        if($this->isPost())
        {
            $this->action();
        }
        $data = array();
        foreach($_SESSION["products"] as $id)
        {
            array_push($data,$productsRepository->getProduct(intval($id)));
        }
        $this->render('cart', ['products' => $data]);
    }

    public function popular()
    {
        $productsRepository = new ProductsRepository();
        $data=array();
        for($i=1;$i<20;$i++)
        {
            $element = $productsRepository->getProduct($i);
            if(isset($element) and $element->getOpinion()>4.5)
            {
                array_push($data,$element);
            }
        }
        if($this->isPost())
        {
            $this->action();
        }
        $this->render('board', ['products' => $data]);
    }
}