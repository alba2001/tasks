<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 2.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JavaScript Задание 2.2</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="http://1000hz.github.io/bootstrap-validator/dist/validator.min.js"></script>
        <script src="datepicker-ru.js"></script>
        <script src="2.2.js"></script>
    </head>
    <body>
        <div class="panel panel-default">
            <div class="panel-heading">Задание 2.2</div>
            <div class="panel-body" style="max-width: 640px">
                <form id="task-2-2" action="index.php">
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input type="text" class="form-control glyphicon-ok" id="login" pattern="^[a-zA-Z0-9]+$" required>
                        <div class="help-block with-errors"></div>
                        <div class="help-block">Только латинские буквы и цифры</div>
                    </div>
                    <div class="form-group">
                        <label for="password1">Пароль</label>
                        <input type="password" class="form-control" id="password1" data-minlength="6" pattern="^[a-zA-Z0-9_№?&!]+$" required>
                        <div class="help-block with-errors"></div>
                        <div class="help-block">Должен быть длинее 6 символов, допускается латинница, цирфы,знаки “_№?&!”</div>
                    </div>
                    <div class="form-group">
                        <label for="password2">Подтверждение пароля</label>
                        <input type="password" class="form-control" id="password2" data-match="#password1" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="email1">E-mail</label>
                        <input type="email" class="form-control" id="email1" pattern="^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group" data-provide="datepicker">
                        <label for="email1">Дата рождения</label>
                        <div class='input-group date' id='datepicker1'>
                            <input type="text" class="form-control" id="datepicker" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>                    </div>
                    <button type="submit" class="btn btn-default" id="submit_form">Сохранить</button>
                </form>
            </div>
        </div>
    </body>
</html>
