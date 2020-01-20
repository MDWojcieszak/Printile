<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';

class SecurityController extends AppController {

    public function login()
    {   
        $user = new User('admin', 'admin', 'Johnny', 'Snow');

        if ($this->isPost()) {
            if($_POST['submit'] == 'login')
            {
                $email = $_POST['email'];
                $password = $_POST['password'];

                if ($user->getEmail() !== $email) {
                    $this->render('login', ['messages' => ['User with this email not exist!']]);
                    return;
                }

                if ($user->getPassword() !== $password) {
                    $this->render('login', ['messages' => ['Wrong password!']]);
                    return;
                }
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
            }
            if ($_POST['submit'] == 'register')
            {
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=register");
            }
            
        }

        $this->render('login');
    }
    public function register()
    {
        if ($this->isPost()){
            if($_POST[action] == 'back'){
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=login");
            }
            if($_POST[action] == 'register'){
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=login");
            }
        }

        $this->render('register');
    }
}