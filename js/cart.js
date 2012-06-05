/* 
 * 1/6/2012
 */

$(document).ready(function(){
    
    var month = new Array('- 01 -','- 02 -','- 03 -','- 04 -','- 05 -','- 06 -','- 07 -','- 08 -','- 09 -','- 10 -','- 11 -','- 12 -')
    
        if (document.readyState != "complete"){
		setTimeout( arguments.callee, 200 );
		return;
	}
//        var user_id = 0;
//
//        function setUser(id){
//
//        user_id = parseInt(id); 
//            Cart(user_id);
//        }
        
        $("#order").mouseover(function(){
            $("#order").css('color', 'blueviolet');
        });
        $("#order").mouseout(function(){
            $("#order").css('color', 'black');
        });
        $("#order").mousedown(function(){
            $("#content").css('display', 'none');
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
                url: 'http://brioso-lab.ru/query/num_order.php',
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
            var cart = my_cart;
            $.ajax({
                url: 'http://brioso-lab.ru/action/j_add_order.php',
                type: 'post',
                dataType:'json',
                data:{cart:cart,user_id:user_id,email:$("#act_email").val(),shipment:$("#shipment").val(),phone:$("#phone").val(),comment:document.getElementById('act_comment').value},
                success:function(data){
                    var str = '';
                    for(var i in data){
                        str += i+"; ";
                    }
                    alert(str);
                }
            });
        }
        
        
//        $('div').css('outline', '1px solid blue');

});

