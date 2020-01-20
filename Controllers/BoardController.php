<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Post.php';

class BoardController extends AppController {

    public function main()
    {   
        $this->render('board');
    }
}