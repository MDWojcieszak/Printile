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
        
        $this->render('adminPanel', ['orders' => $data]);
    }
}