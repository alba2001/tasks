<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */
defined('PATH_ROOT') or die;

/**
 * Параметры приложения
 *
 * @since Build 1.0 (2016.03)
 * @author Kostiantyn Ovcharenko
 */
class Config
{
   /**
    * Параметры подключения к БД
    * @return array
    */
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