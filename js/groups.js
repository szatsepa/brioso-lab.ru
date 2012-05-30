/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
     
    $("#exp_btn").mousedown(function(e){ 
       var v = e.val();
//        if(confirm("AGA&"+document.location.protocol+"=>"+document.location.hostname)){} 
	
            $.ajax({
                url: 'http://brioso-lab.ru/query/group.php',             // указываем URL и
                type : "post",                     // тип загружаемых данных
                data: "v="+v,
                success: function (data) { // вешаем свой обработчик на функцию success
                var str = '';
                    $.each(data, function(i, val) {    // обрабатываем полученные данные
                           str += i+" => "+val+"\n";
                    });
            alert(data);
                }
            });
        
        

    });
});

