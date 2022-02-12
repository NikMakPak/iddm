<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="front-end/css/schedule.css">
    <link rel="shortcut icon" href="front-end/img/favicon32.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/3edbf969cc.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule -IDDM</title>
</head>

<body>
    <header>
        <div class="up">
            <img src="front-end/img/logo_main.png" alt="logo" srcset="front-end/img/logo_main.svg">
            <h1><i class="fas fa-chevron-right"></i> ПРИЕМ ПАЦИЕНТОВ</h1>
        </div>
        <div class="down">
            <i class="fas far fa-clock"></i>
            <h2>План амбулаторного приема</h2>
        </div>

        <section class="toolbar"></section>
    </header>

    <section class="container">
        <div class="cap">
            <h3>Пациенты по записи :</h3>
        </div>
        <!-- шаблон для карты пациента > -->
        <div class="card">
            <div class="name">
                <div class="time">11:00</div>
                <div class="fio">Жор Мура Тишков</div>
            </div>
            <div class="gen">м, 27 лет</div>
            <a href="#" class="start btn txt_smallfont" role="button">Начать прием</a>

        </div>
        <div class="card">
            <div class="name">
                <div class="time">11:00</div>
                <div class="fio">Жор Мура Тишков</div>
            </div>
            <div class="gen">м, 27 лет</div>
            <a href="#" class="start btn txt_smallfont" role="button">Начать прием</a>

        </div>
        <!-- < шаблон для карты пациента -->
    </section>
    <footer>
        <div class="txt_verysmallfont">© 2022 IDDM | создано Макаренко Н.П. для демонстрации в МИРЭА</div>
        <div class="txt_verysmallfont">Исходный код
            <a href="#" class="txt_verysmallfont link">Github</a>
        </div>

        <div class="txt_verysmallfont">Есть вопрос? Свяжитесь с нами
            <a href="#" class="txt_verysmallfont link">Telegram</a>
        </div>

    </footer>
</body>

</html>