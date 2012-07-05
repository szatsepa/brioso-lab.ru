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

        o_group = $(this).parent().prev().prev().prev().prev();
        o_ced = $(this).parent().prev().prev().prev();
        o_kor = $(this).parent().prev().prev();
        o_am  = $(this).parent().prev();

        new_group = o_group.text();
        cena_ed  = o_ced.text();
        cena_kor = o_kor.text();
        amount   = o_am.text();

        o_group.text("");
        o_ced.text("");
        o_kor.text("");
        o_am.text("");

        $("<input size='18' type='Text'>").appendTo(o_group);
        $("<input maxlength='8' size='8' type='Text'>").appendTo(o_ced);
        $("<input maxlength='8' size='8' type='Text'>").appendTo(o_kor);
        $("<input maxlength='6' size='6' type='Text'>").appendTo(o_am);

        o_group.children().val(new_group);
        o_ced.children().val(cena_ed);
        o_kor.children().val(cena_kor);
        o_am.children().val(amount);


        tt = $(this).attr("id") + " " + new_group + " " + cena_ed + " " + cena_kor + " " + amount;

            alert (tt);

        $(this).hide();
        $(this).next().show();
        $(this).next().next().hide();
        //$(this).addClass("cart2");

        return false;
    }); 


    $('.cart2').live("click", function() {

        o_group = $(this).parent().prev().prev().prev().prev().prev().prev().prev();
        o_ced = $(this).parent().prev().prev().prev();
        o_kor = $(this).parent().prev().prev();
        o_am  = $(this).parent().prev();

        str_group =o_group.children().val();
        num_price_single = o_ced.children().val();
        num_price_pack   = o_kor.children().val();
        num_amount       = o_am.children().val();

            $("#edit").load('index.php',{'act':'updsingleitem',
                                            'str_group':str_group,
                                            'num_price_single':num_price_single,
                                            'num_price_pack':num_price_pack,
                                            'num_amount':num_amount,
                                            'butt_id':$(this).attr("id")}); 

        alert (str_group + ' ' + num_price_single + ' ' + num_price_pack + ' ' + num_amount);

        return false;
    }); 

                $('.cloud').live("click", function() {

            if (confirm("Вы уверены, что хотите удалить эту позицию?\nЭто может привести к изменению истории покупок.")) {			

                $("#edit").load('index.php',{'act':'delsingleitem',
                                                    'butt_id':$(this).attr("id")}); 

                        }

                    return false;
    }); 
    
    	$('#addrecord_btn').mousedown(function() {
            $.ajax({
                url:'../action/as_addrows.php',
                type:'post',
                dataType:'json',
                data:{pid:pid, artikul:$("#artikul").val(),barcode:$("#barcode").val(),name:$("#name").val(),state:$("#state").val(),volume:$("#volume").val(),price:$("#price").val(),amount:$("#amount").val()},
                success:function(data){
                    $("#artikul,#barcode,#name,#state,#volume,#price,#amount").val('');
                    $("#addrecord_msg").text('В прайс '+price['name']+' добавлена одна строка');
                    $("#price_table > tbody:last").append("<tr align='center'><td>"+data['artikul']+"</td><td>"+data['barcode']+"</td><td>"+data['code2']+"</td><td align='left'>"+data['name']+"</td><td>"+data['state']+"</td><td>"+data['volume']+"</td><td>"+data['price']+"</td><td>"+data['amount']+"</td><td><button class='cart' id='e"+data['row_id']+"'>Ред.</button><button class='cart2' id='s"+data['row_id']+"' style='display:none;'>Сохранить</button>&nbsp;<a href='#' class='cloud' id='d"+data['row_id']+"' title='Удалить'>x</a></td></tr>");
                },
                error:function(data){
                    document.write(data['response']);
                }                                
             });
            return false;
        }); 

});
 

