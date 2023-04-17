<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . './../../');
$dotenv->safeLoad();

define('TITULO', $_ENV['TITULO']);
define('CARPETA_CONTENIDOS', $_ENV['CARPETA_CONTENIDOS'].'/');
define('CSS_PROPIO', $_ENV['CSS_PROPIO']);
