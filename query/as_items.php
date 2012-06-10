<?php 
// Список товаров (штрих-коды)

if (isset($attributes[barcode])) {

	$condition = "WHERE barcode=".$attributes[barcode];

} else {

	$condition = "";

}

$query = "SELECT barcode, 
                name,
                description,
                ingridients, 
                specification, 
                gost,
                nds
            FROM goods ".
            $condition.
"	ORDER BY barcode";

$result = mysql_query($query) or die($query);

$items = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($items, $var);
}

mysql_free_result($result);

?>