<?php require ('./templates/header.php'); // I used require because database is called from header
?>

<button class="btn"><a href="./assignment1.php">Home</a></button>
<h3>SEARCH</h3>

<form class="frame" method="post" action="./listing.php">
    Hotel
    <select name="hotelName" id="">
        <option value="Default">-- Select --</option>
    <?php // hotel names 
				for($i = 0; $i < count($hotelNames); $i++) {
					echo "<option value=\"{$hotelNames[$i]}\">{$hotelNames[$i]}</option>";
				}
	?>
    </select>
<div>Bed type:
    <?php // bed types
				for($i = 0; $i < count($bedTypes); $i++) {
					echo "<input type=\"checkbox\" name=\"bedType[]\" value=\"{$i}\">{$bedTypes[$i]}</option>";
				}
	?>
</div>
Days of stay:
    <select name="days" id="">
        <option value="Default">-- Select --</option>
    <?php  // number of days
				for($i = 1; $i <= 10; $i++) {
					echo "<option value=\"{$i}\">{$i}</option>";
				}
	?>
    </select>
    <p><input type="submit" value="Search" /></p>

    </form>

<?php include ('./templates/footer.php'); ?>