<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */
defined('PATH_ROOT') or die;

require_once PATH_APP.'model.php';

/**
 * Класс докторов
 *
 * @since Build 1.0 (2016.03)
 * @author Kostiantyn Ovcharenko
 */
class ModelPacients extends Model
{
    public function __construct() {
        $this->_tbl_name = 'tsk2_pacients';
        parent::__construct();
    }
    /**
     * Обновление ФИО пациента
     * @param int $id
     * @param string $name
     * @return string
     */
    public function setPacientName($id, $name)
    {
        $query = 'UPDATE `'.$this->_tbl_name.'` SET `fio` =  "'.$name.'" WHERE `id` ='.$id;
        if(mysqli_query($this->_db,$query))
        {
            return $name;
        }
        else 
        {
            return 'Ошибка при обновлении ФИО пациента!';
        }
    }
    
    /**
     * Список докторов у пациента
     * 
     * @param int $id
     * @return array
     */
    public function getDoctors($id)
    {
        $query = 'SELECT d.* FROM `tsk2_doctors` d'
                .' INNER JOIN `tsk2_doctors_pacients` dp ON `dp`.`doctor_id` = `d`.`id`'
                .' AND `dp`.`pacient_id` = '.$id;
        $res = mysqli_query($this->_db,$query);
        $doctors = array();
        if($res->num_rows)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                $doctors[] = $row;
            }
            
        }
        return $doctors;
    }
    
    /**
     * Список всех пациентов
     * 
     * @return html
     */
    public function getAllPacients($direction='ASC')
    {
        if(!preg_match('/^(ASC|DESC)$/', $direction))
        {
            $direction = 'ASC';
        }
        $res = mysqli_query($this->_db,'SELECT * FROM `'.$this->_tbl_name.'` ORDER BY `fio` '.$direction);
        $pacients = array();
        if($res->num_rows)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                $row['href'] = 'pacient/pacient_info/'.$row['id'];
                $pacients[] = $row;
            }        
        }
        $new_direction = $direction==='ASC'?'DESC':'ASC';
        $this->template_vars = array(
            'direction'=>$direction,
            'href'=>'pacients/pacients_order/'.$new_direction,
            'pacients'=>$pacients,
        );
        return $this->_template('pacients.tpl.php');
    }
    /**
     * Вывод информации о пациенте
     * @param id $id
     * @return html
     */
    public function getPacient($id)
    {
        $query = 'SELECT * FROM `'.$this->_tbl_name.'` WHERE `id` = '.$id;
        $res = mysqli_query($this->_db,$query);
        $this->template_vars['pacient'] = array();
        if($res->num_rows)
        {
            $row = mysqli_fetch_assoc($res);
            $this->template_vars['pacient'] = $row;
            $this->template_vars['pacient']['age'] = $this->_get_pacient_age($row['birth_date']);
            $this->template_vars['pacient']['doctors'] = $this->getDoctors($row['id']);
            $this->template_vars['pacient']['link'] = 'pacient_fio_'.$row['id'].'/change_pacient_fio/'.$row['id'].'/pacient_fio';
        }
        return $this->_template('pacient.tpl.php');
    }
    /**
     * Возраст пациента
     * @param date(Y-m-g) $birth_date
     * @return int
     */
    private function _get_pacient_age($birth_date)
    {
        return floor((time() - strtotime($birth_date)) / 31556926);
    }
    /**
     * Модальное окно информации о пациенте
     * @return html
     */
    public function show_modal()
    {
        return $this->_template('pacient_modal.tpl.php');
    }
}