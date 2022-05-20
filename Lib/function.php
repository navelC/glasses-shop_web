<?php
function pagination($limit, $product) {
	$total = count($product);
	$total_page = ceil($total/$limit);
	$product_pagination;
	$id=1;
	$count=0;
	foreach ($product as $products) {
		$product_pagination[$id][$products['id']] = $products;
		$count++;
		if ($count==$limit) {
			$id++;
			$count=0;
		}
	}
	$pagination =  array('product' => $product_pagination, 'page' => $total_page);
	return $pagination;

}
function getPage($total_page) {
	if(isset($_POST['page'])) $current_page = $_POST['page'];
	else if(isset($_GET['page'])) $current_page = $_GET['page'];
	else $current_page=1;
	if($current_page < 1) $current_page = 1;
	else if($current_page > $total_page) $current_page = $total_page;
	return $current_page;
}
function getMax($array, $column)
{
	$max = 0;
	foreach($array as $arr)
	{
		if ($arr[$column] > $max) {
			$max = $arr[$column];
		}
	}

	return $max;
}
function getMin($array, $column)
{
	$min = reset($array)[$column];
	foreach($array as $arr)
	{
		if ($arr[$column] < $min) {
			$min = $arr[$column];
		}
	}

	return $min;
} 
function ascending($a, $b)
{
	if ($a["price"] == $b["price"]) {
		return 0;
	}
	return ($a["price"] > $b["price"]) ? -1 : 1;
}
function descending($a, $b)
{
	if ($a["price"] == $b["price"]) {
		return 0;
	}
	return ($a["price"] < $b["price"]) ? -1 : 1;
}
function ascendingSort($yourArray){
	usort($yourArray,"ascending");
}
function descendingSort($yourArray){
	usort($yourArray,"descending");
}
function filter($array, $min, $max,$column)
{
	return array_filter($array, function($var) use($min,$max,$column){
		return ($var[$column] <= $max && $var[$column] >= $min);
	});
}
function getTime()
{
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$hour = date("h");
	$minute = date("i");
	$second = date("s"); 	
	$tail = date("a");
	if($tail == 'pm' && $hour != 12) $hour+=12;
	$time = $hour.':'.$minute.':'.$second;
	$date = date("Y-m-d");
	$datetime = $date.' '.$time;
	return $datetime;
}


?>