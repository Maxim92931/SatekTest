<?php

namespace Scraps;

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/User.php';

class UserController
{
    public function authorization()
    {
        if (isset($_POST['login'])) {
            $user = new User();

            $login = $_POST['login'];
            $password = $_POST['password'];

            $result = $user->authorization($login, $password);
        } else {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/index.php';
        }
    }

    public function reg()
    {
        $isReg = true;

        if (isset($_POST['login'])) {
            $user = new User;

            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'checkLogin':
                        $result = $user->isFreeLogin($_POST['login']);
                        echo $result;
                }
            } else {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $passwordRetry = $_POST['passwordRetry'];

                $result = $user->reg($login, $password, $passwordRetry);

                if ($result) {
                    echo '';
                } else {
                    echo 'При регистрации произошла ошибка';
                }
            }
        } else {
            /*$view = new View();
            $data['isReg'] = true;
            $view->render('reg', $data);*/
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/reg.php';
        }
    }
}