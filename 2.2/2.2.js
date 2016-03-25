/**
 * @package		ABFX.Tasks
 * @subpackage	Task 2.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */
    jQuery(document).ready(function($){
        $( "#datepicker" ).datepicker({
            regional:'ru',
            dateFormat:'dd.mm.yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-60:+0"
        });
        $('#task-2-2').validator({
            errors: {
                match: 'Пароли не совпадают',
                minlength: 'Не достаточное количество символов'
            },
        });
    });
