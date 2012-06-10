/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
	if (document.readyState != "complete"){
		setTimeout( arguments.callee, 100 );
		return;
	}
        $("#del_item").hide();
        
        $("#action_item").mousedown(function(){
            var barcode = $("#bcode").val();
            var name = $("#name_item").val();
            var description = $("#s_dscr").val();
            var ingridients = $("#comp").val();
            var specification = $("#spec").val();
            var nds = $("#nds").val();
            $.ajax({
                url:'http://brioso-lab.ru/action/as_add_item.php',
                type:'post',
                dataType:'json',
                data:{barcode:barcode,name:name,description:description,ingridients:ingridients,specification:specification,nds:nds},
                success:function(data){
                    var re = data['ok'];
                    if(re == 1){
                        window.location.reload();
                    }
                },
                error:function(data){
                   document.write(data['response']);
                }
            });
        });

        
});

