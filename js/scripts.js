/* 
 * created by arcady.1254@gmail.com 10/2/2012
 */

function preload(id){
    
        var obj = document.getElementById(id);

        obj.style.display = "inline-block";
        
}   
function _goSearch(ID){
    
    var obj = document.getElementById(ID);
    
    for(var i = 0;i < obj.p1.length;i++){

        if(obj.p1[i].checked == true) var param1 = obj.p1[i].value;  

    }
    for(var i = 0;i < obj.p2.length;i++){

        if(obj.p2[i].checked == true) var param2 = obj.p2[i].value;  

    }
    for(var i = 0;i < obj.p3.length;i++){

        if(obj.p3[i].checked == true) var param3 = obj.p3[i].value;  

    } 
    
    document.write("<form action='index.php?act=search' method='post'><input type='hidden' name='p3' value='"+param3+"'/><input type='hidden' name='p2' value='"+param2+"'/><input type='hidden' name='p1' value='"+param1+"'/></form>");
    document.forms[0].submit();

}
function _addParams(ID){
    
    var obj = document.getElementById(ID);
    
    for(var i = 0;i < obj.p1.length;i++){

        if(obj.p1[i].checked == true) var param1 = obj.p1[i].value;  

    }
    for(var i = 0;i < obj.p2.length;i++){

        if(obj.p2[i].checked == true) var param2 = obj.p2[i].value;  

    }
    for(var i = 0;i < obj.p3.length;i++){

        if(obj.p3[i].checked == true) var param3 = obj.p3[i].value;  

    }
//    alert("<form action='index.php?act=upp' method='post'><input type='hidden' name='slide_id' value='"+obj.slide_id.value+"'/><input type='hidden' name='p3' value='"+param3+"'/><input type='hidden' name='p2' value='"+param2+"'/><input type='hidden' name='p1' value='"+param1+"'/></form>");
    document.write("<form action='index.php?act=upp' method='post'><input type='hidden' name='slide_id' value='"+obj.slide_id.value+"'/><input type='hidden' name='p3' value='"+param3+"'/><input type='hidden' name='p2' value='"+param2+"'/><input type='hidden' name='p1' value='"+param1+"'/></form>");
    document.forms[0].submit();
}

function slider(elemId, sliderWidth, range1, range2, step) {
    var knobWidth = 17;             // ширина и высота бегунка
    var knobHeight = 21;            // изменяются в зависимости от используемых изображений
    var sliderHeight = 21;          // высота slider'а

    var offsX,tmp;                  // вспомагательные переменные
    var d = document;
    var isIE = d.all || window.opera;   // определяем модель DOM
    var point = (sliderWidth-knobWidth-3)/(range2-range1);
    // point - количество пикселей на единицу значения

    var slider = d.createElement('DIV'); // создаем slider
    slider.id = elemId + '_slider';
    slider.className = 'slider';
    d.getElementById(elemId).appendChild(slider);  

    var knob = d.createElement('DIV');  // создаем ползунок
    knob.id = elemId + '_knob';
    knob.className = 'knob';
    slider.appendChild(knob); // добавляем его в документ

    knob.style.left = 0;            // бегунок в нулевое значение
    knob.style.width = knobWidth+'px'; 
    knob.style.height = knobHeight+'px';
    slider.style.width = sliderWidth+'px';
    slider.style.height = sliderHeight+'px';

    var sliderOffset = slider.offsetLeft;           // sliderOffset - абсолютное смещение slider'а
    tmp = slider.offsetParent;      // от левого края в пикселях (в IE не работает)
    while(tmp.tagName != 'BODY') {
        sliderOffset += tmp.offsetLeft;     // тут его и находим
        tmp = tmp.offsetParent;
    }

    if(isIE)                        // в зависимости от модели DOM
    {                               // назначаем слушателей событий
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
 
    function setValue(x)    // установка по пикселям
    {
        if(x < 0) knob.style.left = 0;
        else if(x > sliderWidth-knobWidth-3) knob.style.left = (sliderWidth-3-knobWidth)+'px';
        else {
            if(step == 0) knob.style.left = x+'px';        
            else knob.style.left = Math.round(x/(step*point))*step*point+'px';
        }
        d.getElementById('info').value = getValue();    // это вывод значения для примера
    }
    function setValue2(x)   // установка по значению
    {
        if(x < range1 || x > range2) alert('Value is not included into a slider range!');
        else setValue((x-range1)*point);
        d.getElementById('info').value = getValue();
    }
 
    function getValue(){
        return Math.round(parseInt(knob.style.left)/point)+range1;
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
 
    function mov(e) {
        var x; 
        if(isIE) x = event.clientX-offsX;
        else x = e.pageX-sliderOffset-knobWidth/2;
        setValue(x);
    }
 
    function endCoord() {
        if(isIE) slider.onmousemove = null;
        else slider.removeEventListener("mousemove", mov, true);
    }
 
// объявляем функции setValue2 и getValue как методы класса
    this.setValue = setValue2;
    this.getValue = getValue;
} // конец класса
 
var mysl1 = new slider('sl', 300, 0, 200, 20);
//    var mysl2 = new slider('sl2', 400, 100, 200, 0);
//  <script></script>
   function sizePic() {
    size = document.getElementById("size").value;
    img = document.getElementById("pic");
    img.width = 60 + 20*size;
   }
  