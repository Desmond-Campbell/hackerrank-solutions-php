<?php

function formingMagicSquare($s) {

	$targetSum = $s[0][0] + $s[1][1] + $s[2][2];

	$locked = [ [0,0], [1,1], [2,2] ];

	if ( $s[2][0] + $s[1][1] + $s[0][2] == $targetSum ) {
		array_push( $locked, [ 2,0 ] );
		array_push( $locked, [ 0,2 ] );
	}

	for ( $h = 0; $h < 3; $h++ ) {

		$thisSum = 0;

		for ( $v = 0; $v < 3; $v++ ) {

			$thisSum += $s[$h][$v];

		}

		if ( $thisSum == $targetSum ) {

			if ( !in_array( [ $h, $v ], $locked ) ) {

				array_push( $locked, [ $h, $v ] );

			}

		}

	}

	for ( $h = 0; $h < 3; $h++ ) {

		$thisSum = 0;

		for ( $v = 0; $v < 3; $v++ ) {

			$thisSum += $s[$v][$h];

		}

		if ( $thisSum == $targetSum ) {

			if ( !in_array( [ $v, $h ], $locked ) ) {

				array_push( $locked, [ $v, $h ] );

			}

		}

	}

	print_r( $locked );

}

$s = [ [], [], [] ];
$s[0] = [ 4, 8, 2 ];
$s[1] = [ 4, 5, 7 ];
$s[2] = [ 6, 1, 6 ];

print formingMagicSquare( $s );