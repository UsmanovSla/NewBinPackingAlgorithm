<?php


//////////////////////////
//// Factorial
function factorial($number){ 
    $factorial = 1; 
    for ($i = 1; $i <= $number; $i++){ 
      $factorial = $factorial * $i; 
    } 
    return $factorial; 
} 



//////////////////////////
//// Allowed combinations

function combination ($arr,$m,$container){
	
	sort($arr);
	
	$n = Array();
	for ($j=1;$j<=$m;$j++){
		if ($j<=$m) $n[$j] = count($arr);
	}
	$combination = Array();
	for ($i1=0;$i1<$n[1];$i1++){
		$temp[0] = $arr[$i1];
		
		for ($i2=$i1;$i2<$n[2];$i2++){
			$temp[1] = $arr[$i2];

			for ($i3=$i2;$i3<$n[3];$i3++){
				$temp[2] = $arr[$i3];

				for ($i4=$i3;$i4<$n[4];$i4++){
					$temp[3] = $arr[$i4];

						for ($i5=$i4;$i5<$n[5];$i5++){
							$temp[4] = $arr[$i5];

								for ($i6=$i5;$i6<$n[6];$i6++){
									$temp[5] = $arr[$i6];

										for ($i7=$i6;$i7<$n[7];$i7++){
											$temp[6] = $arr[$i7];

											for ($i8=$i7;$i8<$n[8];$i8++){
												$temp[7] = $arr[$i8];

												for ($i9=$i8;$i9<$n[9];$i9++){
													$temp[8] = $arr[$i9];

													for ($i10=$i9;$i10<$n[10];$i10++){
														$temp[9] = $arr[$i10];

														if (array_sum($temp)<=$container) {array_push ($combination,$temp);unset ($temp[9]);}
														else {unset ($temp[9]);break;}
													}
													if (array_sum($temp)<=$container) {array_push ($combination,$temp);unset ($temp[8]);}
													else {unset ($temp[8]);break;}
												}
												if (array_sum($temp)<=$container) {array_push ($combination,$temp);unset ($temp[7]);}
												else {unset ($temp[7]);break;}
											}
											if (array_sum($temp)<=$container) {array_push ($combination,$temp);unset ($temp[6]);}
											else {unset ($temp[6]);break;}
										}
									if (array_sum($temp)<=$container) {array_push ($combination,$temp);unset ($temp[5]);}
									else {unset ($temp[5]);break;}
								}
							if (array_sum($temp)<=$container) {array_push ($combination,$temp);unset ($temp[4]);}
							else {unset ($temp[4]);break;}
						}
						if (array_sum($temp)<=$container) {array_push ($combination,$temp);unset ($temp[3]);}
						else {unset ($temp[3]);break;}
				}
				if (array_sum($temp)<=$container) {array_push ($combination,$temp);unset ($temp[2]);}
				else {unset ($temp[2]);break;}
			}
			if (array_sum($temp)<=$container) {array_push ($combination,$temp);unset ($temp[1]);}
			else {unset ($temp[1]);break;}
		}
		if (array_sum($temp)<=$container) {array_push ($combination,$temp);unset ($temp[0]);}
		else {unset ($temp[0]);break;}
	}
	return $combination;
}

//////////////////////////
//// Sort of allowed combinations

// $sort = 1   -  less weigth for same elements
// $sort = 2   -  more weigth for same elements
function sorting_container($combination,$sort){
	
	$combination_optimal = Array();
	$sort_Array = Array();

	foreach ($combination as $key => $val) {
		$difference = (count($val) - count(array_unique($val)))/10 +  mt_rand(1,100)/100;
		if ($sort==1) $sort_Array[$key] = array_sum($val) - $difference;
		if ($sort==2) $sort_Array[$key] = array_sum($val) + $difference;
	}
	
	arsort($sort_Array);
	
	foreach ($sort_Array as $key => $val) {
		array_push($combination_optimal,$combination[$key]);
	}
	
	return $combination_optimal;
}

//////////////////////////
// Reducing combination according to parts

function reducing_combination($combination_working,$parts_working){
	
	$parts = array_unique($parts_working);
	

	$parts_counts = array_count_values($parts_working);

	foreach ($combination_working as $combination_key => $combination) {
		$combination_counts = array_count_values($combination);
		foreach ($parts as $part_key => $part) {
			if ($combination_counts[$part]>$parts_counts[$part]) unset ($combination_working[$combination_key]);
		}
		
		$combination_counts_uniq = array_unique($combination);
		foreach ($combination_counts_uniq as $combination_counts_uniq_key => $combination_uniq) {
			$key = array_search($combination_uniq, $parts_working);
			if ($key === false) {
				unset ($combination_working[$combination_key]);
			}
		}
		
	}
	
	return $combination_working;
}
//////////////////////////




