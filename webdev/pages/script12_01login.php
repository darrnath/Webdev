<?php
#template
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require('../includes/login_function.inc.php');
    require('../includes/mysqli_connect.php');
    list($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
    if($check){
        setcookie('user_id', $data['user_id']);
        setcookie('first_name', $data['first_name']);
        redirect_user('loggedin.php');
    }else{
        $errors = $data
    }
    mysqli_close($dbc);
}
?>

<?php
include('../includes/login_page.inc.php');
?>