<?php

function arrayManipulation($n, $queries) {

	$m = count( $queries );
	$set = array_pad( [], $n, 0 );

	$max_b = 0;
	$min_a = 1;
	
	$max = -1000000000;

	for ( $i = 0; $i < $m; $i++ ) {

		$a = $queries[$i][0];
		$b = $queries[$i][1];
		$k = $queries[$i][2];

		$set[$a-1] += $k;
		$set[$b] += 0 - $k;

	}

	$sums = [ $set[0] ];

	for ( $j = 1; $j < $n; $j++ ) {

		$sums[$j] = $sums[$j-1] + $set[$j];

	}

	$max = max( $sums );

	return $max;

}

$n = 10;

$queries = [];
$queries[] = [ 1, 5, 3 ];
$queries[] = [ 4, 8, 7 ];
$queries[] = [ 6, 9, 1 ];

print arrayManipulation( $n, $queries );