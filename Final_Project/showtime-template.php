<!-- This is the template for the showtime page. 
To showcase the different showtimes, we will use the GET method to pass the showtime to the template.
-->


<!DOCTYPE html>
<html>
<head>
    <title>Showtime Page</title>
</head>
<body>
    <h1>Showtime Page for <?php echo $_GET['time']; ?></h1>
    <p>This is the showtime content for <?php echo $_GET['time']; ?>.</p>
</body>
</html>