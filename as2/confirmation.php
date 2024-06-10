<?php require ('./templates/header.php'); ?>

<h3 class="title">CONFIRMATION</h3>

<a href="./search.php"><button class="btn" >Back</button></a>
<?php
if(!isset($_POST["fname"])||!isset($_POST["lname"])||$_POST["fname"]==""||$_POST["lname"]=="")
{   
    $name=$_POST["name"];
    $date=$_POST["date"];
    $duration=$_POST["duration"];
    $price=$_POST["price"];
    $id=$_POST["id"];
    $total=$price * $duration;
    $fname=isset($_POST["fname"])?$_POST["fname"]:"";
    $lname=isset($_POST["lname"])?$_POST["lname"]:"";
    $email=isset($_POST["email"])?$_POST["email"]:"";

    echo    '<div class="frame confirmation">' .
            '<form class="" action="./booking.php" method="post">' .
                "<br>First Name<br><input type=\"text\" name=\"fname\" value=\"{$fname}\"></input>" .
                "<br>Last Name<br><input type=\"text\" name=\"lname\" value=\"{$lname}\"></input>" .
                "<br>Email<br><input type=\"email\" name=\"email\" default:\"valid email\" value=\"{$email}\"></input>" .
                "<input type=\"hidden\" name=\"name\" value=\"{$name}\"></input>" .
                "<input type=\"hidden\" name=\"date\" value=\"{$date}\"></input>" .
                "<input type=\"hidden\" name=\"duration\" value=\"{$duration}\"></input>" .
                "<input type=\"hidden\" name=\"price\" value=\"{$price}\"></input>" .
                "<input type=\"hidden\" name=\"id\" value=\"{$id}\"></input>" .               
                "<button type=\"Submit\">Confirm</button>" .
            '</form><br>' .

            "<div>Please confirm you would like to book <span>{$name}</span> starting on <span>".date("M d Y",strtotime($date))."</span> for <span>{$duration}</span>";
            echo $duration==1?" night":" nights";
            echo "<br>" .
            "<h4>Price per night: $ {$price}<br>" .
            "Total cost per {$duration} nights: $ {$total}<h4></div></div>";
}
?>0

<?php include ('./templates/footer.php'); ?>