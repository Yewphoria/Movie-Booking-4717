<?php
  session_start();
  
  // store to test if they *were* logged in
  $old_user = $_SESSION['valid_user'];  
  unset($_SESSION['valid_user']);
  session_destroy();
?>
<html>
<body>
<h1>Log out</h1>
<?php 
  if (!empty($old_user))
  {
    echo '<script>alert("You have been logged out");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
  }
  else
  {
    // if they weren't logged in but came to this page somehow
    echo 'You were not logged in, and so have not been logged out.<br />';
	echo '<a href="homepage.php">go back home.</a>';
  }
?> 

</body>
</html>
