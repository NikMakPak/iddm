<?php
session_start();
include "../database/db_functions.php";
unset($dr);
unset($_SESSION['id']);
unset($_SESSION['fio']);

header('location: ' . $BASE_URL);

