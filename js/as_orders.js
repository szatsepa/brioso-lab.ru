/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
	if (document.readyState != "complete"){
		setTimeout( arguments.callee, 100 );
		return;
	}
        
        var new_order_color = $("a.new_order").css('color');
        
        $("#order_on_table").hide();
        
        $("#exp").hide();
        
        $("a.new_order").mouseover(function(e){
            var id = this.id;
            $(eval(id)).css('color', 'blueviolet');
        });
        $("a.new_order").mouseout(function(e){
            var id = this.id;
            $(eval(id)).css('color', new_order_color);
        });
        $("a.new_order").mousedown(function(){
            var order_id = this.name;
            $.ajax({
                url:'http://brioso-lab.ru/query/as_order.php',
                type:'post',
                dataType:'json',
                data:{oid:order_id},
                success:function(data){
                    $("#exps").remove();
                    $("#exp").show();
                    $("#exp").append('<span id="exps"></span>');
                    $("#exps").append('<p id="zag" style="text-align:center;font-weight: bold;">Заказ № '+order_id+'</p>');
                    $("#exps").append('<p  style="">Заказчик: '+data['order']['email']+'</p>');
                    $("#exps").append('<p  style="">Дата заказа: '+data['order']['time']+'</p>');
                    if(data['order']['exe_time'] != null)$("#exps").append('<p  style="">Дата исполнения: '+data['order']['exe_time']+'</p>');
                    $("#exps").append('<p  style="">Контактный телефон: '+data['order']['phone']+'</p>');
                    $("#exps").append('<p  style="">Адресс доставки: '+data['order']['shipment']+'</p>');
                    if(data['order']['comments'] != null)$("#exps").append('<p  style="">Дополнительно: '+data['order']['comments']+'</p>');
                    $("#exps").append('<table id="expt" border="0" class="cart" ></table>');
                    $("#expt").append('<th class="cart">Артикул</th><th class="cart">Наименование</th><th class="cart">Цена ед.</th><th class="cart">Кол-во (л.)</th><th class="cart">Цвет</th><th class="cart"></th>');
                    for(var i = 0;i<data['items'].length;i++){
                        $("#expt").append("<tr><td>"+data['items'][i]['artikul']+"</td><td>"+data['items'][i]['name']+"</td><td>"+data['items'][i]['price']+"</td><td>"+data['items'][i]['amount']+"</td><td id='cell_"+i+"');color:wite;'>"+data['items'][i]['hsb']+"</td></tr>");
//                        $(eval("#cell_"+i)).css('background-color','hsl('+data['items'][i]['hsb']+')');
                    }
                    $("#exp").append('<br/><br/>');
                    $("#exp").append('<p style="text-align:center;"><input id="stat" type="button" value="Принять в обработку"/>');
                },
                error:function(data){
                    document.write(data['response']);
                }
            });
            
            
        });
});