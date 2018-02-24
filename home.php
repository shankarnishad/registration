<?php
session_start();
echo $_SESSION['message'];
echo "<br>".$_SESSION['username'];

?>