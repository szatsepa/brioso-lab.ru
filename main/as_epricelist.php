<script type="text/javascript">
    var pid = <?php echo $attributes[pid];?>;
</script>
<div class="prname">

    &nbsp;&nbsp;
    <a name="" id="pedit"></a>

</div>
<br/>
<?php

//echo $query;

// Защита от прямого набора 
if (!isset($pricelist)) exit();

$num_rows	 = count($pricelist);
$num_fields	 = count($pricelist[0]);
$images_root =  $document_root . '/images/items/';

// Количество строк прайса на странице

$per_page	=	25;
	
$num_pages	= 	ceil($num_rows / $per_page); // Количество страниц прайса

if(!isset($attributes[page]) || $attributes[page] > $num_pages) {
	$attributes[page] = 1;
} 

if (isset($attributes[next_page]) and $attributes[next_page] > 0) {
    $attributes[page] = $attributes[next_page];
}

$current_page = $attributes[page];
$act = "act=".$attributes[act]."&amp;pricelist_id=".$attributes[pricelist_id]."&amp;";

// Устанавливаем границы вывода страниц
$pages = $attributes[page] - 1;
if ($pages <= 1) {
    $pages = 1;
    $left_dots = '';
} else {
    $left_dots = '...';
}

$pages_end = $attributes[page] + 1;
if ($pages_end >= $num_pages) {
    $pages_end = $num_pages;
    $right_dots = '';
} else {
    $right_dots = '...';
}

$border = "";
$pages_display = '';
if (isset($attributes[border])) $border = "&amp;border=".$attributes[border];

if ($num_rows > $per_page){
	$pages_display .= "<div align='right'>Стр. ".$left_dots;    
	while ($pages <= $pages_end) {		
		if ($pages == $current_page) {
			$pages_display .= $pages."&nbsp;";
		} else {
			$pages_display .= "<a href='index.php?".$act."page=".$pages.$border.$urladd."'>".$pages."</a>&nbsp;";
		}	
		++$pages;
	}
	$pages_display .= $right_dots;
    $pages_display .= "&nbsp;<form action='index.php?".$urladd."' method='get'>";  
    
    if (isset($attributes[border])){
        $pages_display .= "<input type='hidden' name='border' value='$attributes[border]'>";
    }
    if(isset ($attributes[search])){
        $pages_display .= "<input type='hidden' name='search' value='1'>";
        $pages_display .= "<input type='hidden' name='word' value='$attributes[word]'>";
    }
    $pages_display .= "<input type='hidden' name='act' value='$attributes[act]'>";
    $pages_display .= "<input type='hidden' name='pricelist_id' value='$attributes[pricelist_id]'>";
    
    
    $pages_display .= "<select name='page' class='common' onchange='javascript:this.form.submit();'>";
        
    for ($i = 1;$i <= $num_pages; ++$i){
        if ($i == $current_page){
            $selected_page = ' selected ';
        } else {
            $selected_page = '';
        }
        $pages_display .= "<option value=".$i.$selected_page.">".$i;
    }    
    $pages_display .= "</option>"; 
    $pages_display .= "</select></form>";
    $pages_display .= "</div>";
    echo $pages_display;
} else {
	echo "<p align='right'>&nbsp;</p>";
}


$row_count 		=	($current_page - 1) * $per_page;
$row_end		=	$row_count + $per_page;
if ($row_end > $num_rows) {
	$row_end	=	$num_rows;
}

$field_count	=	0;

$array_fields = array();

foreach ($pricelist[0] as $key => $value) {
    $array_fields[$field_count] = $key;
	++$field_count;
}

// Вывод прайс-листа

   	

    $fields = array ("Артикул","Штрих-код","&nbsp;","Наименование","Страна","Емкость","Цена ед.","Остаток (шт.)","&nbsp;");

// Выводим блокированные только для редактирования

    echo "<br /><table class='dat' id='price_table'>";
    $th = 0;
    
    while ($th < count($fields)) {
    	echo "<th class='dat'>".$fields[$th]."</th>";
    	++$th;
    }
    
    echo "<tbody>";
    $silver = "style='background-color:ThreedFace;'";
    
    while ($row_count < $row_end) {
        $ostatok = $pricelist[$row_count][$array_fields[8]];
                
    	if ($silver == "style='background-color:ThreedFace;'") {
    				$silver = "";
    	} else {
    		$silver = "style='background-color:ThreedFace;'";
    	}
    	echo "<tr ".$silver.">";
        
   	$id = $pricelist[$row_count][id];
    	$artikul = $pricelist[$row_count][artikul];
        $barcode = $pricelist[$row_count][barcode];
        $code2 = $pricelist[$row_count][code2];
        $name = $pricelist[$row_count][name];
        $state = $pricelist[$row_count][state];
        $volume = $pricelist[$row_count][volume];
        $price = $pricelist[$row_count][price];
        $amount = $pricelist[$row_count][amount];
        
        
        $row_count++;
        
        if (code2 == 'X') {
			
				$td = "&nbsp;";
			
			} else {
			// Здесь выводятся иконки действий
            	               $td =  "<button class='cart' id='e".$id."'>Ред.</button><button class='cart2' id='s".$id."' style='display:none;'>Сохранить</button>&nbsp;<a href='#' class='cloud' id='d".$id."' title='Удалить'>x</a>";
			}
        
        echo "<tr align='center'><td>$artikul</td><td>$barcode</td><td>$code2</td><td align='left'>$name</td><td>$state</td><td>$volume</td><td>$price</td><td>$amount</td><td>$td</td></tr>";

    }
		
    
    if ($num_rows == 0) echo "<tr><td colspan='9'>&nbsp;</td></tr><tr><td colspan='12'><strong id='no_goods'>Нет товаров для отображения</strong></td></tr><tr><td colspan='12'>&nbsp;</td></tr>";    
    echo "</tbody>"; 
    echo "</table><br/><br/>";
    
    
    echo $pages_display;
?>  
    <div id="edit"></div>
