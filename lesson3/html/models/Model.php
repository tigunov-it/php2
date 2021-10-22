<?php
namespace app\models;
use app\engine\Db as Db;
abstract class Model
{
//    protected $db;
    protected $tableName;

//    public function __construct(Db $db)
//    {
//        $this->db = $db;
//    }

    public function getOne($id) {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return Db::getInstance() -> queryOne($sql, ['id'=> $id]);
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->tableName}";
        return Db::getInstance() -> queryAll($sql);
    }

    public function insert() {
       // $sql = "INSERT INTO {$this->tableName} (`name`, `quantity`, `price`, `photo`, `description`) VALUES (':name',':description',':price',':photo')";

        foreach ($this as $key => $value) {
            var_dump($key . "=>" . $value);
        }
    }
}