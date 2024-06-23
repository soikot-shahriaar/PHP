<?php
echo "<h2> foreach loops </h2> <br>";
$arr = array("Bananas", "Apples", "Papers", "Bread", "Butter");

// for ($i=0; $i < count($arr); $i++) { 
//     echo $arr[$i];
//     echo "<br>";
// }

// Better way to do this - foreach loops
foreach ($arr as  $value) {
    echo "$value <br>";
}
