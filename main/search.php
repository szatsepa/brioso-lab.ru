<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($slide_array);

$max = count($slide_array)-1;

if($max < 0)$max = 0;

$num = rand(0, $max);

$img = "http://".$host."/images/".$slide_array[$num][name];

?>
<div class="downloader">
    <div style="position: relative;float: left;width: 600px;">
        <p>
            <img src="<?php echo $img;?>" alt="Slide"/>
        </p>
        
    </div>
    
    <div style="position: relative;float: left;margin: 0 auto;">
        
        <p align="center">Выберите параметры</p>

        <form id="params">
            <table>
                <tr>
                    <td height="30"  width="30" colspan="11">
                        <p>Параметр 1</p>
                    </td>
                </tr>
                <tr>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p1" value="1" checked/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p1" value="2"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p1" value="3"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p1" value="4"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p1" value="5"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p1" value="6"/> 
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p1" value="7"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p1" value="8"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p1" value="9"/> 
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p1" value="10"/> 
                    </td>
                    <td height="30">
                        
                    </td>
                </tr>
                <tr>
                    <td height="30"  width="30"colspan="11">
                        <p>Параметр 2</p>
                    </td>
                </tr>
                <tr>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p2" value="1" checked/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p2" value="2"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p2" value="3"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p2" value="4"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p2" value="5"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p2" value="6"/> 
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p2" value="7"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p2" value="8"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p2" value="9"/> 
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p2" value="10"/> 
                    </td>
                    <td height="30">
                        
                    </td>
                </tr>
                <tr>
                    <td height="30"  width="30"colspan="11">
                        <p>Параметр 3</p>
                    </td>
                </tr>
                <tr>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p3" value="1" checked/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p3" value="2"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p3" value="3"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p3" value="4"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p3" value="5"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p3" value="6"/> 
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p3" value="7"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p3" value="8"/>
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p3" value="9"/> 
                    </td>
                    <td height="30"  width="30" background="http://<?php echo $host;?>/images/bt_bg.png">
                        <input type="radio" name="p3" value="10"/> 
                    </td>
                    <td height="30">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input style="font-size: 14px;font-weight: bold;color: black;" type="button" value="Искать" onclick="javascript:_goSearch('params');"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>