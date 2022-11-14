<?php
#script 9.4

$page_title="User Terdaftar";
include('../includes/header.html');
?>

<h1>Halaman Users</h1>

<?php
require('../includes/mysqli_connect.php');
$sql = "SELECT CONCAT(last_name, ', ', first_name) AS name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM users ORDER BY registration_date DESC";
$r = @mysqli_query($dbc, $sql);
if($r){
    echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
    <tr><td align="left"><strong>Name</strong></td>
    <td align="left"><strong>Registration Date</strong></td>
    </tr>';
    while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
        echo '<tr<td align="left">' . $row['name'] . '</td><td align="left">' . $row['dr'] . '</td></tr>';
    }
    echo '</table>';
}else{
    echo '<p class="error"> Users could not be retrieved</p>';
    echo '<p>' . mysqli_error($dbc) . '<br/> Query: ' . $sql . '</p>';
}
?>

<?php
include('../includes/footer.html');
?>