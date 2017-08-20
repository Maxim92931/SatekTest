<?php

return array(
    //'' => 'user/authorization',
    'scraps/([0-9]+)' => 'scraps/view/$1',
    'scraps/new' => 'scraps/createScrap',
    'logout' => 'user/logout',
    'reg' => 'user/reg',
    'scraps' => 'scraps/index'
);
