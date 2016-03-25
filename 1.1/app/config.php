<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.1
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */

/**
 * Параметры подключения к БД
 *
 * @since Build 1.0 (2016.03)
 * @author Kostiantyn Ovcharenko
 */
class Config
{
    public static function db_params()
    {
        return array(
            'host'      => 'localhost',
            'login'     => 'abfx',
            'password'  => 'abfx',
            'db'        => 'abfx',
        );
    }
}