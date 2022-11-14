<?php
#template
session_start();
if(!isset($_SESSION['user_id']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']))){
    require('../includes/login_function.inc.php');
    redirect_user();
}
$page_title="Logged In";
include('../includes/header.html');
?>

<h1>Logged In</h1>

<?php
echo $_SESSION['first_name'];
?>
<?php
include('../includes/footer.html');
?>