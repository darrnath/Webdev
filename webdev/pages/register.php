<?php
#template

$page_title="Page Title";
include('../includes/header.html');
//require('../includes/mysqli_connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require('../includes/mysqli_connect.php');
    $errors = array();
    if(empty($_POST['first_name'])){
        $errors[] = "You forgot enter first name.";
    }else{
        $fn=mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    }
    if(empty($_POST['last_name'])){
        $errors[] = "You forgot enter last name.";
    }else{
        $ln=mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    }
    if(empty($_POST['email'])){
        $errors[] = "You forgot enter email.";
    }else{
        $e=mysqli_real_escape_string($dbc, trim($_POST['email']));
    }
    if(empty($_POST['pass1'])){
        $errors[] = "You forgot enter password.";
    }else{
        $p=mysqli_real_escape_string($dbc, trim($_POST['pass1']));
    }
    if(empty($errors)){
        $sql = "INSERT INTO users(first_name, last_name, email, pass, registration_date) VALUES('$fn', '$ln', '$e', SHA1('$p'), NOW())";
        $r=@mysqli_query($dbc, $sql);
        if($r){
            echo '<h1>Thank you!</h1>
            <p>You are now registered</p>';
        }else{
            echo '<h1>System Error</h1>
            <p class="error">You could not be registered</p>';
            echo '<p>' . mysqli_error($dbc) . '<br><br> Query: ' . $sql . '</p>';
        }
    mysqli_close($dbc);
    include('../includes/footer.html');
    exit();
    }else{
        echo '<h1>Error!</h1>
        <p class="error"> The following error(s) occured: <br/></p>';
        foreach($errors as $msg){
            echo "- $msg<br>\n";
        }
    }
    echo '</p><p>Please Try Again</p>'; 
    mysqli_close($dbc);
}
?>

<h1>Register</h1>
    <form action="register.php" method="post">
        <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];?>"></p>
        <p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'];?>"></p>
        <p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"></p>
        <p>Password: <input type="text" name="pass1" size="10" maxlength="20" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1'];?>"></p>
        <p>Confirm Password: <input type="text" name="pass2" size="10" maxlength="20" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2'];?>"></p>
        <p><input type="submit" name="submit" value="Register"></p>
    </form>

<?php
include('../includes/footer.html');
?>