<?php
/*
 * переделано предъидущее д.з под dbo с ловлей исключений и с учетом того что подстановка имен
 * таблицы не работает
 */


function __autoload($class)
{
    require __DIR__ . '/classes/' . $class . '.php';
}

if(!isset($_GET['ctrl'])){

    $control='newsControler';
} else{

    $control=$_GET['ctrl'];
}

$ctrl = new $control();

if(!isset($_GET['action'])){

    $action='findALL';
} else{

    $action=$_GET['action'];
}

$ctrl->action($action);





