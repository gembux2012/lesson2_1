<?php

abstract class AbstractModel
{
    static private $dsn;
    public  $isNew=false;
    static  public $record=array();
    static public $where=array();

    public function __construct(){

        $this->isNew=true;
    }

    static public function getDBH()
    {
        $ini = parse_ini_file('\..\dsn.ini');
        self::$dsn =$ini['server'].':dbname='.$ini['dbname'].';host='.$ini['host'];
        try {
            return new Pdo(self::$dsn, 'root', '');
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }



    public static function findALL()
    {
        $sql = "SELECT * FROM " . static::$table;
        try {
            $sth = self::getDBH()->prepare($sql);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
            $data = $sth->fetchAll();

            foreach ($data as  $el) {
                $el->isNew = false;
            }
            return $data;
        }  catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    static public function findID($where)
    {
        $sql = "SELECT * FROM ". static::$table." WHERE ".$where;
        try {
            $sth = self::getDBH()->prepare($sql);
            $sth->execute();
            $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
            $data = $sth->fetch();
            $data->isNew = false;
            return $data;
        }  catch (Exception $e) {
            echo $e->getMessage();
        }
    }

     public function Save()
    {
        $set='';
        if($this->isNew){
            $sql  = "INSERT INTO ". static::$table;
            $sql .= " (`".implode("`, `", array_keys(self::$record))."`)";
            $sql .= " VALUES ('".implode("', '", self::$record)."') ";
        } else {
            foreach(self::$record as $key=>$value){
                $set.=$key.'='."'".$value."',";
            }
            $set=rtrim($set,",");
            $sql = "UPDATE ". static::$table." SET ".$set." WHERE ".self::$where['where_field']
                     .'='.self::$where['where_condition'];
        }


        try{
            $sth = self::getDBH()->prepare($sql);
            $sth->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }



    }

    static public function deleteREC()
    {
        $sql = "DELETE FROM ". static::$table." WHERE ".self::$where['where_field']
            .'='.self::$where['where_condition'];
        try{
            $sth = self::getDBH()->prepare($sql);
            $sth->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

    }


}

