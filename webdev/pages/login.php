<?php
#template
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require('../includes/login_function.inc.php');
    require('../includes/mysqli_connect.php');
    list($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
    if($check){
        // setcookie('user_id', $data['user_id'], time()+3600,'/','',0,0);
        // setcookie('first_name', $data['first_name'], time()+3600,'/','',0,0);
        session_start();
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        
        // store http agent
        $_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
        redirect_user('loggedin.php');
    }else{
        $errors = $data;
    }
    mysqli_close($dbc);
}
?>

<?php
include('../includes/login_page.inc.php');
?>