<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Post.php';

class BoardController extends AppController {

    public function main()
    {   
        if($this->isPost())
        {
            if($_POST[submit] == 'main'){
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
            }
            if($_POST[submit] == 'logout'){
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=login");
                
            }
        }
        $this->render('board');
    }
}