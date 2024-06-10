<?php require ('./templates/header.php'); ?>

<h3>BOOKING</h3>

<button class="btn"><a href="./search.php"><< Back</a></button>
<div>
<?php
if(!empty($_POST))
{
    echo "Thank you for booking the {$hotelRooms[$_POST["roomId"]]["bedType"]} bed room ".
    "for CAD$ {$hotelRooms[$_POST["roomId"]]["nightlyCost"]} per night ".
    "at the {$hotelRooms[$_POST["roomId"]]["hotelName"]}" ;
}
?>
<p>We hope you enjoy your stay!
</p>
</div>
<?php include ('./templates/footer.php'); ?>