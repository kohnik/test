# Стартовая сборка для вёрстки проектов
За основу взята [сборка](https://github.com/dDenysS/gulp-template) и статья на хабре с её [разбором](https://habr.com/ru/post/484714/)

## Изменения
- Пересмотрены правила pug-lint
- normalize.css заменен на reset.css
- добавлен dataTextSource файл со всеми текстами, url и id сайта, оттуда они экспортируются на страницы
- расширен layout.pug подключением seo-расширений
- пересмотрена структура папок для pug и scss (common/components), импортировать в _import-*
- добавлена интеграция с хостингом firebase

## Перед началом работы
1) Ознакомится с описанием и исходниками сборки-основы
2) Ознакомится с изменениями данной сборки (пред. блок)
3) Создать новый репозиторий, используя этот репозиторий в качестве template, изменить название и описание проекта
4) Настроить необходимые подключения библиотек и компонентов в проекте
5) Если необходимо использовать хостинг firebase, то создать проект на [firebase](https://console.firebase.google.com/u/2/) и настроить конфигурацию в проекте([firebase-hosting-quickstart](https://firebase.google.com/docs/hosting/quickstart))

## Стек
[PUG](https://pugjs.org/) [SCSS](https://sass-scss.ru/guide/) [reset.css](https://meyerweb.com/eric/tools/css/reset/) dataTextSource

opt: [OwlCarousel2](https://owlcarousel2.github.io/OwlCarousel2/index.html), отправка сообщения с сайта через php на почту и в Telegram

## Общие правила разработки
- pug: использование мощностей pug при разработке, общая схема записи: #id.class(type="type", data-attr="attr")!=var *(id перед классом, класс перед аттрибутами, статические аттрибуты класса и id неразрешены - все правила в файле .pug-lint.json, [описание правил](https://github.com/pugjs/pug-lint/blob/master/docs/rules.md))
- pug: весь код разбивать на компоненты и помещать в миксины, миксины импортировать в _import-components-pug.pug файл (_import-components-pug.pug уже подключен на всех страницах в layout), затем использовать на страницах
- scss: использование мощностей scss и принципов BEM при разработке, стилизацию текста выполнять с помощью includes стилей из файла web-texts.scss, придерживаться соответствующего разбиения стилей как и в миксинах
- js: использовать jQuery только для сторонних зависимостей или AJAX, для интерактива использовать es6+ даже если в проект подключен jQuery 
- image: использовать спрайты для иконок и мелких картинок(sprite-svg), остальные картинки прогонять через [tinypng](https://tinypng.com/)
- text: текста, id и пути к файлам вставлять через dataTextSource.pug и прокидывать в миксин с кодом
- удалять неиспользуемый код

### Дальнейшие планы (toDo улучшения)
- разобраться с работой pug-lint (не работает во вложениях)
- создать начальное подключение обратной связи(php), карусель(owlCarousel2), галерею([fancyBox3](https://fancyapps.com/fancybox/3/) / [baguetteBox](https://feimosi.github.io/baguetteBox.js/)) и лёгкое конфигурирование начального содержания
- добавить дефолтные элементы верстки - хедер с меню, попап, форма, галерея, карусель, кнопки
- настроить единый файл с исходными данными текста и id для pug и js
- добавить доступность контента и правила её разработки
- пересмотреть структуру и возможность перегруппировки компонентов на pug и scss в одной папке (scss/pug import *)
- добавить интеграцию со [storybook](https://www.npmjs.com/package/storypug)

### Полезные ссылки
- удобное приложение для проверки вёрстки сразу на разных разрешениях - [responsively.app](https://responsively.app/)
- онлайн шрифты [Google Fonts](https://fonts.google.com/) (используется в _google-fonts.pug)
- шпора по [html](https://htmlcheatsheet.com/), [css](https://htmlcheatsheet.com/css), [js](https://htmlcheatsheet.com/js), [seo](https://htmlcheatsheet.com/seo)
- генерация фавиконок и манифеста - [favicon-generator](https://www.favicon-generator.org/) (используется в _favicon.pug)
- кастомизация checkbox и radiobutton - [bun.js](https://bun.js.org/)
