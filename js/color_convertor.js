/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
DizzZ: конвертация цвета из HSL в RGB. Может пригодиться для цветовых эффектов.
/**
* Return RGB equivalent of HSL value. In the HSL color model, 0 hue (red)
* and 100% luminance means White; to <tt>Color.HSBtoRGB()</tt>, 0 hue and
* 100% luminance means Red.
* @param h hue, in the range 0..1
* @param s saturation, in the range 0..1
* @param l luminance, in the range 0..1
* @return rgb equivalent of the hsl values
* @see Color#HSBtoRGB()
*/

function HSLtoRGB(h, s, l)
{
var result = 0;
var m2 = (l <= 0.5 ) ? l * (s + 1) : l + s - l * s;
var m1 = l * 2 - m2;
var r = parseInt(255 * HUEtoRGB(m1, m2, h + 1 / 3));
var g = parseInt(255 * HUEtoRGB(m1, m2, h));
var b = parseInt(255 * HUEtoRGB(m1, m2, h - 1 / 3));

result += (r & 0xFF) << 16;
result += (g & 0xFF) << 8;
result += (b & 0xFF) << 0;

var out = result.toString(16);

//return out;
alert(out);
}

/**
* Copied from <a href=http://www.w3.org/TR/css3-color/>
* http://www.w3.org/TR/css3-color/</a>.
*/

function HUEtoRGB(m1, m2, h) 
{
if (h < 0)
{
h += 1;
}

if (h > 1)
{
h -= 1;
}

if (h * 6 < 1)
{
return m1 + (m2 - m1) * h * 6;
}

if (h * 2 < 1)
{
return m2;
}

if (h * 3 < 2)
{
return m1 + (m2 - m1) * (2 / 3 - h) * 6;
}

return m1;
}

