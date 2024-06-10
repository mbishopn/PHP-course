<?php 
$host='127.0.0.1';
$db='comp2002';
$user='root';
$pass='mysql'; // I'm using my pre-existing mysql setup, that's why I'm using hard-to-guess password :)
$dsn="mysql:host=$host;dbname=$db";

$pdo = new PDO($dsn, $user, $pass);

echo "You're connected!</br></br>";

$stmt=$pdo->prepare('select * from states where name="caca"');
//$stmt=$pdo->prepare('SELECT * FROM airbnb');
$stmt->execute();
if($stmt->rowCount()==0)
{
    echo "Your query return 0 results";
}



print_r($result=$stmt->fetch()); // get the first record

//print_r($result);

echo "this is the default array format we get from fetch<br/>";
echo "<pre>";
print_r($result);
echo "</pre>";
echo $result[0] . '<br />';
echo $result['id'] . '<br /><br/>';


echo "let's see what PDO::FETCH_ASSOC returns";
$result=$stmt->fetch(PDO::FETCH_ASSOC); // somehow our query's done, so we can continue fetching records one by one with fetch()
echo "<pre>";
print_r($result);
echo "</pre>";
//echo $result[0] . '<br />'; <--- this won't work because now in $result we only have keys, not numbers
echo $result['id'] . '<br /><br>';

echo "if we use PDO::FETCH_NUM then we get this";
$result=$stmt->fetch(PDO::FETCH_NUM);
echo "<pre>";
print_r($result);
echo "</pre>";
echo $result[0] . '<br /><br>';
//echo $result['id'] . '<br />'; <--- this won't work because now in $result we only have numeric indexes, not keys

echo "finally, using PDO::FETCH_OBJ we get this";
$result=$stmt->fetch(PDO::FETCH_OBJ);
echo "<pre>";
print_r($result);
echo "</pre>";
//echo $result[0] . '<br /><br>'; We CAN'T use these because now we're working with an object, so we use -> syntax
//echo $result['id'] . '<br />';
echo $result->id;


?>