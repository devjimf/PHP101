<?php 

// problem # 1
// Complexity: easy
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

// Problem # 2
// Complexity: easy
// Write a PHP program that takes a string as input and checks if it is a palindrome.

// A palindrome is a word or phrase that reads the same forwards and backwards. 
// Here are some examples of palindromes:

// racecar
// level
// A man, a plan, a canal, Panama!

    function isPalindrome($word){

        $word = str_replace("/[^A-Za-z0-9]/",'', $word );
        
        if($word == strrev($word)){

            return 'Palindrome';

        } else {

            return 'Not Palindrome';

        }

    }
    
    echo '<pre>';
    echo isPalindrome('racecar');
    echo isPalindrome('level');
    echo isPalindrome('A man, a plan, a canal, Panama!');


// Problem # 3
// Complexity: Medium
// Write a PHP program that takes a string as input 
// and returns the most frequently occurring character in the string.

// Here's an example input and output to help clarify the problem:

// Input: "Hello, World!"
// Output: "l"

// Explanation: The character "l" occurs most frequently in the input string, appearing three times.

    function findFreq($str){
        
        $freq = array();
        
        for($i = 0; $i < strlen($str); $i++){
            
            $char = $str[$i];
            
            if (array_key_exists($char, $freq)) {
                $freq[$char]++;
            } else {
                $freq[$char] = 1;
            }
        }
        
        $maxchar = '';
        $maxfreq = 0;
        
        foreach($freq as $char => $count){
            if($count > $maxfreq){
                $maxfreq = $count;
                $maxchar = $char;
            }
        }
        
        return $maxchar;
        
    }

    echo findFreq('boom boom powwwwwwww');

// Problem # 4
// Complexity: easy
// Write a PHP program to add the digits of a positive integer 
// repeatedly until the result has a single digit.Go to the editor

// For example given number is 59, the result will be 5.

    function prob4($num){
       $strnum = strval($num);

       while(strlen($strnum)!= 1){
        $total = 0;
        for($i=0 ; $i < strlen($strnum); $i++){
            $total += intval($strnum[$i]);
           
        }
        $strnum = strval($total);

       }

       return $strnum;

    }
    echo '</pre>';
    echo prob4(48);

// Problem # 5
// Complexity: medium
// Write a program that accepts an array of words and that outputs
// an array of indication that it has a double character in that word

// For example ('add', 'ada', 's') this should be (1,0,0);

    function countDoubled($words){
        
        $resultset = array();
        
        foreach($words as $word){
            
            $flg = 0;
            
            if(strlen($word) > 1){
                
                
                for($i = 0; $i < strlen($word)-1; $i++){
                    $char = $word[$i];
                    
                    if($char === $word[$i+1]){
                        
                        $flg = 1;
                    }
                    
                }
            
            }
           $resultset[] = $flg;
        }
        
        return $resultset;
        
        
    }

    $c = array('add', '5', 'adds', 'ada','adadd');
    echo json_encode(countDoubled($c));


// problem # 6
// complexity: medium
// Write a PHP function that takes an array of integers as 
// input and returns the first pair of integers whose sum is equal to a given target value.

// Function signature: function findPair($arr, $target)

// Input:

// An array of integers, $arr (1 <= count($arr) <= 10^6)
// A target integer value, $target (1 <= $target <= 10^6)
// Output:

// An array containing the pair of integers whose sum is equal to 
// the target value, or an empty array if no such pair exists.

// $arr = [3, 4, 5, 2, 7, 8];
// $target = 10;

// findPair($arr, $target); // returns [3, 7]

    function findPair($arr, $target){
        
        $hash = array();
        
        foreach($arr as $value){
            
            $compliment =  $target-$value;
            
            if(isset($hash[$compliment])){
                
                return array($compliment, $value);
                
            }
            
            $hash[$value] = true;
            
        }
            
            

        }

// another solution 

    function findPairs($arr, $target) {
        // Get the length of the input array
        $n = count($arr);
        
        // Iterate over all pairs of integers in the input array
        for($i = 0; $i < $n; $i++) {
            for($j = $i + 1; $j < $n; $j++) {
                // Check whether the sum of the current pair of integers is equal to the target value
                if($arr[$i] + $arr[$j] == $target) {
                    // If it is, return the pair of integers
                    return array($arr[$i], $arr[$j]);
                }
            }
        }
        
        // If no such pair exists, return an empty array
        return array();
    }
        
    $ar = [5, 9, 5, 2, 7, 8];
    $targ = 10;

    echo json_encode(findPair($ar, $targ));

################################

// Problem: Merge Overlapping Intervals

// You are given an array of intervals, where 
// each interval is represented as a pair of start 
// and end times. Your task is to merge overlapping intervals.

// For example, given the following intervals:


$intervals = [
    [1, 3],
    [2, 6],
    [8, 10],
    [15, 18]
];

// Your function should return:

$result = [
    [1, 6],
    [8, 10],
    [15, 18]
];


//Solution:

function mergeIntervals($intervals) {
    if (count($intervals) <= 1) {
        return $intervals;
    }

    // Sort intervals based on their start times
    usort($intervals, function($a, $b) {
        return $a[0] - $b[0];
    });

    $merged = [];
    $currentInterval = $intervals[0];

    for ($i = 1; $i < count($intervals); $i++) {
        $currentEnd = $currentInterval[1];
        $nextStart = $intervals[$i][0];
        $nextEnd = $intervals[$i][1];

        if ($nextStart <= $currentEnd) {
            // Intervals overlap, update the end time of the current interval
            $currentInterval[1] = max($currentEnd, $nextEnd);
        } else {
            // Intervals don't overlap, add the current interval to the result
            $merged[] = $currentInterval;
            $currentInterval = $intervals[$i];
        }
    }

    // Add the last interval to the result
    $merged[] = $currentInterval;

    return $merged;
}

// Test case
$intervals = [
    [1, 3],
    [2, 6],
    [8, 10],
    [15, 18]
];

$result = mergeIntervals($intervals);
print_r($result); // Output: Array([0] => Array([0] => 1 [1] => 6) [1] => Array([0] => 8 [1] => 10) [2] => Array([0] => 15 [1] => 18))



?>