<?php
/**
 * @package BookStore\config
 * @return Array configures connection to MySql server
 */

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=appdb',
    'username' => 'root',
    'password' => 'your password',
    'charset' => 'utf8',
];
