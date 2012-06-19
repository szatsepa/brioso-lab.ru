/* 
 * 6/6/2012
 */
$(document).ready(function(){
    
    if (document.readyState != "complete"){
		setTimeout( arguments.callee, 200 );
		return;
	}
    $("#order_form").hide(); 
    
    $("#createOrder").mousedown(function(){
        $("#content").slideUp(500,function(){
            $("#order_form").slideDown(500);
        });
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
    
    $("#back_to_cart").mousedown(function(){
        $("#order_form").slideUp(500,function(){
            $("#content").slideDown(500);
        });
    });
     $("#back_to_cart").mouseover(function(){
            $("#back_to_cart").css('color', 'blueviolet');
    });
    $("#back_to_cart").mouseout(function(){
        $("#back_to_cart").css('color', 'black');
    });
    
    $("#clear_all").mousedown(function(){
        var customer = user_id;
        $.ajax({
            url: '../action/clear_cart.php',
            dataType: 'json',
            type: 'post',
            data: {customer:customer},
            success:function(data){
                alert("Удалено "+data['rows']+" строк");
                document.location.href="index.php?act=main";
            }
        });
        
    });
    
    $("#clear_row").mousedown(function(e){
        var item = this.name;
        var customer = user_id;
        $.ajax({
            url: '../action/clear_row.php',
            dataType: 'json',
            type: 'post',
            data: {customer:customer,item:item},
            success:function(data){
                document.location.href="index.php?act=cab";
            }
        });
        
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
            $.ajax({
               url: '../action/j_add_orders_item.php',
                type: 'post',
                dataType:'json', 
                data:{cart:cart,order:ord,customer:customer},
                success:function(data){
                    if(data['out']!=0)document.location.href='../index.php?act=main';
                }
            });
        }
            
    
//    
    
});

