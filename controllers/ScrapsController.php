<?php

namespace Scraps;

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Scrap.php';

class ScrapsController
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'editScrap') {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $text = $_POST['text'];

                Scrap::editScrap($id, $title, $text);

                return;
            }
        }

        $userId = $_SESSION['user'];
        $scrapsAll = Scrap::getAllScraps($userId);

        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/scraps/scraps.php';
    }

    public function view($scrapId)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'delete') {
                Scrap::deleteScrap($scrapId);
                return;
            }
        }

        $scrapOne = Scrap::getScrapById($scrapId);

        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/scraps/scrap.php';
    }

    public function createScrap()
    {
        if (!isset($_SESSION['user'])) {
        }


        if (isset($_POST['title'])) {
            $title = $_POST['title'];
            $text = $_POST['text'];
            $userId = $_SESSION['user'];
            Scrap::createScrap($title, $text, $userId);

            return;
        }

        //$userId = $_SESSION['user'];

        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/scraps/newScrap.php';
    }
}