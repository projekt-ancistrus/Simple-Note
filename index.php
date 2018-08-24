<?php

$Config = Array(
	"Password"     => "",
	"Database"     => "db.sqlite",
);

session_start();

if (@$_SESSION["Password"] == $Config["Password"] || empty($Config["Password"])) {
	// User is logged in
	require_once("notes.php");
	die();
	
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Try to login, a.k.a. check the password
    if ($_POST["password"] == $Config["Password"]) {
        // success
        $_SESSION["Password"] = $_POST["password"];
        header("Location: ./");
    } else {
	    $error_message = "Wrong password.";
    }
}

require_once("login.inc.php");
?>
