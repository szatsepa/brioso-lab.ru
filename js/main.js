$(document).ready(function () {	if (document.readyState != "complete"){		setTimeout( arguments.callee, 100 );		return;	}	var content  = $("#gallery ul").html().replace(/\t/g,'').replace(/\r\n/g,'').replace(/\n/g,'').replace(/\<\/A\> \<LI\>/g,'</A></LI><LI>');	$("#gallery ul").html(content)	var width = parseInt($("#gallery ul").attr("scrollWidth")) - parseInt($("#gallery ul").attr("clientWidth"));	var indent = 0;	var factor = 2.5;	var elapsed = width * factor;        var a = parseInt($("#gallery ul").attr("scrollWidth"));        var b = parseInt($("#gallery ul").attr("clientWidth"));	$("#gallery .prev").mouseenter ( function () {		$('#gallery ul').stop(true);		indent = - parseInt ( $('#gallery ul').css('text-indent') );		$('#gallery ul').animate({textIndent: 0}, elapsed - ( width - indent ) * factor, 'easeOutQuad' );	});	$("#gallery .next").mouseenter ( function () {		$('#gallery ul').stop(true);		indent = - parseInt ( $('#gallery ul').css('text-indent') ); 		$('#gallery ul').animate({textIndent: -width}, ( width - indent ) * factor, 'easeOutQuad' );	}); 	$("#gallery .prev").mouseleave ( function () {		$('#gallery ul').stop(true);		indent = - parseInt ( $('#gallery ul').css('text-indent') );		if ( indent > widthStop )			$('#gallery ul').animate({textIndent: '+='+widthStop}, widthStop * factorStop, 'easeOutQuad' );		else if ( indent > 0 )			$('#gallery ul').animate({textIndent: 0}, indent * factorStop, 'easeOutQuad' );	});	$("#gallery .next").mouseleave ( function () {            $('#gallery ul').stop(true);		indent = - parseInt ( $('#gallery ul').css('text-indent') );		var delta = width - indent;		if ( delta > widthStop )			$('#gallery ul').animate({textIndent: '-='+widthStop}, widthStop * factorStop, 'easeOutQuad' );		else if ( delta > 0 )			$('#gallery ul').animate({textIndent: -width}, delta * factorStop, 'easeOutQuad' );	});                $("#volume").change(function(){           var out =  parseInt($("#volume").val());           var price = parseInt($("#volume").attr("price"));           var a = '';             var b = '';            var c = '';            var d = '';            var e = '';           out = out*price;           var str = out.toString();           if(out<10){               $("#r_0").attr({src:"http://brioso-lab.ru/images/p_"+str+".png", alt:0});           }else if(out>9 && out<100){                a = str.substr(0,1);                b = str.substr(1,1);               $("#r_1").attr({src:"http://brioso-lab.ru/images/p_"+a+".png", alt:10});               $("#r_0").attr({src:"http://brioso-lab.ru/images/p_"+b+".png", alt:0});           }else if(out>99 && out<1000){                a = str.substr(0,1);                b = str.substr(1,1);                c = str.substr(2,1);               $("#r_2").attr({src:"http://brioso-lab.ru/images/p_"+a+".png", alt:100});               $("#r_1").attr({src:"http://brioso-lab.ru/images/p_"+b+".png", alt:10});               $("#r_0").attr({src:"http://brioso-lab.ru/images/p_"+c+".png", alt:0});           }else if(out>999 && out<10000){                a = str.substr(0,1);                b = str.substr(1,1);                c = str.substr(2,1);                d = str.substr(3,1);               $("#r_3").attr({src:"http://brioso-lab.ru/images/p_"+a+".png", alt:1000});               $("#r_2").attr({src:"http://brioso-lab.ru/images/p_"+b+".png", alt:100});               $("#r_1").attr({src:"http://brioso-lab.ru/images/p_"+c+".png", alt:10});               $("#r_0").attr({src:"http://brioso-lab.ru/images/p_"+d+".png", alt:0});           }else if(out>9999 && out<100000){                a = str.substr(0,1);                b = str.substr(1,1);                c = str.substr(2,1);                d = str.substr(3,1);                e = str.substr(4,1);               $("#r_4").attr({src:"http://brioso-lab.ru/images/p_"+a+".png", alt:10000});               $("#r_3").attr({src:"http://brioso-lab.ru/images/p_"+b+".png", alt:1000});               $("#r_2").attr({src:"http://brioso-lab.ru/images/p_"+c+".png", alt:100});               $("#r_1").attr({src:"http://brioso-lab.ru/images/p_"+d+".png", alt:10});               $("#r_0").attr({src:"http://brioso-lab.ru/images/p_"+e+".png", alt:0});           }        });                $("#gallery li").mousedown(function(){                         var num = parseInt(this.id);                            alert(items_array[num]['item']);           });        });