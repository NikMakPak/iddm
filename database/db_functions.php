<?php
session_start();
require "connect.php";

//печать запроса в красивом виде
function print_cool($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

//проверка статуса запроса к БД
function checkError($query){
    $errInfo=$query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}

// подготовка и отправка, а также проверка на ошибку запроса
function makeCheckedQuery($sql,$needReturn = false,$arrToExecute = []){
    global $pdo;
    $query = $pdo->prepare($sql);
    $query->execute($arrToExecute);
    checkError($query);
    if ($needReturn){
        return $query;
    }
}

//раскладывает массив params на sql запрос
function parseArrInSqlString($sql,$params){
    $i=0;
    foreach ($params as $key => $value){
        if (!is_numeric($value)){
            $value="'".$value."'";
        }
        if ($i === 0){
            $sql = $sql . " WHERE $key = $value";
        }else{
            $sql = $sql . " AND $key = $value";
        }
        $i++;
    }
    return $sql;
}

// получение одной строки из из выбранной таблицы
function selectOne($table,$params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)){
        $sql = parseArrInSqlString($sql, $params);
    }
    $sql = $sql . " LIMIT 1";
    return makeCheckedQuery($sql,true)->fetch();
}

// получение всех строк из выбранной таблицы
function selectAll($table,$params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)){
        $sql = parseArrInSqlString($sql, $params);
    }
    return makeCheckedQuery($sql,true)->fetchAll();
}

//запись в таблицу БД
function insert($table, $params){
    global $pdo;
    $i=0;
    $colm='';
    $mask='';
    foreach ($params as $key => $value){
        if ($i === 0){
            $colm = $colm . "$key";
            $mask = $mask . "'" . "$value" . "'";
        }else{
            $colm = $colm . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($colm) VALUES ($mask)" ;
    return makeCheckedQuery($sql,false,$params);
}

//обновление данных в таблице БД
//$id_name - это назвние столба id в бд
function update($table,$id_name,$id,$params){
    global $pdo;
    $i=0;
    $str='';
//   UPDATE 'docs' SET 'done' = 1 WHERE id = 4
    foreach ($params as $key => $value){
        if ($i === 0){
            $str = $str . $key. " = '" . "$value" . "'";
        }else{
            $str = $str .", " . $key . " = '" . "$value" . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE $id_name = $id";
    return makeCheckedQuery($sql,false,$params);
}

////проверка id доктора ??? браузер запоминает id даж при закрытии вкладки
//function isLogin($session, $passw){
//    if ((!empty($session)) and ($session['password'] === $passw)){
//        $dr = $session;
//        $_SESSION['id'] = $dr['id_dr'];
//        $_SESSION['fio'] = $dr['fio'];
//}
