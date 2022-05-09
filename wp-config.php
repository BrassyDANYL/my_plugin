<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_3' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost:8889' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Edyscrv%=4M>h%o%|.L]rAmLgKTt},J]T7dvU|sTy4HB0w@vnIhAI:Lp=fE}UNxo');
define('SECURE_AUTH_KEY',  ',%EJ^xdpXkq+Coppw.p5{0Q{BUsVhK#XH)h_h#n4Q=xSoH8F=S{#:%q,QDLyO^^W');
define('LOGGED_IN_KEY',    '5XUHD8}U7emRmPWliDQW=7MQ{X)$O5R:_l%CO8W.I8Iu+fBciRyh|{y5Ei0SI<HH');
define('NONCE_KEY',        'XDJm}fd^JmlD<mfU4=2y#VY)4|C({J,EN_q|e,]obWrN8/ih.GA2bZmATo(Ay3E{');
define('AUTH_SALT',        '2v6Blrp}(C$q|e+<k|o{T%}nkvnDUs[.Jq+uDjc]lYcg2WSHQ6:k21/ISgMm|%dD');
define('SECURE_AUTH_SALT', 'nWyq5$cLT5r^%#_Ml<wJopS6^fN[cq>[}mbnh3z1dMsa.qmddEn<t5skF5UiQIS_');
define('LOGGED_IN_SALT',   'uul@TGywSL/J1fmAj|<_0ei5E3JV}cUb.6ZK}/7=EzI6=v6jpshK/]]@o|TVWnxN');
define('NONCE_SALT',       'O/Y%[A$,zEwzzXDJ]lU9WF6{A|CWi0kws8sd8oSds)_MHCW+nq2#weqwZt:7OYY6');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
