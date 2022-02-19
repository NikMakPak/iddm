<?php
include "database/db_functions.php";
$patient = selectOne('users_medcard', ['id_patient'=>$_GET['id']]);
if (((empty($patient))==true) or (isset($_GET['id'])!=true)){
    header('location: ' . $BASE_URL);
}
include "actions/upload_upd_doc.php";
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
            <button class="add-doc btn reload-btn" onclick="document.location='<?php echo $BASE_URL . 'patient.php?id=' . $_GET['id']?>'">
                <i class="fa-solid fa-rotate-right"></i>
            </button>
            <button class="add-doc btn" onclick="document.location='<?php echo $BASE_URL . 'doc_add.php?id=' . $_GET['id']?>'">
                <i class="far fa-plus-square"></i>
                <span class="txt_regularfont"> Документ </span>
            </button>
        </div>
        <section class="doc-form-area">

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
                <?php
                $spec_name=(selectOne('dr_id_list',['spec_dr_id'=>$_SESSION['id']]))['spec_name'];
                $docs=selectAll('docs',['id_patient'=>$_GET['id'],'for_spec_name'=>$spec_name]);
                if (!empty($docs)) {
                    for ($i = 0; $i <= (count($docs) - 1); $i++) {
                        echo '<tr ' . 'onclick="window.location.href=' . "'" . $BASE_URL . 'doc_read-upd.php?id=' . $_GET['id'] . "&id_doc=" . $docs[$i]['id_doc'] . "'" . '; return false"> 
                    <td>' . $docs[$i]['title'] . '</td>
                    <td>' . $docs[$i]['type'] . '</td>
                    <td>' . $docs[$i]['add_time'] . '</td>
                    <td>' . (selectOne('doc_status_list', ['id' => ($docs[$i]['status'])]))['status'] . '</td>
                    </tr>';
                    }
                }else{
                    echo '<tr><td colspan="4"><i>...список документов пуст...</i></td></tr>';
                }
                ?>

                </tbody>
            </table>
        </section>

    </div>
</div>
</body>

</html>