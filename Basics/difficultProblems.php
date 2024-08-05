<?php
class AlienDictionary {
    public function alienOrder($words) {
        $graph = [];
        $indegree = [];
        
        // Initialize the graph and indegree array
        foreach ($words as $word) {
            foreach (str_split($word) as $char) {
                if (!isset($graph[$char])) {
                    $graph[$char] = [];
                }
                if (!isset($indegree[$char])) {
                    $indegree[$char] = 0;
                }
            }
        }
        
        // Build the graph
        for ($i = 0; $i < count($words) - 1; $i++) {
            $word1 = $words[$i];
            $word2 = $words[$i + 1];
            $minLength = min(strlen($word1), strlen($word2));
            
            // Check for invalid input
            if (strlen($word1) > strlen($word2) && substr($word1, 0, $minLength) == substr($word2, 0, $minLength)) {
                return "";
            }
            
            for ($j = 0; $j < $minLength; $j++) {
                if ($word1[$j] != $word2[$j]) {
                    if (!in_array($word2[$j], $graph[$word1[$j]])) {
                        $graph[$word1[$j]][] = $word2[$j];
                        $indegree[$word2[$j]]++;
                    }
                    break;
                }
            }
        }
        
        // Perform topological sort
        $queue = [];
        foreach ($indegree as $char => $degree) {
            if ($degree == 0) {
                $queue[] = $char;
            }
        }
        
        $order = "";
        while (!empty($queue)) {
            $char = array_shift($queue);
            $order .= $char;
            foreach ($graph[$char] as $neighbor) {
                $indegree[$neighbor]--;
                if ($indegree[$neighbor] == 0) {
                    $queue[] = $neighbor;
                }
            }
        }
        
        // Check for cycles in the graph
        if (strlen($order) != count($graph)) {
            return "";
        }
        
        return $order;
    }
}

// Test
$alienDictionary = new AlienDictionary();
$words = ["wrt", "wrf", "er", "ett", "rftt"];
echo $alienDictionary->alienOrder($words); // Output: "wertf"
?>
