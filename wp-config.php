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
define('DB_NAME', 'dance_america');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '[G-)%7AcDWj)O7cXvGA^ =y3,Q&l2~Yz)hvT;N=vuq%8#.#-QT@5P#.y$JIRI]sD');
define('SECURE_AUTH_KEY',  '@VQr3j|;,)AG9xICVP;!j&qat$4vm6X?dNf0!>Aq~[ij_ >k%$Wr=9bP5;mgKO0h');
define('LOGGED_IN_KEY',    '4>c^9{Balk}!nVge(yqOq%Z(>]|%6677=+l|r)$#xzogfU6[Rkp:&DC4|KTPeFs@');
define('NONCE_KEY',        'f{ES|rPyVmKkMf5bT|-0qYR&A[]fXRH(4Yk|63)hXY-+DXTi+:nL=J)xfxUo1wWK');
define('AUTH_SALT',        'aAB3Ny!L5%|+(&47CKZ}mEXeG-ZTl>j>VYbWDkkt|Uopu^wzAaA&+VK3f~_Pt`Hk');
define('SECURE_AUTH_SALT', '.E3<)q^?LYZkcQo$>fmI19<ai;P_h2ZoKpQ WGr`Zg*[,e=2n!/ A_J=FC*Bshpn');
define('LOGGED_IN_SALT',   'N]FmMz>34@K9*s<sh|<(NztoF:^!xh<vyBbm_}7QJ9q|:mRSn)GPF~u`_|_sGkKo');
define('NONCE_SALT',       'c*O1X@V^LIi5WQ(-3^Mi{1Wm?} }HENHa0y[2B1(|,U1:0~rk(nAfW`ZRi0{0FT ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
