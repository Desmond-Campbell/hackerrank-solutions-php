<?php


function solution($A, $B, $K) {
    // write your code in PHP7.0
    $divs = 0;
    
    if ( $A % $K === 0 ) $divs++;
    // if ( $B % $K === 0 && $A != $B ) $divs++;
    // print $divs; die;

    $C = $A + $K;
    if ( $K < $B && $K > $A && ( $B - $A > $K ) ) $divs++;
    
    if ( $A == $B ) return $divs;

    $count = floor( $B - $A ) / $K;
    
    $divs += $count;

    return (int) $divs;

}

print solution(101, 123000000, 10000);