<?php

function solution($A) {
    // write your code in PHP7.0
    sort( $A );
    $A = array_filter( $A, function($e) { return $e > 0; } );
    $count = count( $A );

    if ( $count < 1 ) return 1;
    if ( $count == 1 ) {
        if ( $A[0] != 1 ) return 1;
        else return 2;
    }
    
    for ( $i = 1; $i < $count; $i++ ) {

        if ( $A[$i] - $A[$i-1] > 1 ) {
            
            return $A[$i-1] + 1;
            
        }
        
    }
    
    return $A[$count - 1] + 1;
    
}