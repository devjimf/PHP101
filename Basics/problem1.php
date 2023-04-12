<?php 

// Write a PHP program that takes an array of integers as input and 
// returns the sum of all the even numbers in the array.

// Here's an example input and output to help clarify the problem:

// Input: [1, 2, 3, 4, 5, 6]

// Output: 12

    
    function addEven($arr) {
        $total = 0;
        foreach($arr as $num){
            if($num%2 == 0){
                $total += $num;
            }
        }

        return $total;

    }

    $numbers = [1, 2, 3, 4, 5, 8];
    $result = addEven($numbers);

    echo $result;

    

?>