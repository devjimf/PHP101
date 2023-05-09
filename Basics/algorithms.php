<?php

// 1. Write a PHP program to sort a list of elements using Quick sort.
// Quick sort is a comparison sort, meaning that it can sort items of 
// any type for which a "less-than" relation (formally, a total order) 
// is defined.

function quickSort($arr){
    
    //Counting the array
    if(count($arr) < 2){
        return $arr;
    }
    
    //Define the divisions 
    $lows = array();
    $highs = array();
    
    //Make the first element of the array to be the pivot
    $pivot_key = key($arr);
    $pivot = array_shift($arr);
    
    //Compare each arrays.
    foreach($arr as $num){

        //check if it belongs to low values or high values
        if($num > $pivot){
            $highs[] = $num;
        } elseif ($num <= $pivot) {
            $lows[] = $num;
        }
    }
    
    // Recurse and Output the sorted array
    return array_merge(quickSort($lows),array($pivot_key=>$pivot),quickSort($highs));
    
}

$sorted = quickSort(array(4,2,7,3,5));
echo "Quickly Sorted: ".implode(',',$sorted); //output : Quickly Sorted: 2,3,4,5,7

