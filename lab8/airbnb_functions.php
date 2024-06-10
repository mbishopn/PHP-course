<?php
require 'db_config.php'; // require our constants file to set our db connection

function get_listings($state, $maxGuest)
{

$pdo = new PDO(DSN, USER, PASS);  // object to handle db connection

// query strig, :state and :maxGuests are the keys in the array passed to execute function
$query = "SELECT A.*, B.name AS city_name, B.state_id, 
CONCAT(C.first_name, ' ', C.last_name) AS host_name, D.name AS state_name 
FROM places A
LEFT JOIN cities B on A.city_id = B.id
LEFT JOIN users C on A.user_id = C.id
LEFT JOIN states D ON B.state_id = D.id
WHERE D.name LIKE :state
AND A.max_guest >= :maxGuests
ORDER BY price_by_night DESC";

$stmnt = $pdo->prepare($query);


$stmnt->execute(["state" => $state, "maxGuests" => $maxGuest]);

return ($stmnt->fetchAll(PDO::FETCH_ASSOC));

}

?>
