<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Repository//OrdersRepository.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class AdminController extends AppController{

    public function adminPanel()
    {

        $ordersRepository = new OrdersRepository();
        $orders=$ordersRepository->getOrders();
        $data = array();
        foreach($orders as $order)
        {
            if($order->getStatus() != 'ORDERED !'&&$order->getStatus() != 'PRINTING'&&$order->getStatus() != 'SHIPPED'&&$order->getStatus() != 'FINISH')
            {
                array_push($data,$order);
            }
        }

        if($this->isPost())
        {
            if($_POST['submit'] == 'update'){
                
                $db = new Database();
                $orderID = $_POST['orderID'];
                $status = $_POST['status'];
                $price = $_POST['price'];
                $con = $db->connect();
                if($status != '0')
                {
                    $res = $con->prepare("UPDATE orders SET status = '$status' WHERE id = '$orderID';");
                    $res->execute();
                }
                if($price > 0)
                {
                    $res = $con->prepare("UPDATE orders SET price = '$price' WHERE id = '$orderID';");
                    $res->execute();
                }

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=admin-panel");
                return;
            }
            if($_POST['submit'] == 'back')
            {
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
                return;
            }
        }
        
        $this->render('adminPanel', ['orders' => $data]);
    }
    public function adminPanelOrdered()
    {
        $ordersRepository = new OrdersRepository();
        $orders=$ordersRepository->getOrders();
        $data = array();
        foreach($orders as $order)
        {
            if($order->getStatus() == 'ORDERED !'||$order->getStatus() == 'PRINTING'||$order->getStatus() == 'SHIPPED')
            {
                array_push($data,$order);
            }
        }
        if($this->isPost())
        {
            if($_POST['submit'] == 'update'){
                
                $db = new Database();
                $orderID = $_POST['orderID'];
                $status = $_POST['status'];
                $con = $db->connect();
                if($status != '0')
                {
                    $res = $con->prepare("UPDATE orders SET status = '$status' WHERE id = '$orderID';");
                    $res->execute();
                }
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=admin-panel-ordered");
                return;
            }
            if($_POST['submit'] == 'back')
            {
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
                return;
            }
        }
        
        $this->render('adminPanelOrdered', ['orders' => $data]);
    }
    public function adminPanelUsers()
    {
        $userRepository = new UserRepository();
        $data=$userRepository->getUsers();
        if($this->isPost())
        {
            if($_POST['submit'] == 'update'){
                
                $db = new Database();
                $userID = $_POST['userID'];
                $role = $_POST['role'];
                $con = $db->connect();
                if($role != '0')
                {
                    $res = $con->prepare("UPDATE users SET roleID = '$role' WHERE id = '$userID';");
                    $res->execute();
                }
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=admin-panel-users");
                return;
            }
            if($_POST['submit'] == 'back')
            {
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
                return;
            }
        }
        
        $this->render('adminPanelUsers', ['users' => $data]);
    }
}