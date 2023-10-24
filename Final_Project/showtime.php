<?php
$time = $_GET['time'];
// $time = urldecode($_GET['time']); // Decode the URL-encoded string
$page = file_get_contents('showtime-template.php');
$page = str_replace('<?php echo $_GET[\'time\']; ?>', $time, $page);  // Replace the placeholder with the actual showtime


// str_replace(): This is a PHP function used to find and replace all occurrences of a specified string with another string in a given text. It takes three arguments:

// The first argument is the string you want to search for (the string to be replaced).
// The second argument is the string you want to replace it with.
// The third argument is the text where the replacement should be performed.
echo $page;


?>

 