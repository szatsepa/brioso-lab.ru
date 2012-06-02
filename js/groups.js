/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
    if (document.readyState != "complete"){
		setTimeout( arguments.callee, 100 );
		return;
	}
        var groups_array = new Array();
        
        var pic = new Array(); 
        
        _initGroups();
        

        
    function _initGroups(){
        $.ajax({
                url: 'http://brioso-lab.ru/query/group.php',             // указываем URL и
                type : "post",                     // тип загружаемых данных
                dataType: "json",
                success: function (data) { // вешаем свой обработчик на функцию success
                      
                      groups_array = data;
                      
                      $("#group_image").attr('src', 'http://brioso-lab.ru/images/items/'+data[0]['img']);
                      
                      $("#group_image").attr('alt', data[0]['price_id']);
                      
                      $("#p_content").text(groups_array[0]['comment']);
                      
                      $("#prev").attr("src", "http://brioso-lab.ru/images/prev.png");
                      
                      $("#next").attr("src", "http://brioso-lab.ru/images/next.png");
                 }
                
        });
    }
    //        dialog login box ==============================================
        $('#entry').click(function(e) {
            e.preventDefault();
            $("#entry").css({'visibility': 'hidden'});
            $("#vrWrapper").css({'display': 'block'});
            $(blocks[1]).css({'display': 'block'});
            $("#content").css({'display':'none'});
            $('#loginEmail').focus();

        });
        
        $('.additional a').click(function(e) {
                e.preventDefault();
                var x;
                switch ($(this).attr('name')) {
                    case ("signup"):
                        x = 0;
                        break;
                    case ("index"):
                        x = 1;
                        break;
                    case ("remind"):
                        x = 2;
                        break;
                };
            $("#entry").css({'visibility': 'hidden'});
            $("#vrWrapper").css({'display': 'block'});
            $("#content").css({'display':'none'});
            for(var i = 0; i < blocks.length; i++){

            $(blocks[i]).css({'display': 'none'}); 

            }

            $(blocks[x]).css({'display': 'block'}); 
            if(x==0){
               $('#email').focus();  
            }else if(x==1){
               $('#loginEmail').focus(); 
            }else{
               $('#remindEmail').focus();  
            }
    });      

// = images of group

        
        
        if (document.images){
            
            for(var ii = 0;ii < groups_array.length;ii++){
                pic[ii] = new Image();
                pic[ii].src=groups_array[ii]['img'];
                pic[ii].alt = groups_array[ii]['price_id'];

            }
        }

  var i = 0;
        
        $("#group_image").mousedown(function(){
            i ++;
            if(i==groups_array.length){
                i = 0;
            }
            if(i<0){
                i = (groups_array.length-1);
            }
            $("#group_image").attr('src', 'http://brioso-lab.ru/images/items/'+groups_array[i]['img']);
            $("#group_image").attr('alt', groups_array[i]['price_id']);           
            $("#p_content").text(groups_array[i]['comment']);
        });
        
        $("#next").mousedown(function(){
            i ++;
            if(i==groups_array.length){
                i = 0;
            }
            if(i<0){
                i = (groups_array.length-1);
            }
            $("#group_image").attr('src', 'http://brioso-lab.ru/images/items/'+groups_array[i]['img']);
            $("#group_image").attr('alt', groups_array[i]['price_id']);           
            $("#p_content").text(groups_array[i]['comment']);
        });
        $("#prev").mousedown(function(){
            i --;
            if(i==groups_array.length){
                i = 0;
            }
            if(i<0){
                i = (groups_array.length-1);
            }
            $("#group_image").attr('src', 'http://brioso-lab.ru/images/items/'+groups_array[i]['img']);
            $("#group_image").attr('alt', groups_array[i]['price_id']);           
            $("#p_content").text(groups_array[i]['comment']);
        });
        
        function cgangePrice(n){
            i += n;
            if(i==groups_array.length){
                i = 0;
            }
            if(i<0){
                i = (groups_array.length-1);
            }
            $("#group_image").attr('src', 'http://brioso-lab.ru/images/items/'+groups_array[i]['img']);
            $("#group_image").attr('alt', groups_array[i]['price_id']);           
            $("#p_content").text(groups_array[i]['comment']);
            
        }
        
        $("#go_paint").mousedown(function(){
            var pid = $("#group_image").attr('alt');
//            AHTUNG!!! временная затычка
            document.location.href="index.php?act=main&pid=1";
//            document.location.href="index.php?act=main&pid="+pid;
//            $.post('http://brioso-lab.ru/index.php?act=main',{pid:1});
        });
        
      $("#loginPass").keydown(function(event){
           
           if(event.keyCode==13) {
               SignIn();
           }
        });
         $("#password").keydown(function(event){
           
           if(event.keyCode==13) {
               SignUp();
           }
        });
         $("#remindEmail").keydown(function(event){
           
           if(event.keyCode==13) {
               RemindPassword();
           }
        });        

});

