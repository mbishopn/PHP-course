<?php
include 'airbnb_functions.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AirBNB</title>
    <style>
        table, td, tr {
            border: 1px solid black;
        }

        td, th {
            padding: 4px;
        }
    </style>
  </head>
  <body>
    <?php  // still need this to get our query parameters $state and $maxGuest from $_GET array
        $state = '%';
        $maxGuest = '0';
        if(isset($_GET["state"])) {
            $state = $_GET["state"];
        }

        if(isset($_GET["maxGuest"])) {
            $maxGuest = $_GET["maxGuest"];
        }
    ?>
    <table>
        <thead>
        <tr>
            <th>Host Name</th>
            <th>Air BNB Name</th>
            <th>City Name</th>
            <th>State Name</th>
            <th>Number of rooms</th>
            <th>Max # of guests</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $listings= get_listings($state, $maxGuest);  // call the function and then using each record returned to render our listings table
            foreach($listings as $row ) {  
                echo "<tr>
                    <td>{$row['host_name']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['city_name']}</td>
                    <td>{$row['state_name']}</td>
                    <td>{$row['number_rooms']}</td>
                    <td>{$row['max_guest']}</td>
                    <td>$" . number_format($row['price_by_night'], 2) . "</td>
                    </tr>
                ";
            }
        ?>
    </tbody>
    </table>
  </body>
</html>