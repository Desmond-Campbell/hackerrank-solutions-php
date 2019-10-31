<?php

function solution($A) {
    // write your code in PHP7.0
    $count = count( $A );
    $sums = array_pad( [], $count, 0 );
    $position = $count;
    $minimum_avg = 10000000;
    $print = false;
    
    for ( $i = 0; $i < $count; $i++ ) {
        
        if ( $i < 1 ) {
            $sums[$i] = $A[$i];
        } else {
            $sums[$i] = $sums[$i-1] + $A[$i];
        }
   
    }
    
    for ( $j = 0; $j < $count; $j++ ) {
    	
    	for ( $k = $j + 1; $k < $count; $k++ ) {

	    	$left_sum = $j < 1 ? 0 : $sums[$j-1];
	    	$right_sum = $sums[$k];

	    	$n = ( $k - $j + 1 );
	    	$avg = round( ( $right_sum - $left_sum ) / $n, 1 );
	    	if ( $print ) print "[$j, $k]: ( $right_sum - $left_sum )/$n = $avg \t";

	    	if ( $avg < $minimum_avg ) {

	    		$position = $j;
	    		$minimum_avg = $avg;

	    	} elseif ( $avg == $minimum_avg ) {

	    		$position = min( $j, $position );
	    		$minimum_avg = $avg;

	    	}

	    }
    
    	if ( $print ) print "\n";

    }

    // if ( $print ) print "\n";

    /*for ( $h = 1; $h < $count; $h++ ) {

	    for ( $j = 0; $j < $count; $j++ ) {
	    	$den = ($j - $h + 1);
	    	if ( $den !== 0 ) {
		    	$avg = round( ( $sums[$j] - $sums[$h-1] )/$den, 1 );
		    	if ( $print ) print "$avg [$h, $j] \t";
		    	if ( $avg <= $minimum_avg ) {
		    		$position = min( $position, $h );
		    		$minimum_avg = $avg;
		    	} else {
			    	if ( $print ) print "* [$h, $j] \t";
		    	}
		    }
	    }

	    if ( $print ) print "\n";

	}*/

    // if ( $print ) print "\n";
    if ( $print ) print "\n";
    if ( $print ) print "$position, $minimum_avg";

    return $position;
    
}

$A = [];
$A[0] = 4;
$A[1] = 2;
$A[2] = 2;
$A[3] = 5;
$A[4] = 1;
$A[5] = 5;
$A[6] = 8;

header("Content-type: text/plain");
solution( $A );
