<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 2.1
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JavaScript Задание 2.1</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="2.1.js"></script>
    </head>
    <body>
        <div class="panel panel-default">
            <div class="panel-heading">Задание 2.1</div>
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Передвижение по экрану</div>
                    <div class="panel-body">
                        <img src="media/1.png" alt="Рисунок 1" class="img-rounded ui-draggable">
                        <img src="media/2.png" alt="Рисунок 2" class="img-rounded ui-draggable">
                        <img src="media/3.jpg" alt="Рисунок 3" class="img-rounded ui-draggable">
                        <img src="media/4.jpg" alt="Рисунок 4" class="img-rounded ui-draggable">
                        <img src="media/5.jpg" alt="Рисунок 5" class="img-rounded ui-draggable">
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Смена местами</div>
                    <div class="panel-body ui-sortable">
                        <img src="media/1.png" alt="Рисунок 1" class="img-rounded">
                        <img src="media/2.png" alt="Рисунок 2" class="img-rounded">
                        <img src="media/3.jpg" alt="Рисунок 3" class="img-rounded">
                        <img src="media/4.jpg" alt="Рисунок 4" class="img-rounded">
                        <img src="media/5.jpg" alt="Рисунок 5" class="img-rounded">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
