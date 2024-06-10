<?php require ('./templates/header.php'); ?>

<button class="btn"><a href="./search.php"><< Back</a></button>
<h3>RESULTS</h3>
<?php
// validate if all values are present
//if(empty($_POST))
if($_POST["hotelName"]=="Default" || $_POST["days"]=="Default" || empty($_POST["bedType"]))
{   // form incomplete, ask for completion
echo "<p class=\"noParams\">You must select a hotel, bed type, and number of days to search for rooms. Please go back to search and fill out the proper information.</p>";
}
else
{  // from complete, now show reults
    $noRoomFlag=true;
    $matches=0;

    echo "<form method=\"post\" action=\"./booking.php\">";
    foreach($hotelRooms as $room)
    {
        if ($room["hotelName"]==$_POST["hotelName"])
        {
            foreach($_POST["bedType"] as $bedT)
            {
                if($room["bedType"]==$bedTypes[$bedT])
                {
                    if($_POST["days"]<=$room["daysAvailable"])
                    {
                        $noRoomFlag=false;
                        echo "<div class=\"listing\"><p>{$bedTypes[$bedT]} bed @ CAD\$ {$room["nightlyCost"]} per night</p><ul>";
                        $matches++;
                        foreach($room["amenities"] as $amenity)
                        {
                            echo "<li>{$amenity}</li>";
                        }
                        echo "</ul>".
                        "<button class=\"bookBtn\" name=\"roomId\" value=\"{$room["id"]}\">Book</button></div>";
                    }
                }
            }
        }
    }
    echo "</form>";
    if($noRoomFlag==true)
    {
        echo "<div class=\"noRooms\"><p>No rooms matched your search. Please try again.</p></div>";
    }
    else
    { // I have to put this message here to get the number of matches
    echo "<div class=\"results\">{$matches} Rooms available at {$_POST["hotelName"]} for {$_POST["days"]} nights</div>";
    }
}
?>

<?php include ('man g./templates/footer.php'); ?>