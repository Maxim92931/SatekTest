<?php

namespace Scraps;

require_once $_SERVER['DOCUMENT_ROOT'] . '/components/Db.php';
use PDOException;

class User
{
    public function authorization($login, $password)
    {
        try {
            $connection = Db::getConnection();

            $stmt = $connection->prepare("SELECT password FROM Users WHERE login = :login");
            $stmt->execute([':login'=> $login]);

            if ($pass = $stmt->fetch()[0]) {
                if (password_verify($password, $pass)) {
                    return '';
                } else {
                    return 'Неверный пароль';
                }
            } else {
                return 'Неверный логин';
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function reg($login, $password, $passwordRetry)
    {
        try {
            if ($password != $passwordRetry) {
                return;
            }

            $connection = Db::getConnection();
            $query = "INSERT INTO Users (login, password) VALUES (:login, :password)";
            $stmt = $connection->prepare($query);
            $res = $stmt->execute([
                ':login' => $login,
                ':password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            return $res;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function isFreeLogin($login) : bool
    {
        try {
            $connection = Db::getConnection();

            $query = "SELECT COUNT(*) FROM Users WHERE login = :login";
            $stmt = $connection->prepare($query);
            $stmt->execute([':login' => $login]);

            if ($stmt->fetch()[0] > 0) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
}