<?php

class Bd {
    private $t_url;
    private $t_user;
    private $t_password;
    private $table;
    private $link;

    public function __construct($url, $user, $password, $table)
    {
        $this->t_url = $url;
        $this->t_user=$user;
        $this->t_password=$password;
        $this->table=$table;
        $this->my_link();
    }

    public function my_link(){

        $this->link=mysql_connect($this->t_url, $this->t_user, $this->t_password) or die('Нет линка');
        $this->s_db();

    }

	//выбираем базу
    public function s_db()
    {
        mysql_select_db($this->table, $this->link) or die ('не могу выбрать таблицу');

    }


    // выбираем строки либо одну либо все
    public  function my_sel($where=0)
    {
        $cursor = array();
        if ($where == 0) {
            $query = (mysql_query(" SELECT * FROM  articel"));
        } else {
            $query = sprintf(" SELECT * FROM  articel WHERE num='%s'", mysql_real_escape_string($where));
            $query = mysql_query($query);
        }
        while ($row = mysql_fetch_assoc($query)) {
            $cursor[] = $row;
        }
        return $cursor;
    }

    //вставляем строку
    public function my_insert($value)
    {
        $query = sprintf("INSERT INTO articel (name) VALUES('%s')", mysql_real_escape_string($value));
        if (!mysql_query($query)){
            echo mysql_error();
            exit;
        }
    }

    //удаляем строку
    function my_delete($value)
    {
        $query = sprintf("DELETE FROM articel WHERE num=('%s')", mysql_real_escape_string($value));
        if (!mysql_query($query)){
            echo mysql_error();
            exit;
        }
    }

    // модифицируем строку
    function my_modify($name, $num)
    {
        $query = sprintf("UPDATE articel SET name='%s' WHERE num=('%s')", mysql_real_escape_string($name), mysql_real_escape_string($num));
        if (!mysql_query($query)){
            echo mysql_error();
            exit;
        }
    }
}