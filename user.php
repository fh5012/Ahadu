<?php
include_once("base.php");
$title = 'User';
include_once("Database/db.php");
include_once("header.php");
?>

<?php

$t = date("H");
if ($title !== 'እንኳን ደህና መጣችሁ') {
    if ($t < "20") {
        echo ' <div class="welcome">
<p class="px-2">መልካም ቀን,';
    } else {
        echo ' <div class="welcome">
<p class="px-2">እንደምን ዋላችሁ,';
    }
    ?>
    <span><?php echo $_SESSION['firstname']; ?></span></p>
    <a class="px-2" href="Include/logout.php">Disconnect</a>
<?php } ?>