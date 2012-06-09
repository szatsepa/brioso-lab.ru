/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
	if (document.readyState != "complete"){
		setTimeout( arguments.callee, 100 );
		return;
	}
        
        var price = new Array();
        
        $("#pricelist").hide();
        
        $(".red").mouseover(function(e){
            var id = this.id;
            $(eval(id)).css('color','blueviolet');
        });
         $(".red").mouseout(function(e){
            var id = this.id; 
            $(eval(id)).css('color','black');
        });
        $(".red").mousedown(function(e){
            var pid = this.name;
            $("#pricelist").hide();
//            $("#upl_price").show();
            $.ajax({
                url: 'http://brioso-lab.ru/query/as_price.php',
                type: 'post',
                dataType: 'json',
                data: {pid:pid},
                success:function(data){
//                    alert(data['creation']);
                    price = data;
                    $("#pricelist").show();
                    $("#price_name").css('font-weight','bold').css('font-size','16px').text(data['name']);
                    if(data['creation']==null){
                        $("#creation").text('загрузите прайс-лист');                        
                    }else{
//                        $("#upl_price").hide();
                        $("#creation").css('color','black').text(data['creation']);                        
                    }
                    $("#price_id").val(data['id']);
                },
                error:function(data){
                   document.write(data['response']); 
                }
                
            });
        });
        $("#new_price").mousedown(function(){
            
            $.ajax({
                url: 'http://brioso-lab.ru/action/as_new_price.php',
                type: 'post',
                dataType: 'json',
                data:{activ:0},
                success:function(data){
                    var price = data['new'];
                    
                    if(price == 1){
                        document.location.reload();
                    }else{
                        alert("ERROR SERVER IS BAD");
                    }
                },
                error:function(data){
                    document.write(data['response']);
                }
                
            });
        });
        $("#price_delete").mousedown(function(){
            var pid = price['id'];
            
            $.ajax({
               url: 'http://brioso-lab.ru/action/as_price_delete.php',
               type:'post',
               dataType:'json',
               data:{pid:pid},
               success:function(data){
                   var price = data['ok'];
                   if(price == 1){
                        document.location.reload();
                    }                  
               },
               error:function(data){
                   document.write(data['response']);
               }
            });
        });
       
});

