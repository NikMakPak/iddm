<?php
include "database/db_functions.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="front-end/css/schedule_d.css">
    <link rel="shortcut icon" href="front-end/img/favicon32.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/3edbf969cc.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule - IDDM</title>
</head>

<body>
    <header>
        <div class="wrap header-wrap">
            <div class="up">
                <img src="front-end/img/logo_main.png" alt="logo" srcset="front-end/img/logo_main.svg">
                <h1><i class="fas fa-chevron-right"></i> ПРИЕМ ПАЦИЕНТОВ</h1>
            </div>
            <div class="logout">
                <a href="#" class="exit btn txt_regularfont" role="button"><i class="fas fa-sign-out-alt"></i> Выйти из системы</a>
            </div>
        </div>
        <div class="down">
            <i class="fas far fa-clock"></i>
            <h2>План амбулаторного приема</h2>
        </div>

        <section class="toolbar"></section>
    </header>


    <section class="container">
        <div class="cap">
            <h3 class="imp">Пациенты по записи :</h3>
        </div>
        <!-- шаблон для карты пациента > -->

        <?php if (isset($_SESSION['id'])):
            $patients = selectAll('users_medcard',['which_id_doc'=>$_SESSION['id']]);
            for ($i=0; $i <= (count($patients)-1);$i++) {
                echo '<div class="card">
                <div class="name">
                    <div class="time txt_regularfont">' . $patients[$i]['dr_appointment_time'] . '</div>
                    <div class="card-wrap">
                        <div class="fio imp">' . $patients[$i]['fio'] . '</div>
                   </div>
                </div>
                <div class="gen txt_regularfont">' . $patients[$i]['age'] . ", ". $patients[$i]['gen'] . '</div>
                <a href="' . $BASE_URL . 'patient.php?id=' . $patients[$i]['id_patient'] . '" target="_self" class="start btn txt_regularfont" role="button">Начать прием</a></div>';
            }
        ?>
        <?php else:
            echo "bad";
            header('location: ' . $BASE_URL);
            ?>
        <?php endif; ?>

        <!-- < шаблон для карты пациента -->
    </section>
    <footer>
        <div class="txt_smallfont">© 2022 IDDM | Cоздано Макаренко Н.П. для демонстрации в МИРЭА</div>
        <div class="txt_smallfont">Исходный код:
            <a href="https://github.com/NikMakPak/iddm" class="txt_verysmallfont link">Github</a>
        </div>

        <div class="txt_smallfont">Есть вопрос? Свяжитесь с нами:
            <a href="https://t.me/i_nikmak" class="txt_verysmallfont link">Telegram</a>
        </div>

    </footer>
</body>

</html>