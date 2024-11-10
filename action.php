<?php
require_once "db.php";

function check_autorize($log, $pass)
{
    global $users;
    return array_key_exists($log, $users) && $pass == $users[$log]['pass'];
}

// if (check_autorize('rodger', 'qwerty455')) {
//     echo "Yes";
// } else {
//     echo "No";
// }

function check_admin($log, $pass)  {
    global $users;
    //echo $users[$log]['role'];
    return check_autorize($log, $pass) && $users[$log]['role'] == 'admin';
}

// if (check_admin('alex', 'admin2233')) {
//     echo "Yes";
// } else {
//     echo "No";
// }