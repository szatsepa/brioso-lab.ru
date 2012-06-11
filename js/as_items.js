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
            var action = $("#action_item").val();
            var page = $("#page").val();
            if(action == 'Сохранить'){
                    $.ajax({
                    url:'http://brioso-lab.ru/action/as_update_item.php',
                    type:'post',
                    dataType:'json',
                    data:{barcode:barcode,name:name,description:description,ingridients:ingridients,specification:specification,nds:nds},
                    success:function(data){
                        var re = data['ok'];
                        if(re == 1){
                            window.location.href = "?act=items&page="+page;
                        }
                    },
                    error:function(data){
                    document.write(data['response']);
                    }
                });
            }else{
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
            }
            
        });
        
        $(".itm").mousedown(function(e){
            var barcode = e.name;
            var page = e.target;
            $("#page").val(page);
            $.ajax({
                url:'http://brioso-lab.ru/query/as_item.php',
                type:'post',
                dataType:'json',
                data:{barcode:barcode,page:page},
                success:function(data){
                    var name = data['name'];
                    var dscr = data['description'];
                    var ingr = data['ingridients'];
                    var spec = data['specification'];
                    var nds = data['nds'];
                   $("#bcode").val(barcode);
                   $("#name_item").val(name);
                   $("#s_dscr").val(dscr);
                   $("#comp").val(ingr);
                   $("#spec").val(spec);
                   $("#nds").val(nds);
                   $("#action_item").val('Сохранить');
                   $("#del_item").show();
                },
                error:function(data){
                    document.write(data['response']);
                }
            });
        });

        
});

