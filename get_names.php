<?php
error_reporting(0);

// Array with names
// $a[] = "Alexinator";

// add all added content to array
$filename = "comm_names.txt";
// Open the file
$fp = @fopen($filename, 'r'); 

// Add each line to an array
if ($fp) {
   $a = explode("\n", fread($fp, filesize($filename)));
}

// get the q parameter from URL
$q = $_GET["user"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "Sorry, but your name must be special. Please add it into our names list below!" : $hint;
?>