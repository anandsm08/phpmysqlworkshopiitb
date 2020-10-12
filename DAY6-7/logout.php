<?php
session_start();
session_destroy();
echo "You've been logged out.<a href='result.php'>Redirect to Portal</a>";
?>
