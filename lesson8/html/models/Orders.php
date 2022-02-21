<?php
namespace app\models;
class Orders extends Model
{
    protected $id;
    protected $session_id;
    protected $email;

    protected $props = [
        'session_id' => false,
        'email' => false
    ];

    public function __construct($session_id = null, $email = null)
    {
        $this->session_id = $session_id;
        $this->email = $email;
    }


    public static function getTableName()
    {
        return 'orders';
    }

}