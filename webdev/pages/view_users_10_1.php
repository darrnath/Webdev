<?php
#script 10.1

$page_title="User Terdaftar";
include('../includes/header.html');
?>

<h1>Halaman Users</h1>

<?php
require('../includes/mysqli_connect.php');
$sql = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, user_id FROM users ORDER BY registration_date ASC";
$r = @mysqli_query($dbc, $sql);
if($r){
    echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
    <tr><td align="left"><strong>Edit</strong></td>
    <td align="left"><strong>Delete</strong></td>
    <td align="left"><strong>Last Name</strong></td>
    <td align="left"><strong>First Name</strong></td>
    <td align="left"><strong>Registration Date</strong></td>
    </tr>';
    while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
        echo '<tr>
        <td align="left"><a href="edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>
        <td align="left"><a href="delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>
        <td align="left">' . $row['last_name'] . '</td>
        <td align="left">' . $row['first_name'] . '</td>
        <td align="left">' . $row['dr'] . '</td></tr>';
    }
    echo '</table>';
    mysqli_free_result($r);
}else{
    echo '<p class="error"> Users could not be retrieved</p>';
    echo '<p>' . mysqli_error($dbc) . '<br/> Query: ' . $sql . '</p>';
}
?>

<?php
include('../includes/footer.html');
?>