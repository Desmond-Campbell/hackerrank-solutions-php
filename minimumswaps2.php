<?php

function minimumSwaps($arr) {

	$count = count( $arr );
	$swaps = 0;
	$isSorted = $inPosition = $isAtEnd = false;
	$i = 0;

	while ( !$isSorted ) {

		$N = $arr[$i];
		$inPosition = $N == $i + 1;
		$isAtEnd = $i == $count - 1;

		if ( !$inPosition ) {

			$temp = $arr[$N-1];
			$arr[$N-1] = $N;
			$arr[$i] = $temp;
			$swaps = $swaps + 1;

		} else {

			$i = $i + 1;
			$isSorted = $inPosition && $isAtEnd;

		}

	}

	return $swaps;

}

$A = [ 7, 1, 3, 2, 4, 5, 6 ];
$A = [ 4, 3, 1, 2 ];

print_r( minimumSwaps( $A ) );