//////////////////////////

$act_time = microtime(true);


// Preparing inputs
krsort($parts);

$part = array();
foreach ($parts as $key => $val) {
    array_push($part,$key);
}

$participating = array();


// Step 1: Prepearing inputs
echo "<br>Size of conteiner: ".$container."<br>";

echo "<br>Sorting parts by decreasing size:<br>";
foreach ($parts as $key => $val) {
    echo "$key = $val<br>";
}

echo "<br>Max participating in container for every part:<br>";
foreach ($parts as $key => $val) {
	$participating[$key] = floor ($container/$key);
}
foreach ($participating as $key => $val) {
    echo "$key = $val<br>";
}

$max_number_parts = max($participating);

if ($max_number_parts>$max_number_parts_hard) $max_number_parts = $max_number_parts_hard;

echo "Max number of parts in container: ".$max_number_parts."<br>";

$list_parts =  array();

for ($j=0;$j<count($part);$j++){
	for ($i=0;$i<$participating[$part[$j]];$i++){
		array_push($list_parts,$part[$j]);
	}
}

// Step 2: All allowed combinations


if ($max_number_parts == 0) {
	echo "Error! Number of parts in container is 0!";
	die();
}

if (count($parts) == 0) {
	echo "Error! Number of objects is 0!";
	die();
}

if (count($parts) > 20) {
	echo "Error! Number of set of objects is too big!";
	die();
}

//array_unshift($part,"");


$allowed_combination = combination($part, $max_number_parts, $container);


$combination_optimal = sorting_container($allowed_combination,1);


$number_all_combination = factorial($max_number_parts + count($parts) -1)/factorial($max_number_parts)/factorial(count($parts) -1);

echo "<br>Number of all combinations of container: ".$number_all_combination."<br>";

echo "<br>Number of allowed combinations of container: ".count($combination_optimal)."<br>";

$combination_working = $combination_optimal;

$parts_working =  array();


foreach ($parts as $key => $val) {
	for ($i=0;$i<$val;$i++){
		array_push($parts_working,$key);
	}
}


$combination_working = reducing_combination($combination_working,$parts_working);

echo "<br>Number of allowed reduced combinations of container: ".count($combination_working)."<br>";


$total_w = Array();
$total_cont = Array();
$total_comb = Array();
$total_cut = Array();
$total_used = Array();
$total_unused = Array();
$total_percent = Array();
$total_multicriterial = Array();


for ($nar=0;$nar<$max_variants;$nar++){

	// Step 3: Superior allowed combination
	$combination_working = $combination_optimal;

	$parts_working =  array();


	foreach ($parts as $key => $val) {
		for ($i=0;$i<$val;$i++){
			array_push($parts_working,$key);
		}
	}

	$combination_working = reducing_combination($combination_working,$parts_working);



	// Step 4: Filling conteiners


	$combination_result = Array();

	$i = 0;

	$parts_space = array_sum($parts_working);

	$parts_total = count($parts_working);
	$combination_total = count($combination_working);


	while (count($parts_working)){

		// Reducing combination according of parts
		$combination_working = reducing_combination($combination_working,$parts_working);
		// Shuffle of combination
		$combination_working = sorting_container($combination_working,1);

		
		array_push($combination_result,$combination_working[0]);

		foreach ($combination_working[0] as $key => $val) {
			$key2 = array_search($val, $parts_working);
			if ($key2 !== false) {
				unset ($parts_working[$key2]);
			}
		}
		$parts_rest[$i] = count($parts_working);
		$combination_rest[$i] = count($combination_working);
		
		$i++; if ($i>500) break;
		
	}

	$number_container = 0;
	$used_space = 0;
	foreach($combination_result as $val) {
		$number_container++;
		//echo $number_container.": ".array_sum($val)." = ".implode('+', $val), "<br>";
		$used_space = $used_space + array_sum($val);
	}
	$container_space =  $number_container * $container;

	echo "<hr>Variant: ".($nar+1)." > Space in containers: ".$container_space." / ";
	echo "Used space: ".$used_space." / ";
	echo "Parts space: ".$parts_space."<br><br>";


	// Step 5: Output results
	echo "<table border='1' cellpadding='2px' style='table-layout: fixed; border-collapse: collapse;'>";
	echo "<tr>";
	echo "<td align='center'>Container</td>";
	echo "<td align='center'>Combination</td>";
	echo "<td align='center'>Used place</td>";
	echo "<td align='center'>Unused place</td>";
	echo "<td align='center'>Combinations</td>";
	echo "<td align='center'>Parts</td>";
	echo "</tr>";
	$number_container = 0;
	$number_of_cutting = 0;

	$combination_list = Array();

	foreach($combination_result as $val) {
		$number_container++;

		$number_of_cutting = $number_of_cutting + count($val);
		echo "<tr>";
		echo "<td align='center'>".$number_container."</td>";
		echo "<td align='left'>".implode('+', $val)."</td>";
		echo "<td align='center'>".array_sum($val)."</td>";
		echo "<td align='center'>".($container-array_sum($val))."</td>";
		echo "<td align='center'>".$combination_rest[$number_container-1]."</td>";
		echo "<td align='center'>".$parts_rest[$number_container-1]."</td>";
		
		echo "</tr>";
		
		array_push($combination_list,implode('+', $val));
		if (($container-array_sum($val))==0) $number_of_cutting--;
	}

	$combination_result_unique = array_unique($combination_list);

	echo "<tr>";
	echo "<td align='center'><b>".count($combination_result)."</b></td>";
	echo "<td align='center'><b>".count($combination_result_unique)." (Cuts: ".$number_of_cutting.")</b></td>";
	echo "<td align='center'><b>".$used_space." (".number_format((($used_space/$container_space)*100),3,',',' ')."%)</b></td>";
	echo "<td align='center'><b>".($container_space-$used_space)."</b></td>";
	echo "<td align='center'><b>".$combination_total."</b></td>";
	echo "<td align='center'><b>".$parts_total."</b></td>";
	echo "</tr>";
	echo "</table>";

	array_push($total_w,$nar);
	array_push($total_cont,count($combination_result));
	array_push($total_comb,count($combination_result_unique));
	array_push($total_cut,$number_of_cutting);
	array_push($total_used,$used_space);
	array_push($total_unused,($container_space-$used_space));
	array_push($total_percent,number_format((($used_space/$container_space)*100),3,',',' '));

}

