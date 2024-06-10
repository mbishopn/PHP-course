<?php 
include_once("./templates/header.php");

//$amenidades=$abnb->get_places('0e391e25-dd3a-45f4-bce3-4d1dea83f3c7',$today,1,1,1,"");
//print_r($amenidades);
$states=$abnb->get_states();
?>

<a href="./index.php"><button class="btn">Home</button></a>

<h3 class="title">SEARCH</h3>
<div class="frame">
    <form  method="post" action="./listing.php">
    Hotel<br>

        <select name="state" id="">
            <option value="State?">-- Select --</option>
            <?php
                    for($i = 0; $i < count($states); $i++) {
                        echo "<option value=\"{$states[$i]["name"]}\">{$states[$i]["name"]}</option>";
                    }
        
        echo "</select>" .
        '<br>Date:<br><input type="date" id="date" name="date" value=' . $today . ' min=' . $today . ' max=' . date("Y")+2 . date("-m-d") .'>';  ?>
        <br>Duration:<br><input type="number" min="0" id="duration" name="duration" value="0">
        <br>Number Rooms<br><input type="number" min="0" id="rooms" name="rooms" value="0">
        <br>Max Guest<br><input type="number" min="0" id="guests" name="guests" value="0">
        <button type="submit">Submit Query</button>
    </form>
<div>
<?php include("./templates/footer.php"); ?>