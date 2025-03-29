<?php

ini_set('error_reporting', E_ERROR);
ini_set("display_errors", 1);
ini_set('memory_limit', '1024M');
set_time_limit(120);



echo "<h2>New Bin-Packing algorithm @ CTU in Prague, Faculty of Civil Engineering, K122, by Vjaceslav Usmanov</h2>";

function checking ($variable){
//	$variable = EregI_Replace("<", "&lt;", $variable);
//	$variable = EregI_Replace(">", "&gt;", $variable);
//	$variable = EregI_Replace('"', '&quot;', $variable);	
//	$variable = EregI_Replace('\'', '&quot;', $variable);
//	$variable=htmlspecialchars($variable,ENT_COMPAT,'cp1251');
//	$variable=addslashes($variable);
//	$variable=quotemeta($variable);
//	$variable = round($variable);
return $variable;
}

$run = checking ($_POST['run']);


if (!$run){

	echo "<form  name='form1' ACTION='' METHOD='post' ENCTYPE='multipart/form-data'>";
	echo "<input type='hidden' name='run' value='1'>";
	
	echo "<table>";
	
	echo "<tr>";
	echo "<td colspan='5'><em>Parameter of algorithm NBPA:</em></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>Number of random variants: </td>";
	echo "<td><input type='text' value='50' name='v' size='5'></td>";
	echo "<td> (1 - 1000)</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td colspan='5'><br><em>Multicriterial analyze:</em></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Minimize number of containers: </td>";
	echo "<td><input type='text' value='25' name='m1' size='5'></td>";
	echo "<td> (weight %)</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Minimize number of combinations: </td>";
	echo "<td><input type='text' value='25' name='m2' size='5'></td>";
	echo "<td> (weight %)</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Minimize number of edges/cuts: </td>";
	echo "<td><input type='text' value='25' name='m3' size='5'></td>";
	echo "<td> (weight %)</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Minimize unused space: </td>";
	echo "<td><input type='text' value='25' name='m4' size='5'></td>";
	echo "<td> (weight %)</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td colspan='5'><br><em>Container:</em></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>Size of container: </td>";
	echo "<td><input type='text' value='500' name='container' size='5'></td>";
	echo "<td> (1 - 1000)</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Max number of parts in container: </td>";
	echo "<td><input type='text' value='10' name='w' size='5'></td>";
	echo "<td> (1 - 10)</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "</tr>";
	echo "</table>";

	echo "<table>";
	echo "<tr>";
	echo "<td colspan='5'><br><em>Objects:</em></td>";
	echo "</tr>";

	
	echo "<tr>";
	echo "<td>Objekt 1: </td>";
	echo "<td>Size <input type='text' value='300' name='size1' size='5'></td>";
	echo "<td> ; </td>";
	echo "<td>Number <input type='text' value='10' name='number1' size='5'></td>";
	echo "<td> (1000 x 100)</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Object 2: </td>";
	echo "<td>Size <input type='text' value='250' name='size2' size='5'></td>";
	echo "<td> ; </td>";
	echo "<td>Number <input type='text' value='5' name='number2' size='5'></td>";
	echo "<td> (1000 x 100)</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Object 3: </td>";
	echo "<td>Size <input type='text' value='150' name='size3' size='5'></td>";
	echo "<td> ; </td>";
	echo "<td>Number <input type='text' value='15' name='number3' size='5'></td>";
	echo "<td> (1000 x 100)</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Object 4: </td>";
	echo "<td>Size <input type='text' value='100' name='size4' size='5'></td>";
	echo "<td> ; </td>";
	echo "<td>Number <input type='text' value='20' name='number4' size='5'></td>";
	echo "<td> (1000 x 100)</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Object 5: </td>";
	echo "<td>Size <input type='text' value='0' name='size5' size='5'></td>";
	echo "<td> ; </td>";
	echo "<td>Number <input type='text' value='0' name='number5' size='5'></td>";
	echo "<td> (1000 x 100)</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Object 6: </td>";
	echo "<td>Size <input type='text' value='0' name='size6' size='5'></td>";
	echo "<td> ; </td>";
	echo "<td>Number <input type='text' value='0' name='number6' size='5'></td>";
	echo "<td> (1000 x 100)</td>";
	echo "</tr>";

	
	echo "<tr>";
	echo "<td>Object 7: </td>";
	echo "<td>Size <input type='text' value='0' name='size7' size='5'></td>";
	echo "<td> ; </td>";
	echo "<td>Number <input type='text' value='0' name='number7' size='5'></td>";
	echo "<td> (1000 x 100)</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Object 8: </td>";
	echo "<td>Size <input type='text' value='0' name='size8' size='5'></td>";
	echo "<td> ; </td>";
	echo "<td>Number <input type='text' value='0' name='number8' size='5'></td>";
	echo "<td> (1000 x 100)</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Object 9: </td>";
	echo "<td>Size <input type='text' value='0' name='size9' size='5'></td>";
	echo "<td> ; </td>";
	echo "<td>Number <input type='text' value='0' name='number9' size='5'></td>";
	echo "<td> (1000 x 100)</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Object 10: </td>";
	echo "<td>Size <input type='text' value='0' name='size10' size='5'></td>";
	echo "<td> ; </td>";
	echo "<td>Number <input type='text' value='0' name='number10' size='5'></td>";
	echo "<td> (1000 x 100)</td>";
	echo "</tr>";

	echo "</table>";

	echo "<table>";
	echo "<tr>";
	echo "<td>or all objects: </td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Sizes <input type='text' value='' name='size_' size='100'></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Numbers <input type='text' value='' name='number_' size='100'></td>";
	echo "</tr>";
	echo "</table>";

	echo "<br><INPUT TYPE='submit' VALUE='Run Algorithm'></form>";
}else{


	$w = checking ($_POST['w']);
	if ($w < 1) $w = 1;
	if ($w > 10) $w = 10;

	$v = checking ($_POST['v']);
	if ($v < 1) $v = 1;
	if ($v > 1000) $v = 1000;
	
	$max_variants = $v;

	$max_number_parts_hard = $w;


	$m1 = checking ($_POST['m1']);
	$m2 = checking ($_POST['m2']);
	$m3 = checking ($_POST['m3']);
	$m4 = checking ($_POST['m4']);
	
	//if (($m1<0)or($m1>9)) $m1 = 5;
	//if (($m2<0)or($m2>9)) $m2 = 5;
	//if (($m3<0)or($m3>9)) $m3 = 5;
	//if (($m4<0)or($m4>9)) $m4 = 5;
	
	
	$container = checking ($_POST['container']);
	if ($container < 1) $container = 1;
	if ($container > 1000) $container = 1000;
	
	
	$size1 = checking ($_POST['size1']);
	if ($size1 < 0) $size1 = 0;
	if ($size1 > 1000) $size1 = 1000;
	$number1 = checking ($_POST['number1']);
	if ($number1 < 0) $number1 = 0;
	if ($number1 > 100) $number1 = 100;

	$size2 = checking ($_POST['size2']);
	if ($size2 < 0) $size2 = 0;
	if ($size2 > 1000) $size2 = 1000;
	$number2 = checking ($_POST['number2']);
	if ($number2 < 0) $number2 = 0;
	if ($number2 > 100) $number2 = 100;

	$size3 = checking ($_POST['size3']);
	if ($size3 < 0) $size3 = 0;
	if ($size3 > 1000) $size3 = 1000;
	$number3 = checking ($_POST['number3']);
	if ($number3 < 0) $number3 = 0;
	if ($number3 > 100) $number3 = 100;

	$size4 = checking ($_POST['size4']);
	if ($size4 < 0) $size4 = 0;
	if ($size4 > 1000) $size4 = 1000;
	$number4 = checking ($_POST['number4']);
	if ($number4 < 0) $number4 = 0;
	if ($number4 > 100) $number4 = 100;

	$size5 = checking ($_POST['size5']);
	if ($size5 < 0) $size5 = 0;
	if ($size5 > 1000) $size5 = 1000;
	$number5 = checking ($_POST['number5']);
	if ($number5 < 0) $number5 = 0;
	if ($number5 > 100) $number5 = 100;

	$size6 = checking ($_POST['size6']);
	if ($size6 < 0) $size6 = 0;
	if ($size6 > 1000) $size6 = 1000;
	$number6 = checking ($_POST['number6']);
	if ($number6 < 0) $number6 = 0;
	if ($number6 > 100) $number6 = 100;
	
	$size7 = checking ($_POST['size7']);
	if ($size7 < 0) $size7 = 0;
	if ($size7 > 1000) $size7 = 1000;
	$number7 = checking ($_POST['number7']);
	if ($number7 < 0) $number7 = 0;
	if ($number7 > 100) $number7 = 100;

	$size8 = checking ($_POST['size8']);
	if ($size8 < 0) $size8 = 0;
	if ($size8 > 1000) $size8 = 1000;
	$number8 = checking ($_POST['number8']);
	if ($number8 < 0) $number8 = 0;
	if ($number8 > 100) $number8 = 100;

	$size9 = checking ($_POST['size9']);
	if ($size9 < 0) $size9 = 0;
	if ($size9 > 1000) $size9 = 1000;
	$number9 = checking ($_POST['number9']);
	if ($number9 < 0) $number9 = 0;
	if ($number9 > 100) $number9 = 100;

	$size10 = checking ($_POST['size10']);
	if ($size10 < 0) $size10 = 0;
	if ($size10 > 1000) $size10 = 1000;
	$number10 = checking ($_POST['number10']);
	if ($number10 < 0) $number10 = 0;
	if ($number10 > 100) $number10 = 100;

	if ($size1>$container) $size1 = $container;
	if ($size2>$container) $size2 = $container;
	if ($size3>$container) $size3 = $container;
	if ($size4>$container) $size4 = $container;
	if ($size5>$container) $size5 = $container;
	if ($size6>$container) $size6 = $container;
	if ($size7>$container) $size7 = $container;
	if ($size8>$container) $size8 = $container;
	if ($size9>$container) $size9 = $container;
	if ($size10>$container) $size10 = $container;
	
	$size_ = checking ($_POST['size_']);
	if ($size_){
		$size_array = explode(",",$size_);
		$size1 = $size_array[0];
		$size2 = $size_array[1];
		$size3 = $size_array[2];
		$size4 = $size_array[3];
		$size5 = $size_array[4];
		$size6 = $size_array[5];
		$size7 = $size_array[6];
		$size8 = $size_array[7];
		$size9 = $size_array[8];
		$size10 = $size_array[9];
	}
	$number_ = checking ($_POST['number_']);
	if ($number_){
		$number_array = explode(",",$number_);
		$number1 = $number_array[0];
		$number2 = $number_array[1];
		$number3 = $number_array[2];
		$number4 = $number_array[3];
		$number5 = $number_array[4];
		$number6 = $number_array[5];
		$number7 = $number_array[6];
		$number8 = $number_array[7];
		$number9 = $number_array[8];
		$number10 = $number_array[9];
	}
	
	
	$parts = Array();
	if (($size1)and($number1)) $parts[$size1]=$number1;
	if (($size2)and($number2)) $parts[$size2]=$number2;
	if (($size3)and($number3)) $parts[$size3]=$number3;
	if (($size4)and($number4)) $parts[$size4]=$number4;
	if (($size5)and($number5)) $parts[$size5]=$number5;
	if (($size6)and($number6)) $parts[$size6]=$number6;
	if (($size7)and($number7)) $parts[$size7]=$number7;
	if (($size8)and($number8)) $parts[$size8]=$number8;
	if (($size9)and($number9)) $parts[$size9]=$number9;
	if (($size10)and($number10)) $parts[$size10]=$number10;

	// End
	echo "<br>>>> Start algorithm <<<<br>";

	include ("pila.php");
		
	// End
	echo "<br><br>>>> End algorithm <<<<br>";

}
echo "<hr>";
echo "<b>E-mail: vjacheslav.usmanov@fsv.cvut.cz</b>";
?>
