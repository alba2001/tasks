/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */

jQuery(document).ready(function($){
    $('[data-toggle="tooltip"]').tooltip();
    $('#container_1_2').on('click','.ajax_call',function(e){
        var data = $(this).attr('link').split('/');
        var index = data[2];
        if(data.length === 4)
        {
            index += ':'+$('#'+data[3]).val();
        }
        var $container =  $('#'+data[0]+'_container');
        $.post( "index.php", {task:data[1],index:index})
            .done(function( html ) {
                $container.html(html);
            });        
    });
});