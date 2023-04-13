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

?>