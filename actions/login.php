<?php
include "database/db_functions.php";

//обработка формы
if (isset($_POST['dr-id'])){
    $form_id = $_POST['dr-id'];
    $form_passw = password_hash($_POST['dr-passw'],PASSWORD_DEFAULT);

    $db_row = selectOne('dr',['id_dr'=>$form_id]);
    print_cool($db_row);
}
