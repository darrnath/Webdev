<?php
#template
if(!isset($_COOKIE['user_id'])){
    require('../includes/login_function.inc.php');
}else{
    setcookie('user_id', '', time()+3600,'/','',0,0);
    setcookie('first_name', '', time()+3600,'/','',0,0);
}
$page_title="Logged Out";
include('../includes/header.html');
?>

<h1>Logged Out</h1>
<p> Anda sekarang logged out, <?php echo $_COOKIE['first_name'];?></p>
<?php
include('../includes/footer.html');
?>