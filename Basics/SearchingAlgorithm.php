<?php

// Searching Algorithm

// 1. Linear search: This is the simplest searching algorithm. 
// It works by starting at the beginning of the data structure and 
// comparing the search key to each element until it is found or 
// until the end of the data structure is reached.

function linearSearch($arr, $key){
    
    $length = count($arr);

    for($i=0; $i < $length; $i++){

        if($arr[$i] == $key){
            return $i;
        }

    }

    return -1;

}

// Test Case:

$array = [1, 2, 3, 4, 5];
$key = 0;
$index = linearSearch($array, $key);

if ($index == -1) {
  echo "The key was not found.";
} else {
  echo "The key was found at index $index.";
}

// Binary search: This is a more efficient searching algorithm 
// that can be used on sorted data structures. It works by 
// repeatedly dividing the data structure in half and then searching 
// the half that is more likely to contain the search key.

