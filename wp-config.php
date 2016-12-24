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
define('DB_NAME', 'nek9');

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
define('AUTH_KEY',         'ysyu#^H9RfN(Dh?Yp`(P2pQbN_D1W0om]Dv]2oAgJCe!:1nuMm2@NUb90!}:$/Fo');
define('SECURE_AUTH_KEY',  'Exy3UD*=1+AB2$O|K-NGqgY?ULssV;B>ua.2nfDF1{~,lLK];].`OYz@4@~1P^+f');
define('LOGGED_IN_KEY',    'i|/u%)_DDTb9v0*7,-)u4wM_,M{yKE|(MLZRDd>edF?{T~ly(|=f9uF-)IN6;{qM');
define('NONCE_KEY',        'IgFUSvi1o5Z+=/T9@;y}h8+L#k*7 7Tr<*joB*S3Jns3_Hmn$(Iod`*DM`T3pd(L');
define('AUTH_SALT',        'Ini39)=<LA1o>z[yav]RJ#HJ pT$Ur-MKTTE~Hhj;-}*=/-j7iq}4D9YyU{)2_$j');
define('SECURE_AUTH_SALT', '[]:sD| ms%e>$MduirSDpL *lZpE|BD4^xW|&t,HoD|WIlP#i~]g_dyO9y98M*kA');
define('LOGGED_IN_SALT',   '!fF$c=uMlkm5<`Qzesi-H`fo@%L&-Z$w|J3Q-(&-uc11}i|RP@twQ=^;&hv$?-Ln');
define('NONCE_SALT',       'vL`=XJ6LI`};F?q-w-Tji6$-E5HGE~5Zn-%JpB ?#p?D1<v{Ou+9(Fa99Z<s1!-=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nek9_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