$total_cont_sort = array_unique($total_cont);
sort($total_cont_sort);

$total_cut_sort = array_unique($total_cut);
sort($total_cut_sort);


$total_unused_sort = array_unique($total_unused);
sort($total_unused_sort);

$total_comb_sort = array_unique($total_comb);
sort($total_comb_sort);


$total_m = $m1 + $m2 + $m3 + $m4; 

$max_containers = $number1 + $number2 + $number3 + $number4 + $number5 + $number6 + $number7 + $number8 + $number9 + $number10;

$size_usage = $number1*$size1 + $number2*$size2 + $number3*$size3 + $number4*$size4 + $number5*$size5 + $number6*$size6 + $number7*$size7 + $number8*$size8 + $number9*$size9 + $number10*$size10;

$max_unused = $container * $max_containers - $size_usage;
$max_cuts = $max_containers;

for ($i=0;$i<count($total_w);$i++){
	
	$total_multicriterial[$i] = (1 - $total_cont[$i] / $max_containers) * $m1;
	$total_multicriterial[$i] += (1 - $total_comb[$i] / count($combination_optimal)) * $m2;
	$total_multicriterial[$i] += (1 - $total_cut[$i] / $max_containers) * $m3;
	$total_multicriterial[$i] += (1 - $total_unused[$i] / $max_unused) * $m4;
	
	
}


echo "<hr>Results of algorithm for ".$max_variants." variants<br>";
echo "<table border='1' cellpadding='2px' style='table-layout: fixed; border-collapse: collapse;'>";
echo "<tr>";
echo "<td>Variant</td>";
echo "<td>M Score</td>";
echo "<td>Containers</td>";
echo "<td>Combinations</td>";
echo "<td>Cuts</td>";
echo "<td>Used place</td>";
echo "<td>Unused place</td>";
echo "<td>Percent usage</td>";
echo "</tr>";


arsort ($total_multicriterial);

foreach ($total_multicriterial as $key => $val) {
	
	echo "<tr>";
	echo "<td align='center'>".($total_w[$key]+1)."</td>";
	echo "<td align='center'>".round($total_multicriterial[$key],3)."</td>";
	echo "<td align='center'>".$total_cont[$key]."</td>";
	echo "<td align='center'>".$total_comb[$key]."</td>";
	echo "<td align='center'>".$total_cut[$key]."</td>";
	echo "<td align='center'>".$total_used[$key]."</td>";
	echo "<td align='center'>".$total_unused[$key]."</td>";
	echo "<td align='center'>".$total_percent[$key]." %</td>";
	echo "</tr>";
}
echo "</tr>";
echo "</table>";

echo "Time: ".number_format(microtime(true) - $act_time,6,',','');

?>