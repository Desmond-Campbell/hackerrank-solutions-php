<?php

// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP7.0
    sort( $A );
    $count = count( $A );
    
    if ( $count == 3 ) return $A[0] * $A[1] * $A[2];
    
	for ( $i = 0; $i < $count - 2; $i++ ) {
    
        $this_product = $A[$i] * $A[$i+1] * $A[$i+2];

        if ( $product ?? null ) {

	    	$product = max( $this_product, $product );

	    } else {

	    	$product = $this_product;

	    }

    }
    
    return $product ?? 0;
    
}

$A = [];

$A[0] = -3;
$A[1] = 1;
$A[2] = 2;
$A[3] = -2;
$A[4] = 5;
$A[5] = 6;

print solution( $A );
