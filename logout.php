<?php
/**
 * Log out the user by destroying the session
 */

session_start();

unset($_SESSION["Password"]);
session_destroy();

header("Location: ./");
?>
<h3>
	<a href="./">Return to log in...</a>
</h3>
