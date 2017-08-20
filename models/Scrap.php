<?php

namespace Scraps;

require_once $_SERVER['DOCUMENT_ROOT'] . '/components/Db.php';

use PDO;
use PDOException;

class Scrap
{
    public static function getAllScraps($userId)
    {
        try {
            $connection = Db::getConnection();

            $stmt = $connection->prepare("SELECT * FROM Scraps WHERE user_id = :userId");
            $stmt->execute([':userId' => $userId]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function getScrapById($scrapId)
    {
        try {
            $connection = Db::getConnection();

            $stmt = $connection->prepare("SELECT * FROM Scraps WHERE id = :scrapId");
            $stmt->execute([':scrapId' => $scrapId]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function editScrap($id, $title, $text)
    {
        try {
            $connection = Db::getConnection();

            $query = "UPDATE Scraps SET title = :title, text = :text WHERE id = :id";
            $stmt = $connection->prepare($query);
            $stmt->execute([
               ':title' => trim($title),
               ':text' => $text,
               ':id' => $id
            ]);

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function createScrap($title, $text, $userId)
    {
        try {
            $connection = Db::getConnection();

            $query = "INSERT INTO Scraps (text, user_id, title) VALUES (:text, :userId, :title)";
            
            $stmt = $connection->prepare($query);
            $stmt->execute([
                ':text' => trim($text),
                ':userId' => $userId,
                ':title' => $title
            ]);

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function deleteScrap($scrapId)
    {
        try {
            $connection = Db::getConnection();

            $query = "DELETE FROM Scraps WHERE id = :scrapId";

            $stmt = $connection->prepare($query);
            $stmt->execute([
                ':scrapId' => $scrapId
            ]);

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
}
