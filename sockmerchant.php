<?php

error_reporting(E_ALL);

// Complete the sockMerchant function below.
function sockMerchant($n, $ar) {

    $matched = 0;
    sort($ar);

    for ( $i = 1; $i < $n; $i++ ) {
        $colour = $ar[$i];
        $previous_colour = $ar[$i-1];
        
        if ( $colour == $previous_colour ) {
            $matched++;

            if ( $i < $n - 2 ) {
                $i++;
            }
            
        }
    
    }

    return $matched;

}

$ar = [ 10, 20, 20, 10, 10, 30, 50, 10, 20, 30, 50, 60, 70, 80, 80 ];
$n = count($ar);

$result = sockMerchant($n, $ar);

print $result;
die;

