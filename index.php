<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyVisa World — Визы в Азию онлайн</title>
    <meta name="description" content="Оформление виз в Индонезию, Таиланд, Вьетнам, Сингапур и Камбоджу. Быстро, надёжно, без походов в посольство.">

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="/include/hfstyle.css">
    <link rel="stylesheet" href="/css/3d-morphism.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            padding-top: 120px;
            font-family: 'Russo One', Arial, sans-serif;
            background: linear-gradient(135deg, #0f1419 0%, #1a2332 100%);
            color: #fff;
            overflow-x: hidden;
        }

        .main-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .content-wrapper {
            max-width: 1000px;
            width: 100%;
            background: linear-gradient(120deg, #212b36ee 88%, #1fa96c33 100%);
            border-radius: 2.5rem;
            box-shadow: 0 0 60px 8px #29fc9444, 0 0 0 4px #29fc94;
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
        }

        .main-title {
            font-family: 'Bebas Neue', Arial, sans-serif;
            font-size: 4.2rem;
            color: #ffe95d;
            letter-spacing: 0.15em;
            text-shadow: 0 4px 28px #151f2bcc, 0 0 2px #000;
            margin-bottom: 0.5rem;
        }

        .main-subtitle {
            font-size: 1.3rem;
            color: #b8c5d1;
            margin-bottom: 3rem;
            line-height: 1.4;
        }

        .country-selector {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .country-card {
            background: linear-gradient(135deg, #2a3441 0%, #3a4a5c 100%);
            border: 2px solid #29fc94;
            border-radius: 20px;
            padding: 25px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: #fff;
            display: block;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .country-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(41, 252, 148, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .country-card:hover::before {
            left: 100%;
        }

        .country-card:hover {
            background: linear-gradient(135deg, #29fc94 0%, #1fa96c 100%);
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 40px rgba(41, 252, 148, 0.4);
            color: #0f1419;
        }

        .country-flag {
            width: 50px;
            height: 30px;
            border-radius: 12px;
            margin-bottom: 15px;
            object-fit: cover;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3),
                0 4px 16px rgba(41, 252, 148, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .country-flag::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.3), 
                transparent);
            transition: left 0.6s ease;
        }

        .country-card:hover .country-flag {
            transform: translateY(-2px) scale(1.05);
            border-color: rgba(41, 252, 148, 0.4);
            backdrop-filter: blur(20px);
            box-shadow: 
                0 12px 40px rgba(41, 252, 148, 0.2),
                inset 0 2px 0 rgba(255, 255, 255, 0.4),
                0 6px 24px rgba(0, 0, 0, 0.4);
        }

        .country-card:hover .country-flag::before {
            left: 100%;
        }

        .country-name {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 8px;
            font-family: 'Bebas Neue', Arial, sans-serif;
            letter-spacing: 0.05em;
        }

        .country-description {
            font-size: 0.9rem;
            opacity: 0.8;
            line-height: 1.3;
        }

        .country-card:hover .country-description {
            opacity: 1;
        }

        .country-card.full-width {
            grid-column: 1 / -1;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 140px;
            }
            .main-container {
                padding: 20px 20px 20px 20px;
            }
            .main-title {
                font-size: 2.8rem;
            }
            .main-subtitle {
                font-size: 1.1rem;
            }
            .content-wrapper {
                padding: 2rem 1.5rem;
                margin: 0;
            }
            .country-selector {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            .country-card {
                padding: 20px 15px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding-top: 130px;
            }
            .main-container {
                padding: 15px 15px 15px 15px;
            }
            .main-title {
                font-size: 2.2rem;
            }
            .content-wrapper {
                padding: 1.5rem 1rem;
                margin: 0;
            }
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 10000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            overflow-y: auto;
            overflow-x: hidden;
            padding: 0;
            box-sizing: border-box;
            align-items: center;
            justify-content: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            position: relative;
            background: linear-gradient(145deg, 
                rgba(12, 12, 21, 0.95) 0%, 
                rgba(26, 31, 46, 0.90) 50%, 
                rgba(15, 20, 25, 0.95) 100%);
            backdrop-filter: blur(25px);
            border-radius: 32px;
            border: 2px solid rgba(41, 252, 148, 0.3);
            box-shadow: 
                0 20px 60px rgba(41, 252, 148, 0.2),
                0 8px 32px rgba(0, 0, 0, 0.4),
                inset 0 2px 0 rgba(255, 255, 255, 0.1);
            padding: 2.5rem 2rem 2rem 2rem;
            text-align: center;
            width: 90vw;
            max-width: 600px;
            max-height: 85vh;
            color: #fff;
            overflow: hidden;
            margin: auto;
        }

        .modal-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #29fc94, transparent);
            opacity: 0.8;
        }

        .modal-content::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(
                from 0deg,
                transparent 0deg,
                rgba(41, 252, 148, 0.1) 90deg,
                transparent 180deg,
                rgba(255, 233, 93, 0.1) 270deg,
                transparent 360deg
            );
            opacity: 0;
            animation: rotate-modal-glow 6s linear infinite;
            pointer-events: none;
            z-index: -1;
        }

        @keyframes rotate-modal-glow {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 2rem;
            cursor: pointer;
            color: #fff;
            transition: color 0.3s ease;
            z-index: 10;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }

        .close:hover {
            color: #29fc94;
        }

        .service-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
            max-height: 50vh;
            overflow-y: auto;
            overflow-x: hidden;
            padding-right: 10px;
            scrollbar-width: thin;
            scrollbar-color: rgba(41, 252, 148, 0.5) transparent;
        }

        .service-list::-webkit-scrollbar {
            width: 6px;
        }

        .service-list::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }

        .service-list::-webkit-scrollbar-thumb {
            background: rgba(41, 252, 148, 0.5);
            border-radius: 3px;
        }

        .service-list::-webkit-scrollbar-thumb:hover {
            background: rgba(41, 252, 148, 0.7);
        }

        .service-item {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(41, 252, 148, 0.3);
            border-radius: 18px;
            padding: 18px;
            text-decoration: none;
            color: #fff;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 4px 20px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .service-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(41, 252, 148, 0.1), transparent);
            transition: left 0.4s ease;
            z-index: 1;
        }

        .service-item:hover::before {
            left: 100%;
        }

        .service-item:hover {
            background: rgba(41, 252, 148, 0.15);
            backdrop-filter: blur(20px);
            border-color: rgba(41, 252, 148, 0.6);
            color: #29fc94;
            transform: translateY(-2px);
            box-shadow: 
                0 8px 30px rgba(41, 252, 148, 0.3),
                0 4px 15px rgba(0, 0, 0, 0.4),
                inset 0 2px 0 rgba(255, 255, 255, 0.2);
        }

        .service-item h3 {
            margin: 0 0 5px 0;
            font-size: 1.2rem;
            position: relative;
            z-index: 2;
        }

        .service-item p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.8;
            position: relative;
            z-index: 2;
        }

        /* Анимация появления модального окна */
        .modal {
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .modal.show {
            opacity: 1;
        }

        .modal-content {
            transform: scale(0.8) translateY(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .modal.show .modal-content {
            transform: scale(1) translateY(0);
        }

        @media (max-width: 768px) {
            .modal {
                padding: 10px;
                align-items: flex-start;
                padding-top: 20px;
            }

            .modal-content {
                width: 95vw;
                max-width: none;
                max-height: 90vh;
                padding: 1.5rem 1rem;
                border-radius: 20px;
                margin: 0;
            }

            .service-list {
                max-height: 70vh;
                gap: 10px;
            }

            .service-item {
                padding: 12px 10px;
                border-radius: 12px;
                min-height: 60px;
            }

            .service-item h3 {
                font-size: 1rem;
                line-height: 1.2;
                margin-bottom: 3px;
            }

            .service-item p {
                font-size: 0.8rem;
                line-height: 1.3;
            }

            .close {
                top: 8px;
                right: 12px;
                width: 32px;
                height: 32px;
                font-size: 1.2rem;
            }

            #modal-country-title {
                font-size: 1.4rem;
                margin-bottom: 1rem;
                line-height: 1.2;
            }
        }

        @media (max-width: 480px) {
            .modal {
                padding: 5px;
                padding-top: 15px;
            }

            .modal-content {
                width: 98vw;
                padding: 1.2rem 0.8rem;
                border-radius: 16px;
            }

            .service-item {
                padding: 10px 8px;
                min-height: 55px;
            }

            .service-item h3 {
                font-size: 0.95rem;
                line-height: 1.1;
            }

            .service-item p {
                font-size: 0.75rem;
                line-height: 1.2;
            }

            #modal-country-title {
                font-size: 1.2rem;
                margin-bottom: 0.8rem;
            }

            .close {
                top: 6px;
                right: 10px;
                width: 28px;
                height: 28px;
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>
    <br><br><br>
    <main class="main-container">
        <div class="content-wrapper">
            <h1 class="main-title">EasyVisa WORLD</h1>
            <p class="main-subtitle">Выберите страну для оформления визы</p>

            <div class="country-selector">
                <div class="country-card" data-country="indonesia" onclick="console.log('Indonesia clicked'); openCountryModal('indonesia')">
                    <img src="https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/id.svg" alt="Индонезия" class="country-flag">
                    <div class="country-name">Индонезия</div>
                    <div class="country-description">B1, KITAS, PT PMA</div>
                </div>

                <div class="country-card" data-country="thailand" onclick="console.log('Thailand clicked'); openCountryModal('thailand')">
                    <img src="https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/th.svg" alt="Таиланд" class="country-flag">
                    <div class="country-name">Таиланд</div>
                    <div class="country-description">DTV Digital Nomad</div>
                </div>

                <div class="country-card" data-country="vietnam" onclick="console.log('Vietnam clicked'); openCountryModal('vietnam')">
                    <img src="https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/vn.svg" alt="Вьетнам" class="country-flag">
                    <div class="country-name">Вьетнам</div>
                    <div class="country-description">E-visa туристические</div>
                </div>

                <div class="country-card" data-country="singapore" onclick="console.log('Singapore clicked'); openCountryModal('singapore')">
                    <img src="https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/sg.svg" alt="Сингапур" class="country-flag">
                    <div class="country-name">Сингапур</div>
                    <div class="country-description">Туристические визы</div>
                </div>

                <div class="country-card" data-country="korea" onclick="console.log('Korea clicked'); openCountryModal('korea')">
                    <img src="https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/kr.svg" alt="Южная Корея" class="country-flag">
                    <div class="country-name">Южная Корея</div>
                    <div class="country-description">C3, F1 визы</div>
                </div>

                <div class="country-card" data-country="cambodia" onclick="console.log('Cambodia clicked'); openCountryModal('cambodia')">
                    <img src="https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/kh.svg" alt="Камбоджа" class="country-flag">
                    <div class="country-name">Камбоджа</div>
                    <div class="country-description">E-visa туристические</div>
                </div>

                <div class="country-card full-width" onclick="console.log('For you clicked'); openForYouModal()">
                    <div class="for-you-icon">💡</div>
                    <div class="country-name">Для вас</div>
                    <div class="country-description">Гайды, FAQ, Калькулятор</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Модальные окна для стран -->
    <div id="country-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('country-modal')">&times;</span>
            <h2 id="modal-country-title">Услуги для страны</h2>
            <div id="modal-services" class="service-list">
                <!-- Услуги будут добавлены динамически -->
            </div>
        </div>
    </div>

    <!-- Модальное окно "Для вас" -->
    <div id="foryou-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('foryou-modal')">&times;</span>
            <h2 data-translate="foryou.title">Для вас</h2>
            <div class="service-list">
                <a href="/bali-guide.php" class="service-item">
                    <h3 data-translate="services.foryou.items.guide.title">Гайд по Бали</h3>
                    <p data-translate="services.foryou.items.guide.description">Подробные гайд по Бали</p>
                </a>
                <a href="/faq.php" class="service-item">
                    <h3 data-translate="services.foryou.items.faq.title">FAQ</h3>
                    <p data-translate="services.foryou.items.faq.description">Часто задаваемые вопросы</p>
                </a>
                <a href="/data.php" class="service-item">
                    <h3 data-translate="services.foryou.items.calculator.title">Калькулятор виз</h3>
                    <p data-translate="services.foryou.items.calculator.description">Рассчитайте сроки действия визы</p>
                </a>
                <a href="/visa-quiz.php" class="service-item">
                    <h3 data-translate="services.foryou.items.quiz.title">Квиз по визам</h3>
                    <p data-translate="services.foryou.items.quiz.description">Подберите подходящую визу</p>
                </a>
            </div>
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>

    <script>
        // Данные о сервисах для стран (используем централизованные данные)
        const countryServices = {
            indonesia: [
                { title: "Виза B1 - турист", description: "Туристическая виза на 30 дней", url: "/id-b1.php" },
                { title: "Продление B1", description: "Продление туристической визы на территории Индонезии", url: "/id-extend-b1.php" },
                { title: "Виза D12 - Инвест", description: "Прединвестиционная виза для встреч и переговоров", url: "/id-d12.php" },
                { title: "KITAS E33G", description: "Вид на жительство для фрилансеров", url: "/id-kitas-e33g.php" },
                { title: "KITAS E28A", description: "Вид на жительство для инвесторов", url: "/id-kitas-e28a.php" },
                { title: "Регистрация PT PMA", description: "Регистрация компании с иностранным капиталом", url: "/id-reg-pt-pma.php" },
                { title: "Поддержка PT PMA", description: "Ведение и поддержка зарегистрированной компании", url: "/id-supp-pt-pma.php" }
            ],
            thailand: [
                { title: "DTV - Digital Nomad", description: "Виза цифрового кочевника на 5 лет", url: "/th-dtv.php" }
            ],
            vietnam: [
                { title: "Однократная туристическая виза", description: "Туристическая виза на 30 дней", url: "/vn-tour-single.php" },
                { title: "Многократная туристическая виза", description: "Многократная туристическая виза на 90 дней", url: "/vn-tour-multi.php" },
                { title: "Деловая виза в Хошимин", description: "Срочное оформление деловой визы", url: "/vn-run-hcm.php" }
            ],
            singapore: [
                { title: "Туристическая виза", description: "Туристическая виза в Сингапур", url: "/sg-tourist.php" }
            ],
            korea: [
                { title: "Digital Nomad виза", description: "Виза цифрового кочевника в Корею", url: "/kor-nomad.php" },
                { title: "Туристическая виза", description: "Туристическая виза в Южную Корею", url: "/kor-tourist.php" }
            ],
            cambodia: [
                { title: "Туристическая виза", description: "Туристическая виза в Камбоджу", url: "/kh-tourist.php" }
            ]
        };

        const countryNames = {
            indonesia: "Индонезии",
            thailand: "Таиланда", 
            vietnam: "Вьетнама",
            singapore: "Сингапура",
            korea: "Южной Кореи",
            cambodia: "Камбоджи"
        };

        // Модальные окна
        function openCountryModal(country) {
            console.log('Opening modal for country:', country);
            const modal = document.getElementById('country-modal');
            const title = document.getElementById('modal-country-title');
            const servicesContainer = document.getElementById('modal-services');

            if (!modal || !title || !servicesContainer) {
                console.error('Modal elements not found:', { modal, title, servicesContainer });
                return;
            }

            title.textContent = `Услуги для ${countryNames[country]}`;

            // Очищаем контейнер
            servicesContainer.innerHTML = '';

            // Добавляем услуги
            if (countryServices[country]) {
                console.log('Services found for', country, ':', countryServices[country]);
                countryServices[country].forEach(service => {
                    const serviceElement = document.createElement('a');
                    serviceElement.href = service.url;
                    serviceElement.className = 'service-item';
                    serviceElement.innerHTML = `
                        <h3>${service.title}</h3>
                        <p>${service.description}</p>
                    `;
                    servicesContainer.appendChild(serviceElement);
                });
            } else {
                console.warn('No services found for country:', country);
            }

            openModal('country-modal');
            console.log('Modal opened successfully');
        }

        function openForYouModal() {
            openModal('foryou-modal');
        }

        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'block';
            // Добавляем класс с задержкой для анимации
            setTimeout(() => {
                modal.classList.add('show');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('show');
            // Скрываем модальное окно после анимации
            setTimeout(() => {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }, 400);
        }

        // Закрытие по клику на фон
        window.onclick = function(event) {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (event.target === modal) {
                    closeModal(modal.id);
                }
            });
        }

        // Закрытие по ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modals = document.querySelectorAll('.modal.show');
                modals.forEach(modal => {
                    closeModal(modal.id);
                });
            }
        });
    </script>
</body>
</html>