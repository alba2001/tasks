<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */
defined('PATH_ROOT') or die;

require_once PATH_APP.'model.php';

/**
 * Класс должностей докторов
 *
 * @since Build 1.0 (2016.03)
 * @author Kostiantyn Ovcharenko
 */
class ModelPositions extends Model
{
    public function __construct() {
        $this->_tbl_name = 'tsk2_positions';
        parent::__construct();
    }
    public function getPositionName($id)
    {
        $query = 'SELECT * FROM `'.$this->_tbl_name.'` WHERE `id` = '.$id;
        $res = mysqli_query($this->_db,$query);
        if($res->num_rows)
        {
            $row = mysqli_fetch_assoc($res);
            return $row['name'];
        }
        return '';
    }
}