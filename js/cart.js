/* 
 * 1/6/2012
 */

$(document).ready(function(){
    
        if (document.readyState != "complete"){
		setTimeout( arguments.callee, 200 );
		return;
	}
        var user_id = 0;

        function setUser(id){

        user_id = parseInt(id); 
        Cart(user_id);
        }
//        $('div').css('outline', '1px solid blue');
});

