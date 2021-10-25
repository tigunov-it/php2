<?php
namespace app\models;
use app\engine\Db as Db;
use http\Params;

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
       // $sql = "INSERT INTO {$this->tableName} (`name`, `quantity`, `price`, `photo`, `description`) VALUES (':name',':description',':price',':photo')"; // образец sql запроса
        foreach ($this as $key => $value) {
            if ($key == 'id') continue; // пропускаем id (это автоинкремент)
            if ($key == 'tableName') continue; // пропускаем tableName
            $columns[] = $key; // создаем массив с названиями колонок
            $values[] = ":" . $key; // создаем массив с названиями значений (они соответствуют названиям колонок)
            $params[$key] = $value; // создаем массив вида "Название колонки" => "Значение"
        }

        $column = implode(", ", $columns); // преобразуем массив с названиями колонок таблицы в строку для вставки в sql запрос
        $value = implode(", ", $values); // преобразуем массив со значениями в строку для вставки в sql запрос

        $sql = "INSERT INTO {$this->tableName} ({$column}) VALUES ({$value})"; // формируем строку sql запроса

        return Db::getInstance() -> execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
        return Db::getInstance() -> execute($sql, ['id'=> $id]);
    }
}