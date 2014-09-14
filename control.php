<?php
header('Content-Type: text/html; charset=UTF-8');
include 'bd.php';
//include 'index.php';
/*
сдесь работать не будет
объект db уже создан в index.php и если его подклюяить то будет создание уже созданного объекта
если только делать функцию возвращающую обьект в отдельном файле, но это громоздко и наверное не правильно
*/

if(!$link=$bd->my_link()){
    echo ' Нет линка';
    exit;
}

if(!$bd->s_db($link)){
    echo 'Не могу подключиться к базе';
    exit;
}

//вставка
if(isset($_POST['text1'])){
    $bd->my_insert($_POST['text1']);
}

//выбираем конкретную строку
if(isset($_POST['text2']) && is_numeric($_POST['text2'])){
    $cursor=$bd->my_sel($_POST['text2']);
    $name=array();
    foreach($cursor as $name){
        foreach($name as $value){
           echo $str=$str.$value;
        }
    }
} else {
    header("Location: http://localhost/lesson2_1/index.php"); // не могу вернуть ничего в форму поэтому просто обновляем
}

// удаляем строку
if(isset($_POST['text3']) && is_numeric($_POST['text3'])){
   $bd->my_delete($_POST['text3']);
} else{
    header("Location: http://localhost/lesson2_1/index.php");
}

// модифицируем строку
if(isset($_POST['text4']) && is_numeric($_POST['text5'])){
   $bd-> my_modify($_POST['text4'],$_POST['text5']);
} else{
    header("Location: http://localhost/lesson2_1/index.php");
}