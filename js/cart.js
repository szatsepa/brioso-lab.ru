/* 
 * 1/6/2012
 */

$(document).ready(function(){
    
    var month = new Array('- 01 -','- 02 -','- 03 -','- 04 -','- 05 -','- 06 -','- 07 -','- 08 -','- 09 -','- 10 -','- 11 -','- 12 -');
    
        if (document.readyState != "complete"){
		setTimeout( arguments.callee, 200 );
		return;
	}

        
        $("#order").mouseover(function(){
            $("#order").css('color', 'blueviolet');
        });
        $("#order").mouseout(function(){
            $("#order").css('color', 'black');
        });
        $("#order").mousedown(function(){
            createOrder();
        });
        
        $("#to_order").mouseover(function(){
            $("#to_order").css('color', 'blueviolet');
        });
        $("#to_order").mouseout(function(){
            $("#to_order").css('color', 'black');
        });
        $("#to_order").mousedown(function(){
            saveOrder();

        });
        
        function createOrder(){
            $.ajax({
                url: '../query/num_order.php',
                type: 'post',
                dataType: 'json',
                success:function(data){
                    var now = new Date();
                    var num = data['num']+1;
                    if(!num)num=1;
                    $("#content").css('display', 'none');
                    $("#order_form").css('display','block');
                    $("#order_title").text("Заказ №"+num+" от "+now.getDate()+" "+month[now.getMonth()]+" "+now.getFullYear()+" г.");
                    $("#shipment").focus();
                }
            });
        }
        
        function saveOrder(){
            var customer = user_id;
            $.ajax({
                url: '../action/j_add_order.php',
                type: 'post',
                dataType:'json',
                data:{customer:customer,email:$("#act_email").val(),shipment:$("#shipment").val(),phone:$("#phone").val(),comment:document.getElementById('act_comment').value},
                success:function(data){
                      var order = data['z_id'];
                      itemAddOrder(order);
                }
            });
        }
        function itemAddOrder(order){
            var cart = my_cart;
            var ord = order;
            var customer = user_id;
            //alert(ord);
            $.ajax({
               url: '../action/j_add_orders_item.php',
                type: 'post',
                dataType:'json', 
                data:{cart:cart,order:ord,customer:customer},
                success:function(data){
                    //alert(data['str']);
                    if(data['out']!=0)document.location.href='../index.php?act=main';
                }
            });
        }

});

