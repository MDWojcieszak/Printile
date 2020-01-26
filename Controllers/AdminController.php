<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Repository//OrdersRepository.php';

class AdminController extends AppController{

    public function admin_panel()
    {

        $ordersRepository = new OrdersRepository();
        $data=array();
        for($i=1;$i<20;$i++)
        {
            $element = $ordersRepository->getOrder($i);
            if(isset($element))
            {
                array_push($data,$element);
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
}