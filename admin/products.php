<?php

/*
 * create 18/5/2012
 * 
 */
?>
<script type="text/javascript">
    var price_list = new Array();
</script> 
<div class="group" style="position: relative;margin-top: 12px;margin-left: 14px;padding-left: 36px;">
    
 <div class="add_product" style="display: none;font-size: 16px;font-weight: bold;color: black;" id="add_prod">
     <p>Добавить</p>
        <form id="form_group" action="index.php?act=addproduct" method="post" required> 
            <input type="hidden" name="pid" value=""/>
            <br/>
            &nbsp;
            <br/>
            <select name="pgroup" required >
                <?php
                                foreach ($group_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pname" size="46" placeholder="Наименование"/>
            <br/>
            &nbsp;
            <br/>
            <textarea cols="44" rows="3" name="dscr" placeholder="Описание"></textarea>
            <br/>
            &nbsp;
            <br/>
            <select name="ptype" required >
                <?php
                                foreach ($type_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            <br/>
            &nbsp;
            <br/>
             <select name="pqlty" required >
                <?php
                                foreach ($quality_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            &nbsp;&nbsp;
            <input type="text" size="5" name="stars" placeholder="Оценка"/>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pweight" size="46" placeholder="Вес/объем"/>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pprice" size="46" placeholder="Цена"/>
            <br/>
            &nbsp;
            <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Добавить"/>  
            <br/>
            &nbsp;
            <br/>
        </form>
    </div>
<div class="table" id="ptable">
        <table border="0">
            <thead style="font-weight: bold;font-size: 14px;color: black;text-align: center;">
                <tr>
                    <td>
                       № 
                    </td>
                    <td>
                       Группа 
                    </td>
                    <td>
                       Наименование 
                    </td>
                    <td>
                       Описание 
                    </td>
                    <td>
                       Тип
                    </td>
                    <td>
                       Качество 
                    </td>
                    <td>
                       Оценка 
                    </td>
                    <td>
                       Вес\объем 
                    </td>
                    <td>
                       Цена
                    </td>
                    <td>
                       Редактировать 
                    </td>
                    <td>
                        Удалить
                    </td>
                </tr>
            </thead>
            <tbody style="font-size: 14px;">   
                <?php
                $n = 1; 
                foreach ($price_list_array as $value) {
                                            ?>
<script type="text/javascript">
    var price_rows = new Array(<?php echo "'".$value[id]."','".$value[group]."','".$value[name]."','".$value[description]."','".$value[type]."','".$value[quality]."','".$value[weight]."','".$value[price]."','".$value[stars]."'";?>);
</script> 
             <?php

                    
             echo   "<tr>
                        <td>
                            $n
                        </td>
                        <td>
                            $value[group]
                        </td>
                        <td>
                            $value[name]
                        </td>
                        <td>
                            $value[description]
                        </td>
                        <td>  
                            $value[type] 
                        </td>
                        <td>
                            $value[quality]
                        </td>
                         <td>
                            $value[stars]
                        </td>
                        <td>
                            $value[weight]
                        </td>
                        <td>
                            $value[price]
                        </td>";
             ?>
                   
                       <td>
                           <a style="text-decoration: underline;" name="" onClick="javascript:_priselistEdit(price_rows);">Редактировать</a>
                        </td>
                        <td>
                            <a style="text-decoration: underline;" href="index.php?act=prdel&pid=<?php echo $value[id];?>"  >Удалить</a> 
                        </td>
                    </tr> 

                    
             <?php   
                $n++;
                }
                ?>
                    <tr>
                        <td colspan="10" align="right">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10" align="right">
                            <input type="button" value="Добавить" onclick="javascript:_addProduct();"/>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    <div class="row_visio" style="display: none;font-size: 16px;font-weight: bold;color: black;" id="pedit">
        
        <div style="position:relative;width: 480px;outline: 1px solid red;">
        <p>Редактировать</p>
        <form id="edit_row" action="index.php?act=pedit" method="post">
            <input type="hidden" name="pid" value=""/>
            <br/>
            &nbsp;
            <br/>
            <select name="pgroup" required >
                <?php
                                foreach ($group_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pname" size="46" placeholder="Наименование"/>
            <br/>
            &nbsp;
            <br/>
            <textarea cols="44" rows="3" name="dscr" placeholder="Описание"></textarea>
            <br/>
            &nbsp;
            <br/>
            <select name="ptype" required >
                <?php
                                foreach ($type_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            <br/>
            &nbsp;
            <br/>
             <select name="pqlty" required >
                <?php
                                foreach ($quality_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            &nbsp;&nbsp;
            <input type="text" size="5" name="stars" placeholder="Оценка"/>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pweight" size="46" placeholder="Вес/объем"/>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pprice" size="46" placeholder="Цена"/>
            <br/>
            &nbsp;
            <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Изменить"/>  
            <br/>
            &nbsp;
            <br/>
        </form>
        </div> 
                <div id="wrapper" style="outline: 1px solid black;">
	<div id="container">
		<div class="sliderbutton" id="slideleft" onclick="slideshow.move(-1)"></div>
		<div id="slider">
			<ul>
                            <?php 
                            foreach ($imgs_array as $value) {
                                ?>
                                <li>
                                    <input type="image" src="http://brioso-lab.ru/images/items/<?php echo $value[name];?>" width="240" height="240" alt="Image" onClick="javascript:alert('ID image is <?php echo $value[id];?>');"/>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
		</div>
		<div class="sliderbutton" id="slideright" onclick="slideshow.move(1)"></div>
		<ul id="pagination" class="pagination">
                    <?php 
                    $n = 0;
                            foreach ($imgs_array as $value) {
                                ?>
                                <li onclick="slideshow.pos(<?php echo $n;?>)"></li>
                                <?php
                                $n++;
                            }
                            ?>
		</ul>
	</div>
</div>
    </div>

		</div>
<script type="text/javascript">
var slideshow=new TINY.slider.slide('slideshow',{
	id:'slider',
	auto:0,
	resume:true,
	vertical:false,
	navid:'pagination',
	activeclass:'current',
	position:0,
	rewind:false,
	elastic:true,
	left:'slideleft',
	right:'slideright'
});
</script>