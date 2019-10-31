<?php

// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($N, $A) {
    // write your code in PHP7.0
    $counters = $counters_reset = array_pad( [], $N, 0 );
    
    $count = count( $A );
    $max_value = $current_max_value = 0;
    
    for ( $i = 0; $i < $count; $i++ ) {
        
        $index = $A[$i] - 1;
        
        if ( ( $N + 1 ) != $A[$i] ) {
            
            if ( $index < $N ) {
                $counters[$index]++;
                $current_max_value = max ( $current_max_value, $counters[$index] );
            }
            
        } else {
        
            $max_value += $current_max_value; 
            $current_max_value = 0;  
            $counters = $counters_reset;
            
        }
        
    }
    
    for ( $k = 0; $k < $N; $k++ ) {
        
        $counters[$k] += $max_value;
        
    }
    
    return $counters;
    
}

function t(){
    return microtime(true);
}

$N = 10000;
$A = [];
for ( $i = 0; $i < 100000; $i++ ) {
    $A[] = rand( 1, $N+1 );
}

$t = t();
solution( $N, $A );
$t = t() - $t;

print $t;
