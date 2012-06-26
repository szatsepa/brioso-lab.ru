<h2>Администраторы.</h2>
<table class="dat" id="user_table">
    <tbody>
<th class="dat">Id</th>
<th class="dat">Ф.И.О.</th>
<th class="dat">E-mail</th>
<th class="dat">Телефон</th>
<th class="dat"></th>
<th class="dat"></th>
<!--<th class="dat"></th>-->

<?php 
foreach ($users_array as $value) {
    echo "<tr  id='tr_'".$value["id"].">";
    echo "<td class='dat'>".$value["id"]."</td>";
    echo "<td class='dat'>".$value["surname"]." ".$value["name"]."</td>";
    echo "<td class='dat'>".$value["email"]."</td>";
    echo "<td class='dat'>".$value["phone"]."</td>";
    echo "<td class='dat'><a class='my_link' id='r_user_".$value["id"]."' name='ru".$value["id"]."'>Редакт.</a></td>";
    echo "<td class='dat'><a  class='my_link' id='d_user_".$value["id"]."' name='du".$value["id"]."'>Удалить</a></td>";
//    echo "<td class='dat'><a  class='my_link' id='psw_user_".$value["id"]."' name='pu".$value["id"]."'>Пароль</a></td>";
?>
        
<?php        
    echo "</tr>";
}


?>

</tbody>
</table>
<br/><br/>
<table width="60%">
    <tr>
    <td>
        &nbsp;
    </td>
    <td>
        &nbsp;
    </td>
    <td>
        &nbsp;
    </td>
    <td>
        &nbsp;
    </td>
    <td>
        &nbsp;
    </td>
    <td>
        &nbsp;
    </td>
</tr>
<tr>
    <td colspan="6" align="right">
        <input class="bt" type="button" id="plus_adm" value="Добавить администратора"/>
    </td>
</tr>
</table>

<br/>
<h2>Клиенты.</h2>
<table class="dat"  id="customers_table">
<th class="dat">Id</th>
<th class="dat">Ф.И.О.</th>
<th class="dat">E-mail</th>
<th class="dat">Телефон</th>
<th class="dat"></th>
<th class="dat"></th>
<!--<th class="dat"></th>-->

<?php 
$row = 0;
foreach ($customers_array as $value) {
    echo "<tr id='r_".$row."'>";
    echo "<td class='dat'>".$value["id"]."</td>";
    echo "<td class='dat'>".$value["surname"]." ".$value["name"]." ".$value["patronymic"]."</td>";
    echo "<td class='dat'>".$value["email"]."</td>";
    echo "<td class='dat'>".$value["phone"]."</td>";
    echo "<td class='dat'><a class='my_link' id='r_customer_".$value["id"]."' name='rc".$value["id"]."'>Редакт.</a></td>";
    echo "<td class='dat'><a  class='my_link' id='d_customer_".$value["id"]."' name='dc".$value["id"]."'>Удалить</a></td>";    
    echo "</tr>";
    $row++;
}


?>

</table> 
<?php include("../main/as_user.php");?>