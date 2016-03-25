<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */

require_once PATH_APP.'model_doctors.php';
require_once PATH_APP.'model_pacients.php';

/**
 * Основной класс
 *
 * @since Build 1.0 (2016.03)
 * @author Kostiantyn Ovcharenko
 */
defined('PATH_ROOT') or die;

class App
{
    /**
     * Список докторов
     * @return html
     */
    public static function get_doctors($direction = 'ASC')
    {
        $ModelDoctors = new ModelDoctors;
        return $ModelDoctors->getAllDoctors($direction);
    }
    /**
     * Список пациентов
     * @return html
     */
    public static function get_pacients($direction = 'ASC')
    {
        $ModelPacients = new ModelPacients;
        return $ModelPacients->getAllPacients($direction);
    }
    /**
     * Информация о докторе
     * @return html
     */
    public static function get_doctor_info($id)
    {
        $ModelDoctors = new ModelDoctors;
        return $ModelDoctors->getDoctor($id);
    }
    /**
     * Информация о пациенте
     * @return html
     */
    public static function get_pacient_info($id)
    {
        $ModelPacients = new ModelPacients;
        return $ModelPacients->getPacient($id);
    }
    /**
     * Вывод шаблона информаци о докторе
     * @return html
     */
    public static function doctor_modal()
    {
        $ModelDoctors = new ModelDoctors;
        return $ModelDoctors->show_modal();
    }

    /**
     * Вывод шаблона информаци о пациенте
     * @return html
     */
    public static function pacient_modal()
    {
        $ModelPacients = new ModelPacients;
        return $ModelPacients->show_modal();
    }
    /**
     * Изменение ФИО доктора
     * @return html
     */
    public static function setDoctorName($id,$fio)
    {
        $ModelDoctors = new ModelDoctors;
        return $ModelDoctors->setDoctorName($id,$fio);
    }
    /**
     * Изменение ФИО клиента
     * @return html
     */
    public static function setPacientName($id,$fio)
    {
        $ModelPacients = new ModelPacients;
        return $ModelPacients->setPacientName($id,$fio);
    }
}