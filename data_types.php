<?php
$handle = fopen ("php://stdin","r");
$i = 4;
$d = 4.0;
$s = "HackerRank ";

$fptr = fopen('/var/www/html/exec.php', "w");

// Declare second integer, double, and String variables.
$int_input = 0;
$dbl_input = 0.0;
$str_input = '';

// Read and save an integer, double, and String to your variables.

fscanf($handle, "%d\n", $int_input);
$int_sum = $i + (int) $int_input;

fscanf($handle, "%f\n", $dbl_input);
$dbl_sum = (string) number_format( $i + $dbl_input, 1 );

fscanf($handle, "%[^\n]", $str_input);
$str_sum = $s . $str_input;

// Print the sum of both integer variables on a new line.
fwrite($fptr, $int_sum);
fwrite($fptr, "\n");

// Print the sum of the double variables on a new line.
fwrite($fptr, $dbl_sum );
fwrite($fptr, "\n");

// Concatenate and print the String variables on a new line
// The 's' variable above should be printed first.

fwrite($fptr, $str_sum);

fclose($fptr);
fclose($handle);

