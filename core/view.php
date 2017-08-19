<?php

namespace Scraps;

class View
{
    public function render($fileName, array $data)
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/' . $fileName . '.php';
    }
}