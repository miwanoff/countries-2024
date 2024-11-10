<?php
require_once "action.php";

$autorized = false;
if (isset($_POST["go"])) {
    $login = $_POST["login"];
    $password = $_POST["pass"];
    //echo "$login  $password";
    if (check_autorize($login, $password)) {
        $autorized = true;
        echo "Hello, $login";
    } else {
        echo "You are not registered";
    }
}
$user_form = '<form action="' . $_SERVER['PHP_SELF'] . '" method="post" name="autoForm">
<input type="text" name="login" placeholder="Input login">
<input type="password" name="pass" placeholder="Input password">
<input type="submit" value="Go" name="go">
</form>';

echo $user_form;