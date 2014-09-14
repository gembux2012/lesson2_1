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
        $view=new viewTWIG();
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
        newsModel::$record=array('name'=>$_POST['namestr']);
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
        $rec=new newsModel();
        $rec->isNew=false;
        newsModel::$record=array('name'=>$_POST['newname']);
        newsModel::$where=array('where_field'=>'num','where_condition'=>$_POST['num']);
        $rec->Save();
        header("Location: http://localhost/lesson2_1/index.php");
    }


}