<?php

function pangrams($s) {

    $result = 'not pangram';

    $chars = str_split($s, 1);
    $count = count( $chars );

    if ( $count < 26 ) return $result;

    $collect = array_pad( [], 26, 0 );
    $alphabet = str_split( 'abcdefghijklmnopqrstuvwxyz', 1 );
    $matched = 0;
    $target = 26;
    $positions = [];

    for ( $n = 0; $n < 26; $n++ ){

    	$letter = $alphabet[$n];
    	$positions[$letter] = $n;

    }

    for ( $i = 0; $i < $count; $i++ ) {

    	$char = strtolower( $chars[$i] );
    	$position = $positions[$char] ?? 27;

    	if ( $position <= 26 && $collect[$position] != 1 ) {
    		$collect[$position] = 1;
    		$matched++;
    	}

    	if ( $matched == $target ) {
    		$result = 'pangram';
    		break;
    	}

    }

    return $result;

}

$s = "The quick brown fox jumps over the lazy dog.";

print pangrams($s);