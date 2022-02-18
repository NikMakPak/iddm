<?php
include "database/db_functions.php";
$patient = selectOne('users_medcard', ['id_patient'=>$_GET['id']]);
if (((empty($patient))==true) or (isset($_GET['id'])!=true)){
    header('location: ' . $BASE_URL);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    print_cool($_POST);
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="front-end/img/favicon32.ico" type="image/x-icon">
    <link rel="stylesheet" href="front-end/css/patientd.css">
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
            <div class="exit user btn txt_regularfont" role="button"><i class="fas fa-solid fa-user-doctor"></i>  <?php echo (selectOne('dr',['id_dr'=>$_SESSION['id']]))['cut_fio'] .' , ' . (selectOne('dr_id_list',['spec_dr_id'=>$_SESSION['id']]))['spec_name']?></div>
            <a href="<?php echo $BASE_URL . 'actions/logout.php';?>" class="exit btn txt_regularfont" role="button"><i class="fas fa-sign-out-alt"></i> Выйти из системы</a>
        </div>
    </div>


</header>
<div class="about">
    <div class="name">
        <div class="fio txt_midfont"><span class="template imp">фио:</span>
            <?php echo $patient['fio']?>
        </div>
    </div>

    <div class="gen txt_midfont"><span class="template imp">пол:</span>
        <?php echo $patient['gen']?> </div>
    <div class="old txt_midfont"><span class="template imp">возраст:</span>
        <?php echo $patient['age']?> лет</div>
    <div class="policy txt_midfont"><span class="template imp">№ полиса ОМС:</span>
        <?php echo $patient['id_patient']?>
    </div>

</div>
<div class="work-zone">

    <div class="reception wrap flex-column">

        <div class="wrap reception-wrap flex-column">
            <div class="cap">
                <h2 style="color: #fff">Амбулаторный прием</h2>
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
            <h2 style="color: #fff"> Диагноз</h2>
        </div>
        <div class="doc-area">
            <button class="add-doc btn" onclick="document.location='<?php echo $BASE_URL . 'patient.php?id=' . $_GET['id']?>'">
                <i class="fa-regular fa-rectangle-xmark"></i>
                <span class="txt_regularfont"> Отмена </span>
            </button>
        </div>
        <section class="doc-form-area">
            <div class="doc-popup">
                <div class="cap">
                    <h3 class="popup-title txt_regularfont">Создание документа</h3>
                </div>
                <form action="<?php echo $BASE_URL . 'patient.php?id=' . $_GET['id']?>" method="post">
                    <div class="field">
                        <input type="text" class="form" name="title" placeholder="Название документа" required>
                    </div>
                    <div class="field">
                        <textarea id="editor" class="form txt-area" name="content" rows="6" placeholder="Содержимое документа"></textarea>
                    </div>
                    <div class="wrap down">
                        <div class="field">
                            <input type="file" class="form down-form" name="applied">
                        </div>
                        <select name="type" class="form down-form">
                            <option selected>Направление</option>
                            <option value="справка 086у">Справка 086у</option>
                            <option value="госпитализация">Госпитализация</option>
                            <option value="анализ">Анализ</option>
                            <option value="госпитализация">Госпитализация</option>
                            <option value="на выписку">На выписку</option>
                            <option value="справка о физ. здоровье">Справка о физ. здоровье</option>
                        </select>
                        <select name="for_spec_name" class="form down-form">
                            <option selected>Выберите специализацию врача</option>
                            <option value="участковый">Участковый</option>
                            <option value="лор">Лор</option>
                        </select>
                    </div>
                    <div class="field">
                        <button type="submit"><span class="txt_regularfont"> Создать </span></button>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
<script src="front-end/js/patient.js"></script>
</body>

</html>