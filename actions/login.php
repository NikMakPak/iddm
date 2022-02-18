<?php
include "database/db_functions.php";

//обработка формы
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $form_id = trim($_POST['dr-id']);
    $form_passw = trim($_POST['dr-passw']);

    $checkData = selectOne('dr',['id_dr'=>$form_id]);
    if ((!empty($checkData)) and ($checkData['password'] === $form_passw)){
        $dr = $checkData;
        $_SESSION['id'] = $dr['id_dr'];
        $_SESSION['fio'] = $dr['fio'];
//      редирект на schedule.html
        header('location: ' . $BASE_URL . 'schedule.php');
    }else{
        echo "<h3><i>Пользователь не найден</i></h3>";
    }

}
