<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.1
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */

// Прием ajax запроса с ID родителя возврат данных о подчиненных элементах.
require_once('model_items.php');
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, 
        array("options" => array(
            "default" => 0,
            "min_range" => 0
)));
try {
    $ModelItems = new ModelItems;
    $items = $ModelItems->get_items($id);
    echo json_encode($items);
} catch (Exception $e) {
    header($_SERVER["SERVER_PROTOCOL"] . ' 500 Server Error');
    header('Status:  500 Server Error');
    echo $e->getMessage();
}