<?php
//Users 
?>
<h3>Users</h3>
<hr>
<?php if (isset($_SESSION['id'])) { ?>
	<table border="1" cellspacing="5" cellpadding="0" width="100%">
	<thead>
	<tr>
	<th>Name</th>
	<th>Power</th>
	<!--<th>Cash</th>
	<th>Bank</th>
	<th>Rank</th>-->
	</tr>
	</thead>
	<tbody>
	<?php
	include('.../../dbhandler.php');
	
	$sql = "SELECT * FROM users ORDER BY power DESC";
	$result = mysqli_query($connection, $sql);
	
	while ($row = mysqli_fetch_array($result)) {
	?>
	<tr>
	<td><label><a style="color:gray;" href="profile.php?id=<?php echo $row['id']; ?>"><?php 
	
	//$name = $row['name'];
	if ($row['name'] == 'Sean') {
    echo '<i style="
	
	color: cyan;
  text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;

	
	
	">' . '<img src="https://cdn.runescape.com/assets/img/external/oldschool/2015/security_page/Jmod.png">' . $row['name'];
} else {
echo $row['name']; } ?></a></label></td>
	<td><label><?php 
	
	$number = $row['power'];
if ($number < 100000) {
	// Anything less than a million
    $format = number_format($number) . '<a style="color:white;">';
} else if ($number < 1000000) {
    // Anything less than a million
    $format = number_format($number / 1000) . '<a style="color:gray;">K';
} else if ($number < 1000000000) {
    // Anything less than a billion
    $format = number_format($number / 1000000) . '<a style="color:lime;">M';
} else {
    // At least a billion
    $format = number_format($number / 1000000000, 2) . '<a style=color:purple;"><b>B</b>';
}

echo $format; ?></label></td>
	<!--<td><label><?php //echo number_format($row['power'], 0, '.', ','); ?></label></td>
	<td><label><?php //echo $row['cash']; ?></label></td>
	<td><label><?php //echo $row['bank']; ?></label></td>
	<td><label><?php //echo $row['rank']; ?></label></td>-->
	</tr>
	</tbody>
	</table']";
<?php } }//}?>



<! $number = "14500000";

if ($number < 1000000) {
    // Anything less than a million
    $format = number_format($number);
} else if ($number < 1000000000) {
    // Anything less than a billion
    $format = number_format($number / 1000000, 2) . 'M';
} else {
    // At least a billion
    $format = number_format($number / 1000000000, 2) . 'B';
}

echo $format;
 !>

