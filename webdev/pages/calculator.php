<?php
#script 3.9
//tambahkan fungsi cetak radio menggunakan php

function create_radio($value, $name='gallon_price'){
    echo '<input type="radio" name="' . $name . '" value="' . $value . '"';
    if(isset($_POST[$name]) && ($_POST[$name]==$value)){
        echo 'checked="checked"';
    }
    echo "> $value ";
}
$page_title="Trip Cost Calculator";
include('../includes/header.html');
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['distance'], $_POST['gallon_price'], $_POST['efficiency']) && is_numeric($_POST['distance']) && is_numeric($_POST['gallon_price']) && is_numeric($_POST['efficiency'])) {
        $gallons = $_POST['distance']/$_POST['efficiency'];
        $dollars = $gallons * $_POST['gallon_price'];
        $hours = $_POST['distance']/65;
        echo'<h1>Total estimated cost</h1>
        <p>Total cost of driving ' . $_POST['distance'] . ' miles, avaraging ' . $_POST['efficiency'] . ' miles per gallon, and paying an average of $' . $_POST['gallon_price'] . ' per gallon, is $' . number_format($dollars, 2) . '.
        If you drive at average of 65 miles per hour, the trip will take approximately ' . number_format($hours, 2) . 'hours</p>';
    }
    else{
        echo '<h1>Error</h1>
        <p class="error">Please Enter a valid distance, price per gallon, and fuel efficiency</p>';
    }
}
?>

<h1>Content Header</h1>

<form action="calculator.php" method="post">
    <p>Distance (in miles): <input type="text" name="distance" value="<?php if(isset($_POST['distance'])) echo $_POST['distance'];?>"/></p>
    <p>Ave. Price Per Gallon: <span class="input">
        <?php
            create_radio('3.00');
            create_radio('3.50');
            create_radio('4.00');
        ?>
    </span></p>
    <p>Fuel Efficiency: <select name="efficiency">
        <option value="10" <?php if(isset($_POST['efficiency']) && ($_POST['efficiency']=='10')) echo 'selected="selected"'; ?>>Terrible</option>
        <option value="20" <?php if(isset($_POST['efficiency']) && ($_POST['efficiency']=='20')) echo 'selected="selected"'; ?>>Decent</option>
        <option value="30" <?php if(isset($_POST['efficiency']) && ($_POST['efficiency']=='30')) echo 'selected="selected"'; ?>>Very Good</option>
        <option value="40" <?php if(isset($_POST['efficiency']) && ($_POST['efficiency']=='40')) echo 'selected="selected"'; ?>>Outstanding</option>
    </select></p>
    <p>Harga Ban: <span class="input">
        <?php
            create_radio('1000', 'harga ban');
            create_radio('11000', 'harga ban');
            create_radio('12000', 'harga ban');
        ?>
    </span></p>
    <p><input type="submit" name="submit" value="calculate"></p>
</form>

<?php
include('../includes/footer.html');
?>