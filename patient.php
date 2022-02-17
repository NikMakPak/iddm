<?php
include "database/db_functions.php";
$patient = selectOne('users_medcard', ['id_patient'=>$_GET['id']]);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="front-end/img/favicon32.ico" type="image/x-icon">
    <link rel="stylesheet" href="front-end/css/patient.css">
    <script src="https://kit.fontawesome.com/3edbf969cc.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient - IDDM</title>
</head>

<body>
    <header>
        <div class="wrap header-wrap">
            <div class="up">
                <img src="front-end/img/logo_main.png" alt="logo" srcset="front-end/img/logo_main.svg">
                <h1><i class="fas fa-chevron-right"></i> МЕДКАРТА ПАЦИЕНТА</h1>
            </div>
            <div class="logout">
                <a href="#" class="exit btn txt_smallfont" role="button"><i class="fas fa-sign-out-alt"></i> Выйти из системы</a>
            </div>
        </div>


    </header>
    <div class="about">
        <div class="name">
            <div class="fio txt_bigfont"><span class="template">фио:</span><?php echo $patient['fio']?></div>
        </div>

        <div class="gen txt_midfont"><span class="template">пол:</span><?php echo $patient['gen']?> </div>
        <div class="old txt_midfont"><span class="template">возраст:</span><?php echo $patient['age']?> лет</div>
        <div class="policy txt_midfont"><span class="template">№ полиса ОМС:</span><?php echo $patient['id_patient']?></div>

    </div>
    <div class="work-zone">

        <div class="reception wrap flex-column">

            <div class="wrap reception-wrap flex-column">
                <div class="cap">
                    <h3 class="txt_regularfont">Амбулаторный прием</h3>
                </div>
                <div class="tab txt_smallfont">
                    <i class="far fa-file-alt"></i> Создание документа
                </div>
                <div class="tab txt_smallfont tab_focus">
                    <i class="far fa-file-alt"></i> Создание документа
                </div>
            </div>
            <a href="#" class="reception-back btn txt_regularfont" role="button"><i class="fas fa-chevron-left"></i> ПРИЕМ ПАЦИЕНТОВ</a>
        </div>

        <div class="diagnosis">
            <div class="cap">
                <h3 class="txt_regularfont"><i class="fas fa-stethoscope"></i> Диагноз</h3>
            </div>
            <div class="doc-area">
                <button class="add-doc btn txt_regularfont"><i class="far fa-plus-square"></i> Документ</button>
            </div>

        </div>
    </div>
</body>

</html>