<?php

date_default_timezone_set('America/New_York');



echo date("Y-m-d") . "<br>";
echo date("Y-m-d H:i") . "<br>";
echo date("Y-m-d h:i A e") . "<br>";
echo date("F d, Y") . "<br>";
echo "<br>";

echo "<br>";
echo "<br>";

echo "PLAYING WITH FUNCTIONS <br><br>"
. "1. to convert a string to a timestamp we can use:<br>"
. '<a href="https://www.php.net/manual/en/function.strtotime.php">strtotime()</a><br>'
. "2. to convert a timestamp to a date we can use:<br>"
. '<a href="https://www.php.net/manual/en/datetime.settimestamp">setTimestamp()</a><br>'
. "3. to set timezone for all date/time functions we can use:<br>"
. '<a href="https://www.php.net/manual/en/function.date-default-timezone-set.php">date_default_timezone_set()</a><br>'
. "4. to get the current date in UTC/GMT we can use:<br>"
. '<a href="https://www.php.net/manual/en/function.gmdate.php">gmdate()</a><br>';

echo "la Fecha de hoy es " . myDate(2023, 12, 12);


function myDate($year, $month, $day)
{
    return date("M d, Y");

}

?>

