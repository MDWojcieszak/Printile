<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Product.php';
require_once __DIR__.'//..//Repository//ProductsRepository.php';


class BoardController extends AppController {

    public function main()
    {   
        $productsRepository = new ProductsRepository();
        $data=array($productsRepository->getProduct(1),$productsRepository->getProduct(2),$productsRepository->getProduct(3));
        
        if($this->isPost())
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
                header("Location: {$url}?page=error");
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
        }
        $this->render('board', ['products' => $data]);
    }
}