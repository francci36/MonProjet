
<?php

require('index.php');

if ($_SERVER['PHP_SELF'] == "index.php") {
    echo "<a href='index.php' class='active'>$index</a>";
} else {
    echo "<a href='index.php'>$index</a>";
}

if ($_SERVER['PHP_SELF'] == "newsletter.php") {
    echo "<a href='newsletter.php' class='active'>$newsletter</a>";
} else {
    echo "<a href='newsletter.php'>$newsletter</a>";
}

if ($_SERVER['PHP_SELF'] == "blog.php") {
    echo "<a href='blog.php' class='active'>$blog</a>";
} else {
    echo "<a href='blog.php'>$blog</a>";
}
if ($_SERVER['PHP_SELF'] == "rdv.php") {
    echo "<a href='rdv.php' class='active'>$rdv</a>";
} else {
    echo "<a href='rdv.php'>$rdv</a>";
}