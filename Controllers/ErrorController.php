<?php

require_once 'AppController.php';

class ErrorController extends AppController {

    public function error()
    {   
        if($this->isPost())
        {
            if($_POST[submit] == 'main'){
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
            }
        }
        $this->render('error');
    }
}