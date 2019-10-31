<?php

error_reporting(-1);

// Complete the sockMerchant function below.
function countingValleys($n, $s) {

    $valleys = 0;
    $matches = [];

    $prefix_sums = array_pad( [], $n, 0);
    $steps = array_pad( [], $n, 0);

    for ( $i = 0; $i < $n; $i++ ) {

        $step = $s[$i];
        $value = $step == 'D' ? -1 : 1;
        $steps[$i] = $step;

        if ( $i > 0 ) {

            $prefix_sums[$i] = $prefix_sums[$i-1] + $value;

        } else {

            $prefix_sums[0] = $value;

        }

        if ( $prefix_sums[$i] === 0 ) {

            $sea_level_stops[] = $i;

        }

    }

    // print_r([ $sea_level_stops, $prefix_sums ]);

    for ( $j = 0; $j < count( $sea_level_stops ); $j++ ) {

        $current_position = $sea_level_stops[$j];

        $end_point = $end_point ?? ( $current_position - 1 );

        if ( $j < 1 ) {

            $start_point = 0;

        } else {

            $start_point = $end_point + 2;

        }

        $end_point = $current_position - 1;

        if ( $prefix_sums[$start_point] == -1 && $prefix_sums[$end_point] == -1 ) {

            $matches[] = [ $start_point, $end_point ];

        }

    }

    $valleys = count( $matches );

    return $valleys;

}

$s = 'D D D U U D U U D U U U D D';
$s = 'U D D D U D U U';
$s = 'D D U U U U D D';
$s = explode(' ' , $s);
$n = count($s);

$result = countingValleys($n, $s);

print $result;

