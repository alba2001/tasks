/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.1
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */

$(function () {
	$('#div_tree_items').jstree({
		'core' : {
			'data' : {
				"url" : "app/ajax.php",
				"dataType" : "json", // needed only if you do not supply JSON headers
                                "data" : function (node) {
					return { "id" : node.id };
				}
                        }
		}
	});
});
$(document).ready(function(){
    $("#div_tree_items").bind("select_node.jstree", function (e, data) {
        return data.instance.toggle_node(data.node);
    });    
});
                
    
