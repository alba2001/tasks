<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */
defined('PATH_ROOT') or die;

require_once PATH_APP.'config.php';

/**
 * Модель таблицы
 *
 * @since Build 1.0 (2016.03)
 * @author Kostiantyn Ovcharenko
 */
abstract class Model
{
    /**
     * @var  mysqli_result object
     */
    protected $_db;
    /**
     * Наименование таблицы
     * @var string
     */
    protected $_tbl_name;
    /**
     * Переменные для шаблона
     * @var array
     */
    protected $template_vars;


    public function __construct() {
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
            if (!$this->_db->set_charset("utf8")) 
            {
                throw new Exception("Ошибка при загрузке набора символов utf8: ".$this->_db->error);
            }            
    }
    /**
     * Вывод содеожимого шаблона
     * @param type $template_name
     * @return type
     */
    protected function _template($template_name)
    {
        ob_start();
        include(PATH_TEMPLATES.$template_name);
        return ob_get_clean();
    }
}