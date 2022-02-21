<?php
namespace app\models;
use app\engine\Db as Db;
use app\interfaces\IModel;

abstract class Model implements IModel

{

    abstract protected static function getTableName();

    public function __set($name, $value) {
        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __isset($name) {
        return isset($this->$name);
    }

    //WHERE login = ...
    public static function getOneWhere($name, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `{$name}` = :value";
        return Db::getInstance() -> queryOneObject($sql, ['value'=> $value], static::class);
    }

    // Возвращает количество записей в таблице
    public static function getCountWhere($name, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE `{$name}` = :value";
        return Db::getInstance() -> queryOne($sql, ['value'=> $value])['count'];
    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
//        return Db::getInstance() -> queryOne($sql, ['id'=> $id]);
        return Db::getInstance() -> queryOneObject($sql, ['id'=> $id], get_called_class());
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance() -> queryAll($sql);
    }

    public function save() {
        if (is_null($this->id)) {
            return $this->insert();
        } else {
            return $this->update();
        }

    }

    public function insert() {

        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {

            $params[":{$key}"] = $this->$key;
            $columns[] = $key;

        }

        $columns = implode(', ', $columns);
        $value = implode(', ', array_keys($params));

        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$value})";

        DB::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();

        return $this;
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function deleteFromBasket() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE item_id = :id AND session_id = :session_id";
        return Db::getInstance()->execute($sql, ['id' => $this->item_id, 'session_id' => $this->session_id]);
    }

    public function update() {
        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $this->$key;
            $columns[] .= "`{$key}` = :{$key}";
            $this->props[$key] = false;
        }

        $columns = implode(", ", $columns);
        $tableName = static::getTableName();
        $params['id'] = $this->id;

        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }

}