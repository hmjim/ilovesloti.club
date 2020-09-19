<?php

define( 'WP_CACHE', true );
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', "wordpress");

/** Имя пользователя MySQL */
define('DB_USER', "wordpress");

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', "niBRM5Qn");

/** Имя сервера MySQL */
define('DB_HOST', "localhost");

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'rqyUE.]u,pY?g-(AS}&|.:D(N{AWzgX]H}8?nO,4Fo-TVde(~0GGrKFp>YcDekze');
define('SECURE_AUTH_KEY',  'Zv=|Z L(x`M<|y9yQN9MP>~,3!4 ]wl_M=$CO`do^*(Bz_o+5*D=?k A_ssD}A0q');
define('LOGGED_IN_KEY',    '(]VR+nAcc$JFRC>gIn58XJc89~{AM4m((@3W$bh.WbGXyZaFJ|67(L`>SK-UKH$m');
define('NONCE_KEY',        '%L(&<HF/D]:(c!u5`L8rt0c&&Ierhm^?:+]l{nsLm/=nH-0VA-u@mfni6lI8m&St');
define('AUTH_SALT',        '(CXE*VBEgK$Wc%5@m8tU~iti4K|<IC@^FA9SA*yL2#ar9g1}mdnSPJ8]098Am?Kb');
define('SECURE_AUTH_SALT', '@7DNK!Hhb^*~y[3=HPV&g(Atp6y(H&X)= LMh)X2X!^l4/SNYF0lK~^r&PAdDhu-');
define('LOGGED_IN_SALT',   'Hmz9|/SsYvHdc(rgd9Kkfe.Otd>=oJsTmXEAg=uiRqP?oB5_Lsj^(BjmZRC9}D)t');
define('NONCE_SALT',       'r1dtPY;,$Hqix+0rGi:W~v3/vsd3{~1w/hMy;Sz*-u%lCDXvVTtNq(W[$f]q#j#d');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'WP_AUTO_UPDATE_CORE', false );
define('WP_HOME','http://35.228.78.153/');
define('WP_SITEURL','http://35.228.78.153/');
/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');


