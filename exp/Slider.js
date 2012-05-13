/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function slider(elemId, sliderWidth, range1, range2, step) {
	var knobWidth = 9;				// ширина и высота бегунка
	var knobHeight = 24;			// изменяются в зависимости от используемых изображений
	var sliderHeight = 13;			// высота slider'а
	
	var offsX,tmp;					// вспомагательные переменные
	var d = document;
	var isIE = d.all || window.opera;	// определяем модель DOM
	var point = (sliderWidth-knobWidth-3)/(range2-range1);
	// point - количество пикселей на единицу значения
	
	var slider = d.createElement('DIV'); // создаем slider
	slider.id = elemId + '_slider';
	slider.className = 'slider';
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


// далее подробно не описываю, кто захочет - разберется
//////////////////// функции установки/получения значения //////////////////////////

	function setValue(x)	// установка по пикселям
	{
		if(x < 0) knob.style.left = 0; 
		else if(x > sliderWidth-knobWidth-3) knob.style.left = (sliderWidth-3-knobWidth)+'px';
		else {
			if(step == 0) knob.style.left = x+'px';			
			else knob.style.left = Math.round(x/(step*point))*step*point+'px';
		}
//                alert(elemId);
		d.getElementById(elemId+'_info').value = getValue();	// это вывод значения для примера
	}
	function setValue2(x)	// установка по значению
	{
		if(x < range1 || x > range2) alert('Value is not included into a slider range!');
		else setValue((x-range1)*point);
		
		d.getElementById('info').value = getValue();
	}

	function getValue() 
	{return Math.round(parseInt(knob.style.left)/point)+range1;}

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
} // конец класса

