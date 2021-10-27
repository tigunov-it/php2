<?php
namespace app\models;
use app\engine\Db as Db;
use http\Params;

abstract class Model
{

// protected $tableName;
    abstract protected static function getTableName();

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance() -> queryOne($sql, ['id'=> $id]);
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
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
        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$column}) VALUES ({$value})"; // формируем строку sql запроса

        return Db::getInstance() -> execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

//    public function update() {
//        // $sql = "UPDATE {$this->tableName} SET `name` = ':name'" WHERE `id` = ':id'; // образец sql запроса
//        foreach ($this as $key => $value) {
//            if ($key == 'tableName') continue;
//            $columns[] = $key;
//            $values[] = ":" . $key;
//            $params[$key] = $value;
//        }
//
//        $column = implode(", ", $columns);
//        $value = implode(", ", $values);
//
//        $sql = "UPDATE {$this->tableName} SET ({$column}) = ({$value}) WHERE id = $this->id";
//
//        return Db::getInstance() -> execute($sql, $params);
//        $this->id = Db::getInstance()->lastInsertId();
//    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
        return Db::getInstance() -> execute($sql, ['id'=> $id]);
    }

}