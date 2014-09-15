<?php

require_once __DIR__.'/vendor/twig/twig/lib/Twig/Autoloader.php';

class viewTWIG {

    private $template;
    public $data;

    public  function __construct(){

        Twig_Autoloader::register();

        try
        {
            $loader = new Twig_Loader_Filesystem(realpath('./view'));
            $twig = new Twig_Environment($loader,array('debug' => true));
            $this->template = $twig->loadTemplate('test.html');
        } catch
        (Twig_Error $e) {
            die ('ERROR: ' . $e->getMessage());

        }
    }

    public function display(){

        $data=array();
        foreach($this->data as $el){
            $data['name'][]=$el->name;
            $data['num'][]=$el->num;
        }

        $tmp=array('num'=>1,'name'=>'sdfgasdgas' );
       try{
           echo $this->template->render(array('d'=>$tmp));
       } catch (Twig_Error $e) {

           die ('ERROR: ' . $e->getMessage());

       }




        }


}