<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

session_start();

$action = "recherche";


