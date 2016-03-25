<?php
/**
 * @package		ABFX.Tasks
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Тестовое задание</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
    </head>
    <body>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary active">
                    <input type="radio" rel="1.1/index.php" autocomplete="off" checked> 1.1
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio"  rel="1.2/index.php" autocomplete="off"> 1.2
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" rel="2.1/index.php"  autocomplete="off"> 2.1
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" rel="2.2/index.php"  autocomplete="off">2.2
                  </label>
                </div>                
            </div>
            <div class="panel-body">
                <iframe src="1.1/index.php" width="100%" height="600px"></iframe>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                $('input[type="radio"]').change(function(){
                    $('iframe').attr('src',$(this).attr('rel'));
                });
            });
        </script>
    </body>
</html>
