<?php

namespace Scraps;

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Scrap.php';

class ScrapsController
{
    public function index()
    {
        $userId = $_SESSION['user'];
        $scrap = new Scrap();

        $scrapsAll =  $scrap->getAllScraps($userId);

        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/scraps/scraps.php';
    }

    public function view($scrapId)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ');
        }

        $scrap = new Scrap();
        $scrapOne = $scrap->getScrapById($scrapId);

        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/scraps/scrap.php';
    }
}