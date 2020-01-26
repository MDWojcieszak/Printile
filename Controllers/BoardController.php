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
        if($_POST['submit'] == 'contactForm')
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=contactForm");
            return;
        }
        if($_POST['submit'] == 'order')
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=order");
            return;
        }
        if($_POST['submit'] == 'order-premium')
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=order-premium");
            return;
        }
        if($_POST['submit'] == 'admin-panel')
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=admin-panel");
            return;
        }
        if($_POST['submit'] == 'orders-panel')
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=ordersPanel");
            return;
        }
        if($_POST['submit'] == 'admin-panel-ordered')
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=admin-panel-ordered");
            return;
        }
        if($_POST['submit'] == 'request_order')
        {
            $userID = $_SESSION['userID'];
            $date = date("Y/m/d h:i:sa");
            $quality = $_POST['quality'];
            $heigh = $_POST['heigh'];
            $width = $_POST['width'];
            $infil = $_POST['infil'];
            $walls = $_POST['walls'];
            if($_SESSION['role'] <= 2)
                $premium = 'PREMIUM';
            else
                $premium = 'STANDARD';
            
            $db = new Database();
                    $con = $db->connect();
                    
                    $res = $con->prepare("INSERT INTO parameters VALUES (NULL, 'test', '$quality', '$heigh', '$width', '$infil', '$walls', '$premium');");
                    $res->execute();

                    $res = $con->prepare("SELECT * FROM parameters
                    WHERE ID = (
                        SELECT MAX(ID) FROM parameters)");
                    $res->bindParam(':id', $id, PDO::PARAM_STR);
                    $res->execute();

                    $parameters = $res->fetch(PDO::FETCH_ASSOC);
                    $parametersID = $parameters['id'];

                    $res = $con->prepare("INSERT INTO orders VALUES (NULL, '$userID', '$date' ,'PREPARING', '$parametersID', 0);");
                    $res->execute();

                $message=array([]);
                array_push($message,"info","Your order is added to queue!");
                $this->render('order', ['messages' =>array_values($message)]);
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
    public function contactForm()
    {
        if($this->isPost())
        {
            $this->action();
        }
        $this->render('contactForm');
    }

    public function order()
    {
        if($this->isPost())
        {
            $this->action();
        }
        else{
            $message=array([]);
            array_push($message,"type","You ordering a STANDARD print!");
            $this->render('order', ['messages' =>array_values($message)]);
        }
    }
    public function orderPremium()
    {
        if($this->isPost())
        {
            $this->action();
        }
        else{
            $message=array([]);
            array_push($message,"type","You ordering a PREMIUM print!");
            $this->render('order', ['messages' =>array_values($message)]);
        }
    }
    public function ordersPanel()
    {
        $ordersRepository = new OrdersRepository();
        $data=array();
        if($this->isPost())
        {
            if($_POST['submit'] == 'pay')
            {
                $db = new Database();
                $orderID = $_POST['orderID'];
                $con = $db->connect();
                    $res = $con->prepare("UPDATE orders SET status = 'ORDERED !' WHERE id = '$orderID';");
                    $res->execute();
            }
            $this->action();
        }
        for($i=1;$i<20;$i++)
        {
            $element = $ordersRepository->getOrder($i);
            if(isset($element) && $element->getUserID()==$_SESSION['userID'])
            {
                array_push($data,$element);
            }
        }
        $this->render('ordersPanel',['orders' => $data]);
    }
}