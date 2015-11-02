<?php
$x = 5; // global scope

function myTest() {
    $z=20;
    // using x inside this function will generate an error
    echo "<p>Variable z inside function is: $z</p>";
    echo "<p>Variable x inside function is: $x</p>";
}
myTest();
echo "<p>Variable z inside function is: $z</p>";
echo "<p>Variable x outside function is: $x</p>";
echo"<br>";
function hello(){
  $google="sdbjghj";
  echo "<p> the string varibale value is : $google </p>";
}
hello();
?>
