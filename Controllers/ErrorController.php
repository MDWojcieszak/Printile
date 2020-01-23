<?php

require_once 'AppController.php';

class ErrorController extends AppController {

    public function error()
    {   
        if($this->isPost())
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
        }
        $this->render('error');
    }

    public function sessionTimedOut()
    {
        if($this->isPost())
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=login");
        }
        $this->render("sessionTimedOut");
    }
}