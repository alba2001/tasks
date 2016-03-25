<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.1
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */

require_once 'config.php';

/**
 * Модель элементов
 *
 * @since Build 1.0 (2016.03)
 * @author Kostiantyn Ovcharenko
 */
class ModelItems
{
    /**
     * @var  mysqli_result object
     */
    private $_db;
    /**
     * Наименование таблицы
     * @var string
     */
    private $_tbl_name;


    public function __construct() {
        $this->_tbl_name = 'tsk1_items';
        $this->_connect();
    }
    /**
     * Создание соединения с БД
     * @throws Exception
     */
    private function _connect()
    {
        $config = Config::db_params();
        $this->_db = new mysqli($config['host'],$config['login'],$config['password'], $config['db']);
        if ($this->_db->connect_error) 
        {
             throw new Exception('Ошибка подключения ('.$this->_db->connect_errno.') '
                    .$this->_db->connect_error);
        }        
    }
    /**
     * Получение массива элементов с общим родителем в формате jstree
     * 
     * @param int $parent_id
     * @return array
     */
    public function get_items($parent_id)
    {
        $res = mysqli_query($this->_db,'SELECT * FROM `'.$this->_tbl_name.'` WHERE `parentid` = '.$parent_id);
        if(!$res->num_rows)
        {
            return array();
        }
        $items = array();
        while($row = mysqli_fetch_assoc($res))
        {
            $is_parent = $this->_is_parent($row['id']);
            $items[] =  array(
                'text' => $row['item'], 
                'children' => $is_parent,  
                'id' => $row['id'], 
                'icon' => $is_parent?'':'jstree-file' 
            );
        }
        return $items;
    }
    /**
     * Возвращает TRUE, если у элемента есть наследники
     * @param int $id
     * @return bool
     */
    private function _is_parent($id)
    {
        $res = mysqli_query($this->_db,'SELECT `id` FROM `'.$this->_tbl_name.'` WHERE `parentid` = '.$id);
        return (bool) $res->num_rows;
    }
}