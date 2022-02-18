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
    <link rel="stylesheet" href="front-end/css/patient_d.css">
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
            <a href="#" class="exit btn txt_regularfont" role="button"><i class="fas fa-sign-out-alt"></i> Выйти из системы</a>
        </div>
    </div>


</header>
<div class="about">
    <div class="name">
        <div class="fio txt_midfont"><span class="template imp">фио:</span><?php echo $patient['fio']?></div>
    </div>

    <div class="gen txt_midfont"><span class="template imp">пол:</span><?php echo $patient['gen']?> </div>
    <div class="old txt_midfont"><span class="template imp">возраст:</span><?php echo $patient['age']?> лет</div>
    <div class="policy txt_midfont"><span class="template imp">№ полиса ОМС:</span><?php echo $patient['id_patient']?></div>

</div>
<div class="work-zone">

    <div class="reception wrap flex-column">

        <div class="wrap reception-wrap flex-column">
            <div class="cap">
                <h2>Амбулаторный прием</h2>
            </div>
            <div class="tab txt_regularfont tab_focus">
                <i class="far fa-file-alt"></i> Документы пациента
            </div>

            <div class="tab txt_regularfont ">
                <i class="far fa-file-alt"></i> Документы пациента
            </div>
        </div>
        <a href=" <?php echo $BASE_URL . 'schedule.php'?> " class="reception-back btn txt_regularfont" role="button"><i class="fas fa-chevron-left"></i> ПРИЕМ ПАЦИЕНТОВ</a>
    </div>

    <div class="diagnosis">
        <div class="cap">
            <i class="fas fa-stethoscope"></i>
            <h2> Диагноз</h2>
        </div>
        <div class="doc-area">
            <button class="add-doc btn">
                <i class="far fa-plus-square"></i>
                <span class="txt_regularfont"> Документ </span>
            </button>
        </div>
        <section class="doc-form-area">

            <!-- card example -->
            <table class="docs">
                <thead>
                <tr class="head">
                    <td>Название документа</td>
                    <td>Тип</td>
                    <td>Дата и время</td>
                    <td>Статус</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Справка о вылечивании против гриппа и простуды</td>
                    <td>Справка 086у</td>
                    <td>24.02.2003</td>
                    <td>Не просмотрено</td>
                </tr>
                <tr>
                    <td>Справка о вылечивании против гриппа и простуды</td>
                    <td>Справка 086у</td>
                    <td>24.02.2003</td>
                    <td>Не просмотрено</td>
                </tr>
                </tbody>
            </table>
            <!-- card example -->
            <div class="doc-popup"></div>
        </section>

    </div>
</div>
</body>

</html>