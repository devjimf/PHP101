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


// 2. Write a PHP program to sort a list of elements using Heap sort.
// a sorting algorithm that uses a heap data structure to find the maximum element 
// and move it to the sorted region. It's an improved selection sort with a runtime 
// of O(n log n) in the worst case. It's not a stable sort and works in-place.

function heapify(&$arr, $n, $i){
    
    $largest = $i;
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;
    
    if ($left < $n && $arr[$left] > $arr[$largest]){
        $largest = $left;
    }
    if ($right < $n && $arr[$right] > $arr[$largest]){
        $largest = $right;
    }
    if ($largest != $i) {
        $temp = $arr[$i];
        $arr[$i] = $arr[$largest];
        $arr[$largest] = $temp;

        heapify($arr, $n, $largest);
    }
    
}

function heapSort(&$arr){
    
    $n = count($arr);

    for ($i = floor($n / 2) - 1; $i >= 0; $i--){
        heapify($arr, $n, $i);
    }
    for ($i = $n - 1; $i >= 0; $i--) {
        $temp = $arr[0];
        $arr[0] = $arr[$i];
        $arr[$i] = $temp;

        heapify($arr, $i, 0);
    }
    
}

$arr = array(4, 10, 3, 5, 1);
heapSort($arr);
print_r($arr);
echo 2*1+2; //3
echo floor(2.5); //2

// 3. Write a PHP program to sort a list of elements using Bubble Sort: 
// This simple sorting algorithm repeatedly compares adjacent 
// elements and swaps them if they are in the wrong order. It continues 
// iterating through the list until the entire list is sorted. 
// Bubble Sort has a time complexity of O(n^2) and 
// is not very efficient for large datasets.

function bubbleSort($arr){

    $length = count($arr);

    for ($i=0; $i < $length - 1 ; $i++) { 

        for ($j=0; $j < $length - $i - 1 ; $j++) { 
            
            if ($arr[$j] > $arr[$j+1]) {

                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $temp;

            }

        }

    }

    return $arr;

}

$nums= array(4,1,2);

print_r(bubbleSort($nums));

// 4. Write a Insertion sort algorithm. This algorithm builds the 
// final sorted array one item at a time. It takes each element and 
// inserts it into its correct position within the sorted portion of the array. 

function insertionSort($arr){
    
    $length = count($arr);
    
    for($i=1; $i < $length; $i++){
        
        $key = $arr[$i];
        $j = $i - 1;
        
        while($j >= 0 && $arr[$j] > $key){
            
            $arr[$j+1] = $arr[$j]; // changes the value 
            $j--;
            
        }
        
        $arr[$j+1] = $key; 
        
    }
    
    return $arr;
    
}

$arra = array(1, 3, 10, 6, 5);

print_r(insertionSort($arra));