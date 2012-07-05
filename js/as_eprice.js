/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
        var price = new Object();
        
        getPrice(pid);
    
        function getPrice(pid){
            var pid = pid;
            $.ajax({
                url:'../query/as_price.php',
                type:'post',
                dataType:'json',
                data:{pid:pid},
                success:function(data){
                    price = data;
                    $("#pedit").text(price['name']);
                },
                error:function(data){
                    document.write(data['response']);
                }
            });
            return false;
        }
         
        $('.cart').live("click", function() {
            
            
            var o_code2 = $(this).parent().prev().prev().prev().prev().prev().prev();
            var o_name = $(this).parent().prev().prev().prev().prev().prev();
            var o_state = $(this).parent().prev().prev().prev().prev();
            var o_vol = $(this).parent().prev().prev().prev();
            var o_price = $(this).parent().prev().prev();
            var o_am  = $(this).parent().prev();

            var new_code2 = o_code2.text();
            var new_name = o_name.text();
            var new_state = o_state.text();
            var new_volume  = o_vol.text();
            var new_price = o_price.text();
            var amount   = o_am.text();
            
            o_code2.text("");
            o_name.text("");
            o_state.text("");
            o_vol.text("");
            o_price.text("");
            o_am.text("");

            $("<input size='1' type='Text'>").appendTo(o_code2);
            $("<input maxlength='255' size='27' type='Text'>").appendTo(o_name);
            $("<input size='16' type='Text'>").appendTo(o_state);
            $("<input maxlength='8' size='3' type='Text'>").appendTo(o_vol);
            $("<input maxlength='8' size='6' type='Text'>").appendTo(o_price);
            $("<input maxlength='6' size='6' type='Text'>").appendTo(o_am);
            
            o_code2.children().val(new_code2);
            o_name.children().val(new_name);
            o_state.children().val(new_state);
            o_vol.children().val(new_volume);
            o_price.children().val(new_price);
            o_am.children().val(amount);


//        tt = $(this).attr("id") + " " + new_state + " " + new_volume + " " + new_price + " " + amount;
//
//            alert (tt);

        $(this).hide();
        $(this).next().show();
        $(this).next().next().hide();
        //$(this).addClass("cart2");

        return false;
    }); 


    $('.cart2').live("click", function() {
            var o_artikul = $(this).parent().prev().prev().prev().prev().prev().prev().prev().prev();
            var o_barcode = $(this).parent().prev().prev().prev().prev().prev().prev().prev();
            var o_code2 = $(this).parent().prev().prev().prev().prev().prev().prev();
            var o_name = $(this).parent().prev().prev().prev().prev().prev();
            var o_state = $(this).parent().prev().prev().prev().prev();
            var o_vol = $(this).parent().prev().prev().prev();
            var o_price = $(this).parent().prev().prev();
            var o_am  = $(this).parent().prev();

            var num_row = this.name;
            var artikul = o_artikul.text();
            var barcode = o_barcode.text();
            var code2 = o_code2.children().val();
            var name = o_name.children().val();
            var state = o_state.children().val();
            var volume = o_vol.children().val();
            var price = o_price.children().val();
            var amount = o_am.children().val();

            $.ajax({
                url:'../action/as_updrows.php',
                type:'post',
                dataType:'json',
                data:{pid:pid,artikul:artikul,barcode:barcode,code2:code2,name:name,state:state,volume:volume,price:price,amount:amount},
                success:function(data){
                    if(data['ok']){
                        $(eval(num_row)).remove();
                        $("#price_table > tbody:last").append("<tr align='center'><td>"+data['artikul']+"</td><td>"+data['barcode']+"</td><td>"+data['code2']+"</td><td align='left'>"+data['name']+"</td><td>"+data['state']+"</td><td>"+data['volume']+"</td><td>"+data['price']+"</td><td>"+data['amount']+"</td><td><button class='cart' id='e"+data['row_id']+"'>Ред.</button><button class='cart2' id='s"+data['row_id']+"' name='row_"+num_row+"' style='display:none;'>Сохранить</button>&nbsp;<button class='cloud' id='"+data['artikul']+"' name='row_"+num_row+"' title='Удалить'>X</button></td></tr>");
                    }
                },
                error:function(data){
                    document.write(data['response']); 
                }
                
            });

//        alert (num_row);

        return false;
    }); 

                $('.cloud').live("click", function() {
                    var artikul = this.id;
                    var row_id = this.name;
                    
                    if (confirm("Вы уверены, что хотите удалить эту позицию?\nЭто может привести к изменению истории покупок.")) {			
                        $.ajax({
                            url:'../action/as_delrows.php',
                            type:'post',
                            dataType:'json',
                            data:{pid:pid,artikul:artikul},
                            success:function(data){
                                if(data['ok']){
                                   $(eval(row_id)).remove(); 
                                }
                            },
                            error:function(data){
                                document.write(data['response']);
                            }
                        });
                    }

                    return false;
    }); 
    
    	$('#addrecord_btn').mousedown(function() {
            var num_row = $('#price_table').length;
            num_row++;
            $.ajax({
                url:'../action/as_addrows.php',
                type:'post',
                dataType:'json',
                data:{pid:pid, artikul:$("#artikul").val(),barcode:$("#barcode").val(),name:$("#name").val(),state:$("#state").val(),volume:$("#volume").val(),price:$("#price").val(),amount:$("#amount").val()},
                success:function(data){
                    $("#artikul,#barcode,#name,#state,#volume,#price,#amount").val('');
                    $("#addrecord_msg").text('В прайс '+price['name']+' добавлена одна строка');
                    $("#price_table > tbody:last").append("<tr align='center'><td>"+data['artikul']+"</td><td>"+data['barcode']+"</td><td>"+data['code2']+"</td><td align='left'>"+data['name']+"</td><td>"+data['state']+"</td><td>"+data['volume']+"</td><td>"+data['price']+"</td><td>"+data['amount']+"</td><td><button class='cart' id='e"+data['row_id']+"'>Ред.</button><button class='cart2' id='s"+data['row_id']+"' style='display:none;'>Сохранить</button>&nbsp;<button class='cloud' id='"+data['artikul']+"' name='row_"+num_row+"' title='Удалить'>X</button></td></tr>");
                },
                error:function(data){
                    document.write(data['response']);
                }                                
             });
            return false;
        }); 

});
 

