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
        if (check_admin($login, $password)) {
            echo "<a href='hello.php?login=$login'>Просмотр отчета</a>";
        }
    } else {
        echo "You are not registered";
    }
}
$user_form = '<form action="' . $_SERVER['PHP_SELF'] . '" method="post" name="autoForm">
<input type="text" name="login" placeholder="Input login">
<input type="password" name="pass" placeholder="Input password">
<input type="submit" value="Go" name="go">
</form>';

if (!$autorized) {
    echo $user_form;
}

$str_form_s = '<h3>Сортировать по:</h3>
<form action="index.php" method="post" name="sort_form">
    <select name="sort" id="sort" size="1">
        <option value="name">назва</option>
        <option value="area">площа</option>
        <option value="population">среднє населення</option>
    </select>
    <input type="submit" name="submit" value="OK">
</form>';
echo $str_form_s;

if (isset($_POST["sort"])) {
    $how_to_sort = $_POST["sort"];
    sorting($how_to_sort);

    $out = out_arr();

    if (count($out) > 0) {
        foreach ($out as $row) {
            echo $row;
        }
    } else {
        echo "Нет данных";
    }
}