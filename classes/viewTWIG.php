<?php

require_once __DIR__.'/vendor/twig/twig/lib/Twig/Autoloader.php';

class viewTWIG {

    private $temlate;
    public $data;

    public  function __construct(){

        Twig_Autoloader::register();

        try
        {
            // указывае где хранятся шаблоны
            $loader = new Twig_Loader_Filesystem(__DIR__.'/../view/');

            // инициализируем Twig
            $twig = new Twig_Environment($loader);

            // подгружаем шаблон
            $this->template = $twig->loadTemplate('all.html');
        } catch
        (Exception $e) {

            die ('ERROR: ' . $e->getMessage());

        }
    }


    public function display(){

        $data=array();
        foreach($this->data as $el){
            $data['name']=$el->name;
            $data['num']=$el->num;
        }
        echo $this->template->render(array('d'=>$data));



        }


}