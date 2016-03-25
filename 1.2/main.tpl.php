<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */

defined('PATH_ROOT') or die;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP, MySQL Задание 1.2</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="task12.js"></script>
    </head>
    <body>
        <div class="container-fluid" id="container_1_2">
            <div class="panel panel-default">
                <div class="panel-heading">Задание 1.2</div>
                <div class="panel-body">
                    <div class="col-md-6" id="doctors_container"><?=App::get_doctors()?></div>
                    <div class="col-md-6" id="pacients_container"><?=App::get_pacients()?></div>
                </div>
                <?=App::doctor_modal()?>
                <?=App::pacient_modal()?>
            </div>
        </div>
    </body>
</html>
