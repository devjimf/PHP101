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

?>