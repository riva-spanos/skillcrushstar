<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '8(M^7`Rkt2T6.d3hJ}ecwg_SA(ih6F<i}AGHz`6M$@dC;gkP.OXe;4X2:o:Y(.Lp');
define('SECURE_AUTH_KEY',  '*o?Ncl5tC<49pWQ_uWU&9M(JQYl&Gz*[oKxyHzv.pr=!DOL/r72qFt2R/_?{D4<F');
define('LOGGED_IN_KEY',    ')$PZ#LQs>,/gDMf%Qb~p1Wz(g1}k0+=stJ=r)ezs9(ULwI[C>hxR4;Kx`M&D+*po');
define('NONCE_KEY',        'j|s&2A;o`U`fMRv#G`!<GpKPj`KTg>g9,ot]Z1m/x|-mQMmT[iq66&_+*NgOKeB_');
define('AUTH_SALT',        'q{/[K@pmKyj~z1xYJNN8DOt.+?i?DO~g Zprz%M{=%niMMKOLP><!bMG}D_Vo)MH');
define('SECURE_AUTH_SALT', 'jR]ue~,XtS_}VUeQd,0dRJO@aQ$w66rY_b;_y=DShc0xs`=?Dby_jX @a@0Mo3t,');
define('LOGGED_IN_SALT',   'o6P |UIe&a~G+IWS7Uc>ATi$tO@e5uR^=8aqd+O~t%$ `V~225G,b|Y<t?vNGy?N');
define('NONCE_SALT',       '6a-2{2@m*R[5IqcIZ>nHF6-^32a} E(o0Lc8Nzpwj58?|S6K-C2g>v+at[*_&bqS');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
