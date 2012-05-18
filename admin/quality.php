<?php

/*
 * create 18/5/2012
 * 
 */
?>
<div class="group" style="position: relative;margin-top: 12px;margin-left: 24px;padding-left: 36px;">
    
 <div class="add_g" style="display: none;font-size: 16px;font-weight: bold;color: black;" id="add_group">
     <p>Добавить</p>
        <form id="form_group" action="index.php?act=addqlty" method="post" required>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="gname" size="46" placeholder="Наименование"/>
            <br/>
            &nbsp;
            <br/>
            <textarea cols="44" rows="3" name="dscr" placeholder="Описание"></textarea>
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
            <input type="submit" value="Запомнить"/>  
            <br/>
            &nbsp;
            <br/>
        </form>
    </div>
<div class="table" id="gtable">
        <table border="0">
            <thead style="font-weight: bold;font-size: 14px;color: black;text-align: center;">
                <tr>
                    <td>
                       № 
                    </td>
                    <td>
                       Наименование 
                    </td>
                    <td>
                       Описание 
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
                foreach ($quality_array as $value) {
                    
             echo   "<tr>
                        <td>
                            $n
                        </td>
                        <td>
                            $value[name]
                        </td>
                        <td>
                            $value[comment]
                        </td>";
             ?>
                    
                       <td>
                           <a style="text-decoration: underline;" name="" onClick="javascript:_groupEdit('gedit',<?php echo "'".$value[id]."','".$value[name]."','".$value[comment]."'";?>);">Редактировать</a>
                        </td>
                        <td>
                            <a style="text-decoration: underline;" href="index.php?act=qdel&gid=<?php echo $value[id];?>"  >Удалить</a>
                        </td>
                    </tr> 
             <?php   
                $n++;
                }
                ?>
                    <tr>
                        <td colspan="5" align="right">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">
                            <input type="button" value="Добавить" onclick="javascript:_addGroup('add_group');"/>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    <div class="add_g" style="display: none;font-size: 16px;font-weight: bold;color: black;" id="gedit">
        <p>Редактировать</p>
        <form id="edit_group" action="index.php?act=qedit" method="post" required>
            <input type="hidden" name="gid">
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="gname" size="46" placeholder="Наименование"/>
            <br/>
            &nbsp;
            <br/>
            <textarea cols="44" rows="3" name="dscr" placeholder="Описание"></textarea>
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
</div>
