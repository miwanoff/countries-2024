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

function name($a, $b)
{ // функция, определяющая способ сортировки (по названию столицы)
    if ($a["capital"] < $b["capital"]) {
        return -1;
    } elseif ($a["capital"] == $b["capital"]) {
        return 0;
    } else {
        return 1;
    }

}

function area($a, $b)
{ // функция, определяющая способ сортировки (по названию столицы)
    if ($a["area"] < $b["area"]) {
        return -1;
    } elseif ($a["area"] == $b["area"]) {
        return 0;
    } else {
        return 1;
    }
}

function population($a, $b)
{ // функция, определяющая способ сортировки (по населению)
    if ($a["population"]["2000"] + $a["population"]["2010"] < $b["population"]["2000"] + $b["population"]["2010"]) {
        return -1;
    } elseif ($a["population"]["2000"] + $a["population"]["2010"] == $b["population"]["2000"] + $b["population"]["2010"]) {
        return 0;
    } else {
        return 1;
    }

}

function sorting($how_to_sort)
{
    global $countries;
    uasort($countries, $how_to_sort);
}

function out_arr()
{
    global $countries;
    // делаем переменную $countries глобальной
    $arr_out = [];
    $arr_out[] = "<table>";
    $arr_out[] = "<tr><td>№</td><td>Страна</td><td>Столица</td><td>Площадь</td><td>Население за 2000 год</td><td>Население за 2010 год</td><td>Среднее население</td></tr>";
    foreach ($countries as $country) {
        static $i = 1;
        //статическая глобальная переменная-счетчик
        $str = "<tr>";
        $str .= "<td>" . $i . "</td>";
        foreach ($country as $key => $value) {
            if (!is_array($value)) {
                $str .= "<td>$value</td>";
            } else {
                foreach ($value as $k => $v) {
                    $str .= "<td>$v</td>";
                }

            }

        }
        $str .= "<td>" . (array_sum($country['population']) / count($country['population'])) . "</td>";
        $str .= "</tr>";
        $arr_out[] = $str;
        $i++;
    }
    $arr_out[] = "</table>";
    return $arr_out;
}