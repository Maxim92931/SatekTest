<?php

namespace Scraps;

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/scrap.php';

class ScrapsController
{
    public function index()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/scraps/myScraps.php';
    }
}