<?php
require_once "db.php";

function check_autorize($log, $pass)
{
    global $users;
    $b = array_key_exists($log, $users) && $pass == $users[$log]['pass'];
    return $b;
}

// if (check_autorize('rodger', 'qwerty455')) {
//     echo "Yes";
// } else {
//     echo "No";
// }