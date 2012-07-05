/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
	if (document.readyState != "complete"){
		setTimeout( arguments.callee, 100 );
		return;
	}
        $("#add_user").hide();
        
        var who = 'customer';
        
        var action = 'add';
        
        var uid = null;
        
        var row_id = null;
        
        $(".my_link").mouseover(function(){
            var id = this.id;
            $(eval(id)).css({'color': 'blueviolet','cursor':'pointer','font-weight':'bold'});
        });
        $(".my_link").mouseout(function(){
            var id = this.id;
            $(eval(id)).css({'color': 'black','cursor':'default','font-weight':'normal'});
        });

        $(".my_link").mousedown(function(){
            var id = this.id;
            row_id = $(eval(id)).parent().parent().attr('id');
            var persone_id = this.name;
            var action = persone_id.substr(0,1);
            var wh = persone_id.substr(1,1);
            persone_id = persone_id.substr(2);
            if(wh == 'c'){
                who = 'customer';
            }else{
                who = 'admin';
            }
            if(action == 'r'){
                editPersone('../query/as_user.php',persone_id,who);
            }else if(action == 'd'){
                delPersone('../action/as_del_user.php',persone_id,who);
            }
        });
        
        var add_vis = false;
        
        $("#plus_adm").mousedown(function(){
            if(!add_vis){
                    who = 'admin';
                    action = 'add';
                    $("#add_user").show(100,function(){
                        $("#s_name").focus();
                    });
                    
            }else{
                $("#add_user").hide(100);
            }
           
            add_vis = !add_vis;
        });

        $("#add_persone").mousedown(function(){
            var act = $("#add_persone").val();
            if(who == 'admin' && action == 'add'){
                addPersone('../action/as_add_user.php',who);
            }
            if(act == 'Сохранить'){
                
                changePersone('../action/as_edit_customer.php');
            }
            
        });

        
        function delPersone(url,uid,w){
            
            $.ajax({
                url:url,
                type:'post',
                dataType:'json',
                data:{uid:uid,who:w},
                success:function(data){
                    if(w == 'customer'){
                        $(eval(row)).remove();
                    }else{
                        $(eval(row)).remove();
                    }
                },
                error:function(data){
                    document.write(data['response']);
                }
            });
            
        }
        
        function changePersone(url){

             var surname = $("#s_name").val();
             var name = $("#u_name").val();
             var email = $("#u_email").val();
             var phone = $("#u_phone").val(); 
             var code = $("#u_code").val();
//             alert("ROW "+row_id); 
             $.ajax({
                url:url,
                type:'post',
                dataType:'json',
                data:{uid:uid,surname:surname,name:name,email:email,phone:phone,code:code,who:who},
                success:function(data){
//                    var str = data['ok']+" "+row_id;
//                    alert(str);
                     if(who == 'customer'){
                        $(eval(row_id)).remove();
                        $("#customers_table > tbody:last").append("<tr><td class='dat'>"+uid+"</td><td class='dat'>"+surname+" "+name+"</td><td class='dat'>"+email+"</td><td class='dat'>"+phone+"</td><td class='dat'><a class='my_link' id='r_user_"+uid+"' name='ru"+uid+"'>Редакт.</a></td><td class='dat'><a class='my_link' id='d_user_"+uid+"' name='du"+uid+"'>Удалить.</a></td></tr>");
                    }else{
                        $(eval(row_id)).remove();
                        $("#user_table > tbody:last").append("<tr><td class='dat'>"+uid+"</td><td class='dat'>"+surname+" "+name+"</td><td class='dat'>"+email+"</td><td class='dat'>"+phone+"</td><td class='dat'><a class='my_link' id='r_user_"+uid+"' name='ru"+uid+"'>Редакт.</a></td><td class='dat'><a class='my_link' id='d_user_"+uid+"' name='du"+uid+"'>Удалить.</a></td></tr>");
                    }
                     $("#add_user").hide();
                },
                error:function(data){
                    document.write(data['response']);
                }
                
            });
        }
        
        function addPersone(url,w){
            
             var surname = $("#s_name").val();
             var name = $("#u_name").val();
             var email = $("#u_email").val();
             var phone = $("#u_phone").val();
             var code = $("#u_code").val();
            $.ajax({
                url:url,
                type:'post',
                dataType:'json',
                data:{surname:surname,name:name,email:email,phone:phone,code:code,who:w},
                success:function(data){
//                    alert(data['user']);
                    if(data['ok']){
                        $("#user_table > tbody:last").append("<tr><td class='dat'>"+data['ok']+"</td><td class='dat'>"+data['user']['surname']+" "+data['user']['name']+"</td><td class='dat'>"+data['user']['email']+"</td><td class='dat'>"+data['user']['phone']+"</td><td class='dat'><a class='my_link' id='r_user_"+data['ok']+"' name='ru"+data['ok']+"'>Редакт.</a></td><td class='dat'><a class='my_link' id='d_user_"+data['ok']+"' name='du"+data['ok']+"'>Удалить.</a></td></tr>");
                    }
                },
                error:function(data){
                    document.write(data['response']);
                }
                
            });
            
        }
        function editPersone(url,persone_id,w){
            if(w == 'u'){
                who = 'admin';
            }else{
                who = 'customer';
            }
            uid = persone_id;
            $.ajax({
                url:url,
                type:'post',
                dataType:'json',
                data:{persone_id:persone_id, who:w},
                success:function(data){
                    $("#add_user").show(100,function(){
                        $("#s_name").focus();
                        $("#s_name").val(data['surname']);
                        $("#u_name").val(data['name']);
                        $("#u_email").val(data['email']);
                        $("#u_phone").val(data['phone']);
                        $("#u_code").val(data['code']);
                        $("#add_persone").val('Сохранить');
                    });
                    
                },
                error:function(data){
                    document.write(data['response']);
                }
            });
        }
});

