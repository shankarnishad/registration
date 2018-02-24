<?php
session_start();
echo $_SESSION['message'];
echo "<br>".$_SESSION['username'];

?>
<html>
<body><a href="logout.php">logout</a>
    </body>
</html>