<?php

function getMinimumFromSlice( $array, $start, $end ) {

	// print_r( [$start, $end ]);die;

	$array = array_slice( $array, $start, max( 1, $end - $start ) );

	return min( $array );

}

function solution($S, $P, $Q) {
    // write your code in PHP7.0
    $S = str_replace( 'A', 1, $S );
    $S = str_replace( 'C', 2, $S );
    $S = str_replace( 'G', 3, $S );
    $S = str_replace( 'T', 4, $S );

    $sequences = str_split( $S, 1);

    // print_r($sequences);die;
    // $count = count( $sequences );
    // $factors = [ 'A' => 1, 'C' => 2, 'G' => 3, 'T' => 4 ];
    $output = [];

    $M = count( $P );

    for ( $m = 0; $m < $M; $m++ ) {

    	$lower_bound = $P[$m];
    	$upper_bound = $Q[$m];

    	// print_r( [ $sequences[$upper_bound], $sequences[$lower_bound] ] ); die;

    	if ( $sequences[$lower_bound] == 1 || $sequences[$upper_bound] == 1 ) {

    		$output[] = 1;

    	} else {

	    	$range = getMinimumFromSlice( $sequences, $lower_bound, $upper_bound );
	    	
			$output[] = (int) $range;

		}

    }

    return $output;

}

$Ss = [];
$Ss[] = [ 'S' => 'CAGCCTA', 'P' => [5, 2, 5, 0], 'Q' => [5, 4, 5, 6] ];
// $Ss[] = [ 'S' => 'GGGGGAGGCGGGGGGAGGGGCGGGGGGGGGG', 'P' => [8, 8, 8, 8, 8], 'Q' => [16, 12, 1, 13, 21] ];

header("Content-type: text/plain");

foreach ( $Ss as $S ) {
	print_r( solution($S['S'], $S['P'], $S['Q']) );
}


/*

2 1 3 2 2 4 1
2 3 6 8 10 14
0 

*/