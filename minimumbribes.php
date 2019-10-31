<?php

$q = [ 1, 2, 5, 3, 7, 8, 6, 4 ];
// $q = [ 1, 2, 5, 3, 4, 7, 8, 6, ];
// $q = [ 2, 5, 1, 3, 4 ];
/*
1 2 3 4 5 6 7 8

* 5 | 1 2 3 5 4 6 7 8
* 5 | 1 2 5 3 4 6 7 8
! 6 | 1 2 5 3 6 4 7 8
* 7 | 1 2 5 3 6 7 4 8
* 7 | 1 2 5 3 7 6 4 8
* 8 | 1 2 5 3 7 6 8 4
* 8 | 1 2 5 3 7 8 6 4

1 2 5 3 7 8 6 4
1 2 3 7 5 8 6 4 | 5 -> 2, 7 -> -1, 3 -> -1 => 0
1 2 3 8 5 6 7 4 | 7 -> 3, 8 -> -2, 6 -> -1 => 0
1 2 3 6 5 4 7 8 | 8 -> 4, 4 -> -2, 6 -> -2 => 0
1 2 3 4 5 6 7 8 | 6 -> 2, 4 -> -2 => 0

1 2

5 3 7 8 6 4
4 2 6 7 5 3





1 2 3 4 5 6 7 8
1 2 5 3 7 8 6 4

5 -> 3 = 2
3 -> 4 = -1
7 -> 5 = 2
8 -> 6 = 2
6 -> 7 = -1
4 -> 8 = -4
*/

function minimumBribes($q) {

    $count = count( $q );
    $bribes = 0;
    $too_chaotic = false;

    for ( $i = 1; $i <= $count; $i++ ) {

        $forward = $q[$i-1] - $i;

        if ( $forward > 2 ) {
            echo 'Too chaotic' , "\n";
            $too_chaotic = true;
            break;
        }

        if ( $q[$i-1] <= $i ) {

            $r = $q;

            $count_cut = $count - $i;
            $check_value = $q[$i-1];
            $caught = 0;
            
            for ( $j = $i; $j < $count; $j++ ) {
                
                $array_value = $q[$j];

                if ( $check_value > $array_value ) {
                    $bribes++;
                    $caught++;
                } else {
                	$caught++;
                }

                if ( $caught > 20 ) {
                	break;
                }

            }

        } elseif ( $forward > 0 ) {

            $bribes += $forward;

        }

    }

    if ( !$too_chaotic ) echo $bribes, "\n";

}