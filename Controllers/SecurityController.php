<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class SecurityController extends AppController {

    public function login()
    {   
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            if ($_POST['submit'] == 'register')
            {
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=register");
                return;
            }
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = $userRepository->getUser($email);

                if (!$user) {
                    $this->render('login', ['messages' => ['User with this email not exist!']]);
                    return;
                }
                $passHash = $user->getPassword();
                $isValid = password_verify($password, $passHash);
                if (!$isValid) {
                    $this->render('login', ['messages' => ['Wrong password!']]);
                    return;
                }

                $_SESSION["id"] = $user->getEmail();
                $_SESSION["role"] = $user->getRole();

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=board");
                return;
            
            
        }

        $this->render('login');
    }
    public function register()
    {
        $userRepository = new UserRepository();
        if ($this->isPost()){
            if($_POST['submit'] == 'register')
            {
                $message = array([]);
                $name = $_POST['name'];
                if(strlen($name) == 0)
                    array_push($message,"name","Please enter name!");
                else if(strlen($name) <= 3)
                    array_push($message,"name","The given name is too short!");
                $surname = $_POST['surname'];
                if(strlen($surname) == 0)
                    array_push($message,"surname","Please enter surname!");
                else if(strlen($surname) <= 3)
                    array_push($message,"surname","The given surname is too short!");
                $email = $_POST['email'];
                $user = $userRepository->getUser($email);
                if(strlen($email) == 0)
                    array_push($message,"email","Please enter email!");
                else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    array_push($message,"email","Incorrect email!");
                }
                else if($user)
                {
                    array_push($message,"email","User with this email already exists!");
                }
                $password = $_POST['password'];
                if(strlen($password) == 0)
                    array_push($message,"password","Please enter password!");
                else if(strlen($password) <= 4)
                    array_push($message,"password","Password must have at least 5 characters!");
                if(count($message) > 1)
                {
                    $this->render('register',['messages' =>array_values($message)]);
                    return;
                }
                else
                {
                    $db = new Database();
                    $con = $db->connect();    

                    $res = $con->prepare("SELECT * FROM users WHERE email='$email'");
                    $res->execute();
                    $res = $res->fetchAll(PDO::FETCH_ASSOC);
                    $passHash = password_hash($password, PASSWORD_BCRYPT,array("cost" => 12));
                    $res = $con->prepare("INSERT INTO users VALUES (NULL, '$name' ,'$surname', '$email', '$passHash');");
                    $res->execute();
                    $this->render('login', ['messages' => ['You have been registered successfully!']]);
                    return;
                }
                $user = $userRepository->getUser($email);
            }
            if($_POST['submit'] == 'back'){
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=login");
            }
        }

        $this->render('register');
    }
    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('login', ['messages' => ['You have been successfully logged out!']]);
    }
}