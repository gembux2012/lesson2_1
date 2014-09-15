<?php


class newsControler extends AControl
{
    private $data;
    private $bd;

    private function viewALL(){

        $view=new View();
        $view->data=$this->data;
        $view->display();

    }
    public function findAll()
    {   
        $this->data =newsModel::findALL();
        $view=new View();
        //$view=new viewTWIG();// пытался вывести через twig не получилось
        $view->data=$this->data;
        $view->display();
       // $this->viewALL();
    }

    public function  findID(){
        $this->data =newsModel::findID($_POST['strnum']);
        $this->viewALL();

    }

    public function insertREC()
    {
        $rec=new newsModel();
        $rec->name=$_POST['namestr'];//это как бы ни к чему все равно( в абстрактной модели мы не знаем сколько полей будет
        newsModel::$record=array('name'=>$_POST['namestr']);// можно пердать любое количество полей
        $rec->Save();
        header("Location: http://localhost/lesson2_1/index.php");
    }

    public function deleteREC()
    {
        newsModel::$where=array('where_field'=>'num','where_condition'=>$_POST['num']);
        newsModel::deleteREC();
        header("Location: http://localhost/lesson2_1/index.php");
    }

    public function modifyREC()
    {
        $rec =newsModel::findID($_POST['num']);
        $rec->name=$_POST['newname'];
        // далее для отвязки от AbsractModel ничего лучше не придумал
        newsModel::$record=array('name'=>$_POST['newname']);// тут можно передать любое количесво полей
        newsModel::$where=array('where_field'=>'num','where_condition'=>$_POST['num']);//любое условие
        $rec->Save();
        header("Location: http://localhost/lesson2_1/index.php");
    }


}