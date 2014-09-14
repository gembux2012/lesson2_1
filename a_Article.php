<?php


abstract class a_Article {

  protected   $a_num;
  protected  $a_name;

  abstract function get_Article($num, $name);
}

class NewArticle extends a_Article{

    function get_Article($num, $name)
    {
        $this->a_num=$num;
        $this->a_name=$name;
    }
}

// привязать к классу бд уже не успеваю я только сейчас запись урока получил