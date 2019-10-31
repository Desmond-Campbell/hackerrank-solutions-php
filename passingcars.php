<?php

function solution($A) {
    // write your code in PHP7.0
    $count = count( $A );
    $total = 0;

    if ( $count == 1 ) return 0;
    
    if ( $count == 2 ) {

    	if ( abs( $A[0] - $A[1] ) < 1 ) return 0;
    	else return 1;

    }
    
    $first_car = $A[0];
    $multiplier = 0;
    
    for ( $i = 0; $i < $count; $i++ ) {
        
        if ( $total > 1000000000 ) return -1;

        if ( $A[$i] === $first_car ) {
            $multiplier++;
        } else {
            $total += $multiplier * 1;
        } 
        
    }
    
    return $total;
    
}
print solution([1,1]);
print solution([0,0]);
print solution([1]);
print solution([0]);
print solution([1,0]);
print solution([0,1]);
print solution([1,0,1,0,0]);
print solution([0,1,0,1,1]);
