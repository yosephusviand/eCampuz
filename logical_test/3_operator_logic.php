<?php

// $angka1 = 8;
// $angka2 = 4;
$angka1 = 7;
$angka2 = 2;
$total  = 0;
$text = "$angka1 : $angka2";
for ($x = 0; $x <= $angka1; $x++) {
	$angka1	=	$angka1 - $angka2 ;
	$total += 	$angka1 >= 0 ? 1 : 0 ;
}

echo "Hasilnya $text = ".$total;