// /include/config.js

export const EV_CONFIG = {
  // Языки и дефолты
  defaultLang: "RU",
  defaultCurrency: "USD",
  defaultCountry: "id",

  langs: ["RU", "EN"],
  currencies: ["EUR", "USD", "IDR", "RUB"],

  // Страны
  countries: [
    { code: "id", flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/id.svg", name: { RU: "Индонезия", EN: "Indonesia" } },
    { code: "vn", flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/vn.svg", name: { RU: "Вьетнам", EN: "Vietnam" } },
    { code: "th", flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/th.svg", name: { RU: "Таиланд", EN: "Thailand" } },
    { code: "sg", flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/sg.svg", name: { RU: "Сингапур", EN: "Singapore" } },
    { code: "kor", flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/kr.svg", name: { RU: "Южная Корея", EN: "South Korea" } },    
    { code: "kh", flag: "https://cdn.jsdelivr.net/gh/hjnilsson/country-flags/svg/kh.svg", name: { RU: "Камбоджа", EN: "Cambodia" } }
  ],

  // Визы (все как обсуждали, ничего не выдумываю)
  visas: {
  id: [
    { code: "b1",  labels: { RU: "B1 (e-VOA) - 30+30 дн.", EN: "B1 (VOA 30+30)" },  url: "/id-b1.php" },
    { code: "extb1", labels: { RU: "Продление B1 - 30 дн.", EN: "B1 Extend" }, url: "/id-extend-b1.php" },
    { code: "d12", labels: { RU: "D12 - 1 год", EN: "D12 (Pre-Investment)" }, url: "/id-d12.php" },
    { code: "kitas", labels: { RU: "KITAS E33G - 1 год", EN: "KITAS E33G" }, url: "/id-kitas-e33g.php" }
  ],
  vn: [
    { code: "evisa", labels: { RU: "E-visa single - 90 дней", EN: "E-visa single" }, url: "/vn-tour-single.php" },
    { code: "tourist", labels: { RU: "E-visa multi - 90 дней", EN: "E-visa multi" }, url: "/vn-tour-multi.php" }
  ],
  th: [
    { code: "dtv", labels: { RU: "DTV - 5 лет", EN: "DTV - 5 years" }, url: "/th-dtv.php" }
  ],
  sg: [
    { code: "sgtour", labels: { RU: "Tourist - 30 дней", EN: "Tourist" }, url: "/sg-tourist.php" }
  ],
  kor: [
    { code: "korc3", labels: { RU: "C3 - 90 дней", EN: "Tourist" }, url: "/kor-tourist.php" },
    { code: "korf1", labels: { RU: "F1 - 1 год", EN: "Digital nomad" }, url: "/kor-nomad.php" }    
  ],  
  kh: [
    { code: "evisa", labels: { RU: "E-visa - 30 дней", EN: "E-visa - 30 days" }, url: "/kh-tourist.php" }
  ]
},


  // Бизнес-вкладка только для Индонезии
biz: {
  id: [
    { code: "pt",  labels: { RU: "PT PMA: Регистрация", EN: "PT PMA: Registration" }, url: "/id-reg-pt-pma.php" },
    { code: "consult", labels: { RU: "Сопровождение бизнеса", EN: "Business Support" }, url: "/id-supp-pt-pma.php" }
  ]
},
vizarun: {
    vn: [
      { code: "run-hochiminh", labels: { RU: "Визаран Хошимин", EN: "Visa Run Ho Chi Minh" }, url: "/vn-run-hcm.php" },
    ]
  },
  // Все пункты меню — КОПИЯ как у тебя в макете, ничего не меняю
  menu: {
    RU: {
      home: "Главная",
      faq: "FAQ",
      calc: "Калькулятор визы",
      about: "О нас"
    },
    EN: {
      home: "Home",
      faq: "FAQ",
      calc: "Stay calculator",
      about: "About us"
    }
  }
};