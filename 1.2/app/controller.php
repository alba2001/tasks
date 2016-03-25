<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */
defined('PATH_ROOT') or die;

$task = filter_input(INPUT_POST, 'task');
$index = filter_input(INPUT_POST, 'index');
switch ($task)
{
    case 'doctors_order':
            echo App::get_doctors($index);
        break;
    case 'pacients_order':
            echo App::get_pacients($index);
        break;
    case 'doctor_info':
            echo App::get_doctor_info($index);
        break;
    case 'pacient_info':
            echo App::get_pacient_info($index);
        break;
    case 'change_doctor_fio':
            list($id, $name) = explode(':', $index);
            echo App::setDoctorName($id, $name);
        break;
    case 'change_pacient_fio':
            list($id, $name) = explode(':', $index);
            echo App::setPacientName($id, $name);
        break;
    default :
        include PATH_TEMPLATES.'main.tpl.php';
}
