<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'pfzDBl6ilc');

/** MySQL database username */
define('DB_USER', 'pfzDBl6ilc');

/** MySQL database password */
define('DB_PASSWORD', 'qNQHhYe3vy');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'a-7D?R-^v;HFSFJu1]j3hqV /GZ4p7sw+w;=A+vw7|8B>K,y!aKyaD9.*Q|_#fr+');
define('SECURE_AUTH_KEY',  '(29-t!x<42,},7>tTDU 5-_ Lq~BED0MJV&uH@8eL0UR>l|tjvy1P-^E:+@a,G1*');
define('LOGGED_IN_KEY',    'wT|H)W^B4T1&BbpX4T*c+vcJ`+@C-Kdhs2+CXtBWF2;5__!q|Zl,/P(8w:>e-w7m');
define('NONCE_KEY',        '-2(@pw?$$tH+;RM]B.CsI`V2zHl@U&-^(j)O<Chy-H+Wwdc+jHnCa1TdO,dl2>&u');
define('AUTH_SALT',        '8LM;`:RCu+a}DPzkeMC.iVxwR#|v*k;ruODh7|K5x=v4V_KJ}m68.~J*4Y!&63oe');
define('SECURE_AUTH_SALT', '=Hb)$94`B-hm|jm,#vkv-RYxb}Z>{&Q03t#>y*8t/zb|qiI9k~KU(+TeQ79Z12em');
define('LOGGED_IN_SALT',   'lLQ`E>~NkZ1}D=i;-fX[O* Ex&+|y|iKJ0*ILT&1kLD;k..m<T?a+wAuoF{niXd4');
define('NONCE_SALT',       ',<.0lSi]5,V!Q5fg*y6)9N@OFcL[+kWJ`kGqFd9:SFilpS+^ljD!qsfJO8!=)IFK');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
