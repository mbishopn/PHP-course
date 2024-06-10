<?php require ('./templates/header.php'); ?>

<a href="./search.php"><button class="btn">Back</button></a>
<h3 class="title">RESULTS</h3>
<?php

if($_POST["state"]=="State?"||$_POST["date"]==""||$_POST["duration"]==0||$_POST["rooms"]==0||$_POST["guests"]==0)
{   
    echo "<div class=\"noParams\">You must enter ALL values. Please go back to search and try again.</div>";
}
else
{  
    $state=$_POST["state"];
    $duration=$_POST["duration"];
    $rooms=$_POST["rooms"];
    $guests=$_POST["guests"];
    $date=$_POST["date"];

    if(isset($_POST["city"])&&$_POST["city"]!="")
    {
        $cities=$_POST["cities"];
        $_city=$_POST["city"] . ",";
        $places=$abnb->getPlaces($_POST["state"],$_POST["rooms"],$_POST["guests"],$_POST["city"]);
    }
    else{
        $_city="";
        $places=$abnb->getPlaces($_POST["state"],$_POST["rooms"],$_POST["guests"],"%");
    }

    $avail=$places==0?0:count($places);
    if($avail==0)
    {
        echo "<div class=\"noRooms\"><p>No places matched your search. Please try again.</p></div>";
    }
    else
    { 
        echo "<div class=\"results\">{$avail}". ($avail>1?" Places ":" Place ") ."available at {$_city} {$state} for {$duration} nights</div>";
    }
    if($avail>0)
    {
        $aux=Array();
        echo "<form class=\"filter\" method=\"post\" action=\"{$_SERVER["PHP_SELF"]}\">Filter by city:" .
            '<select name="city" >'. 
            '<option value="">All</option>' ;
                if(!isset($cities))
                {            
                    foreach($places as $place)
                    {
                        if(!isset($cities[$place["city"]]))
                        {
                            $cities[$place["city"]]=$place["city"];
                            array_push($aux,$place["city"]);
                            echo "<option value=\"{$place["city"]}\">{$place["city"]}</option>";
                        }
                    }
                }
                else
                {
                    $aux=$cities;
                    foreach($cities as $city)
                    {
                        echo "<option value=\"{$city}\">{$city}</option>";
                    }
                }                
                echo "</select><input type=\"hidden\" name=\"state\" value={$_POST["state"]}></input>" .
                "<input type=\"hidden\" name=\"date\" value={$_POST["date"]}></input>" .
                "<input type=\"hidden\" name=\"duration\" value={$_POST["duration"]}></input>" .
                "<input type=\"hidden\" name=\"rooms\" value={$_POST["rooms"]}></input>" .
                "<input type=\"hidden\" name=\"guests\" value={$_POST["guests"]}></input>" ;
                foreach($aux as $city)
                {
                    echo "<input type=\"hidden\" name=\"cities[{$city}]\" value=\"{$city}\"></input>" ;
                }
                echo "<button>Filter</button>" .
        "</form>";
        foreach($places as $place)
        {
            echo'<div class="listing">' .
                    "<h2>{$place["name"]}</h2>" .
                    "<h4>{$place["city"]}, {$place["state"]} (\${$place["price"]} / night)</h4>" .
                    "<p>{$place["place"]}</p>" . 
                    "<ul>" ;
                    foreach($place["amenities"] as $amenity)
                    {
                        echo "<li>{$amenity}</li>" ;
                    }
                    
                    echo "</ul>" .
                    '<form action="./confirmation.php" method="post">' .
                        "<input type=\"hidden\" name=\"name\" value=\"{$place["name"]}\"></input>" .
                        "<input type=\"hidden\" name=\"date\" value=\"{$date}\"></input>" .
                        "<input type=\"hidden\" name=\"price\" value={$place["price"]}></input>" .
                        "<input type=\"hidden\" name=\"duration\" value={$duration}></input>" .
                        "<button class=\"bookBtn\" name=\"id\" value={$place["placeId"]}>Book</button>" .
                    '</form>' .
                "</div>";

        }
    }
 
    echo "</form>";


}
?>

<?php include ('./templates/footer.php'); ?>