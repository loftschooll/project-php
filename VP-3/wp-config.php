<?php
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
define( 'DB_NAME', 'turistik' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'E4aSn({g+tdgw_xIVW~!H$U#0Q2iA)G[3R&JCQiPVjr+t2w[vG;lrk#w|HMFF(ZV' );
define( 'SECURE_AUTH_KEY',  '7Avi^2ic6JyP{/0/dBfT#,#FJo2ff/-i(#|#g6(ST8LxLy[/mINx)93ojG,|riuu' );
define( 'LOGGED_IN_KEY',    'qnNs4/}$BJx!l/i|NFV1<fJ<egQ.Kj37LUyU@MNua6z}QCNueY<]irCq);hg8iA~' );
define( 'NONCE_KEY',        'o1jt+ Tjb,MYzaecz3Lnm/,PYG(Pv3t@(^yN,hzCwM[JG=_`!|Z/n#Xy6UIWDYTC' );
define( 'AUTH_SALT',        'H6`!dzU~=n^}YpyJ?J.5^GaiD#hGy*dA-tu(uB?D(o5?3&BQEL(jfo<H~9hA}~/W' );
define( 'SECURE_AUTH_SALT', 'V>U>uoQl$}w5$O~x0&wC5/6{2|nPuGAPyNF3lR<]X?!Hc[Wq^OCx@kI3xL$umY?g' );
define( 'LOGGED_IN_SALT',   'q6{A49l<,}Ng*(67m{h+R|2|G^/{8]J?9xD9oOuVj!72ChRjuMqEj=7n$-p|]FGb' );
define( 'NONCE_SALT',       '%`p&D;[tLOOPlD}s`DD[tM4Nd<.@sR^[*5lK:*u.7&}G}L`s`+a/#P;9c#cTzd4R' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_turistik';

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
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
