<?php require ('./templates/header.php'); ?>

<h3 class="title">BOOKING</h3>

<a href="./search.php"><button class="btn">Search</button></a>
<div>
<?php
    if(!empty($_POST))
    {
        // print_r($_POST);
            $name=$_POST["name"];
            $date=$_POST["date"];
            $duration=$_POST["duration"];
            $price=$_POST["price"];
            $id=$_POST["id"];


        if($_POST["fname"]!=""&&$_POST["lname"]!=""&&$_POST["email"]!="")
        {
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $email=$_POST["email"];
            // echo $id." ".$fname." ".$lname." ".$email." ".$date." ".$duration;
            echo "<p>Thank you for booking</p><p>We hope you enjoy your stay!</p>";
            echo $abnb->set_booking($id,$fname,$lname,$email,$date,$duration)?
            "<br><h2>Reservation successfully booked</h2>":
            "<br><h2>There was a problem while booking, try later<h2>";
        }
        else{
            echo "<div class=\"noRooms\">Error confirming booking. Please go back and try again.</div>" .
            '<form class="confirmation" action="./confirmation.php" method="post">' .
            "<input type=\"hidden\" name=\"fname\" value=\"{$_POST["fname"]}\"></input>" .
            "<input type=\"hidden\" name=\"lname\" value=\"{$_POST["lname"]}\"></input>" .
            "<input type=\"hidden\" name=\"email\" value=\"{$_POST["email"]}\"></input>" .
            "<input type=\"hidden\" name=\"name\" value=\"{$name}\"></input>" .
            "<input type=\"hidden\" name=\"date\" value=\"{$date}\"></input>" .
            "<input type=\"hidden\" name=\"duration\" value=\"{$duration}\"></input>" .
            "<input type=\"hidden\" name=\"price\" value=\"{$price}\"></input>" .
            "<input type=\"hidden\" name=\"id\" value=\"{$id}\"></input>" .            
            "<button type=\"Submit\">Back</button>" .
        '</form></div><br>' ;

        }
    }
    else
    {
        echo "Oops!! you shouldn't be here, go back <a href=\"./search.php\"><button>Search</button></a>";
    }
?>

</div>
<?php include ('./templates/footer.php'); ?>