<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */
defined('PATH_ROOT') or die;

require_once PATH_APP.'model.php';
require_once PATH_APP.'model_positions.php';

/**
 * Класс докторов
 *
 * @since Build 1.0 (2016.03)
 * @author Kostiantyn Ovcharenko
 */
class ModelDoctors extends Model
{
    public function __construct() {
        $this->_tbl_name = 'tsk2_doctors';
        parent::__construct();
    }
    /**
     * Обновление ФИО доктора
     * @param int $id
     * @param string $name
     * @return string
     */
    public function setDoctorName($id, $name)
    {
        $query = 'UPDATE `'.$this->_tbl_name.'` SET `fio` =  "'.$name.'" WHERE `id` ='.$id;
        if(mysqli_query($this->_db,$query))
        {
            return $name;
        }
        else 
        {
            return 'Ошибка при обновлении ФИО доктора!';
        }
    }

    /**
     * Список пациентов у доктора
     * 
     * @param int $id
     * @return array
     */
    private function getPacients($id)
    {
        $query = 'SELECT p.* FROM `tsk2_pacients` p'
                .' INNER JOIN `tsk2_doctors_pacients` dp ON `dp`.`pacient_id` = `p`.`id`'
                .' AND `dp`.`doctor_id` = '.$id;
        $res = mysqli_query($this->_db,$query);
        $pacients = array();
        if($res->num_rows)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                $pacients[] = $row;
            }
            
        }
        return $pacients;
    }

    /**
     * Список всех докторов
     * @return html
     */
    public function getAllDoctors($direction = 'ASC')
    {
        if(!preg_match('/^(ASC|DESC)$/', $direction))
        {
            $direction = 'ASC';
        }
        $res = mysqli_query($this->_db,'SELECT * FROM `'.$this->_tbl_name.'` ORDER BY `fio` '.$direction);
        $doctors = array();
        if($res->num_rows)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                $row['href'] = 'doctor/doctor_info/'.$row['id'];
                $doctors[] = $row;
            }        
        }
        $new_direction = $direction==='ASC'?'DESC':'ASC';
        $this->template_vars = array(
            'direction'=>$direction,
            'href'=>'doctors/doctors_order/'.$new_direction,
            'doctors'=>$doctors,
        );
        return $this->_template('doctors.tpl.php');
    }
    /**
     * Вывод информации о докторе
     * @param id $id
     * @return html
     */
    public function getDoctor($id)
    {
        $query = 'SELECT * FROM `'.$this->_tbl_name.'` WHERE `id` = '.$id;
        $res = mysqli_query($this->_db,$query);
        $this->template_vars['doctor'] = array();
        if($res->num_rows)
        {
            $row = mysqli_fetch_assoc($res);
            $this->template_vars['doctor'] = $row;
            $this->template_vars['doctor']['position'] = $this->_get_doctor_position($row['position_id']);
            $this->template_vars['doctor']['pacients'] = $this->getPacients($row['id']);
            $this->template_vars['doctor']['link'] = 'doctor_fio_'.$row['id'].'/change_doctor_fio/'.$row['id'].'/doctor_fio';
        }
        return $this->_template('doctor.tpl.php');
    }
    /**
     * Наименование должности доктора
     * @param int $id
     * @return string
     */
    private function _get_doctor_position($id)
    {
        $ModelPositions = new ModelPositions;
        return $ModelPositions->getPositionName($id);
    }
    /**
     * Модальное окно информации о докторе
     * @return html
     */
    public function show_modal()
    {
        return $this->_template('doctor_modal.tpl.php');
    }
    
}