/* 
 * three sliders 30/5/2012
 */
function slider(elemId, sliderWidth, range1, range2, step, cl_name) {
	var knobWidth = 9;	// ширина и высота бегунка
	var knobHeight = 24;	// изменяются в зависимости от используемых изображений
	var sliderHeight = 13;	// высота slider'а
        var sl_array;
        var interv = 0;
	
	var offsX,tmp;					// вспомагательные переменные
	var d = document;
	var isIE = d.all || window.opera;	// определяем модель DOM
	var point = (sliderWidth-knobWidth-3)/(range2-range1);
	// point - количество пикселей на единицу значения
	
	var slider = d.createElement('DIV'); // создаем slider
	slider.id = elemId + '_slider';
	slider.className = cl_name;
	d.getElementById(elemId).appendChild(slider);	
	
	var knob = d.createElement('DIV');	// создаем ползунок
	knob.id = elemId + '_knob';
	knob.className = 'knob';
	slider.appendChild(knob); // добавляем его в документ
	
	knob.style.left = 0;			// бегунок в нулевое значение
	knob.style.width = knobWidth+'px';	
	knob.style.height = knobHeight+'px';
	slider.style.width = sliderWidth+'px';
	slider.style.height = sliderHeight+'px';
	
	var sliderOffset = slider.offsetLeft;			// sliderOffset - абсолютное смещение slider'а
	tmp = slider.offsetParent;		// от левого края в пикселях (в IE не работает)
	while(tmp.tagName != 'BODY') {
		sliderOffset += tmp.offsetLeft;		// тут его и находим
		tmp = tmp.offsetParent;
	}
	
	if(isIE)						// в зависимости от модели DOM
	{								// назначаем слушателей событий
		knob.onmousedown = startCoord;		
		slider.onclick = sliderClick;		
		knob.onmouseup = endCoord;		
		slider.onmouseup = endCoord;			
	}
	else {
		knob.addEventListener("mousedown", startCoord, true);		
		slider.addEventListener("click", sliderClick, true);		
		knob.addEventListener("mouseup", endCoord, true);	
		slider.addEventListener("mouseup", endCoord, true);	
	}
        
//        setValue(position);

//////////////////// функции установки/получения значения //////////////////////////

	function setValue(x)	// установка по пикселям
	{
		if(x < 0) knob.style.left = 0; 
		else if(x > sliderWidth-knobWidth-3) knob.style.left = (sliderWidth-3-knobWidth)+'px';
		else {
			if(step == 0) knob.style.left = x+'px';			
			else knob.style.left = Math.round(x/(step*point))*step*point+'px';
		}

                
                var out = "";
                
                out += 'hsl('+sl_array[0].getValue()+","+sl_array[1].getValue()+"%,"+sl_array[2].getValue()+"%)";
                
                
                
		d.getElementById('_colorfield').style.backgroundColor = out;	// это вывод значения для примера                    
                
                d.getElementById('hue').value = sl_array[0].getValue();
                
                d.getElementById('saturation').value = sl_array[1].getValue();
                
                d.getElementById('brightness').value = sl_array[2].getValue();
                
                var color = $("#_colorfield").css('background-color');
                
//                var browser = browserDetectJS();
                   
                $("#sl1_slider").css('background','-o-linear-gradient(left, rgb(235,235,235) 12%, '+color+' 99%)');
                
                $("#sl1_slider").css('background','-moz-linear-gradient(left, rgb(235,235,235) 12%, '+color+' 99%)');
                   
                $("#sl1_slider").css('background','-webkit-linear-gradient(left , rgb(235,235,235) 12%, '+color+' 99%)');
                
                $("#sl1_slider").css('background','-ms-linear-gradient(left , rgb(235,235,235) 12%, '+color+' 99%)');
               
                $("#sl1_slider").css('background','-webkit-gradient(linear,left top,right top,color-stop(0.12, rgb(235,235,235)),color-stop(0.99, '+color+')');
 
                var bg = $("#sl1_slider").css('background-image');
                
                if(bg == 'none'){
                    $("#sl1_slider").css('background','url("../images/str.png")');
                }
                
//                alert(bg);
	}
	function setValue2(x)	// установка по значению
	{
		if(x < range1 || x > range2) alert('Value is not included into a slider range!');
		else setValue((x-range1)*point);
		
		d.getElementById('info').value = getValue();
	}

	function getValue() 
	{
            return Math.round(parseInt(knob.style.left)/point)+range1;
        }
        function setArray(arr){
            sl_array = arr;
            
        }

//////////////////////////////// слушатели событий ////////////////////////////////////

	function sliderClick(e) {	
		var x;
		if(isIE) {
			if(event.srcElement != slider) return; //IE onclick bug
			x = event.offsetX - Math.round(knobWidth/2);
		}	
		else x = e.pageX-sliderOffset-knobWidth/2;
		setValue(x);
               
                
	}

	function startCoord(e) {				
		if(isIE) {	
			offsX = event.clientX - parseInt(knob.style.left);
			slider.onmousemove = mov;
		}
		else {				
			slider.addEventListener("mousemove", mov, true);
		}
	}
	
	function mov(e)	{
		var x;	
		if(isIE) x = event.clientX-offsX;
		else x = e.pageX-sliderOffset-knobWidth/2;
		setValue(x);
	}

	function endCoord()	{
		if(isIE) slider.onmousemove = null;	
		else slider.removeEventListener("mousemove", mov, true);
	}

	// объявляем функции setValue2 и getValue как методы класса
	this.setValue = setValue2;
	this.getValue = getValue;
        this.setArray = setArray;
//        setValue((position-range1)*point);   
} // конец класса

