<?php
#template

$page_title="Login";
include('header.html');
?>

<h1>Login</h1>
<form action="login.php" method="post">
<p>Email Address: <input type="email" name="email" size="30" maxlength="60"/></p>
<p>Password: <input type="pass" name="pass" size="20" maxlength="20"/></p>
<p><input type="submit" name="submit" value="login"/></p>
</form>

<?php
include('footer.html');
?>