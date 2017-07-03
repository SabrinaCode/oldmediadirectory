<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
switch ( $_SERVER['SERVER_NAME'] ) {
	case 'dna.economist.local' :
		define('DB_NAME', 'economist');
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'root');
		define('DB_HOST', '127.0.0.1');
		define('WP_DEBUG', true);
		ini_set('display_errors', 1);
	break;
	
	default:
		define('DB_NAME', 'economist');
		define('DB_USER', 'economist');
		define('DB_PASSWORD', 'oY7EJvFyqdV7qzid');
		define('DB_HOST', '127.0.0.1');
		define('WP_HOME', 'http://mediadirectory.economist.com');
		define('WP_SITEURL', 'http://mediadirectory.economist.com');
	break;
}

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
define('AUTH_KEY',         'nI E~rxck@ak2X+0xRES6&FBohpY_{ocH(D-vPo&u0 Arl |cIzHlN/9At^Ll+g+');
define('SECURE_AUTH_KEY',  'a|B;!RoD2n-2|,KoDRh,n[s%*l?8*^@Ywg|`<W4B|y5,#DJP~m]y)cU%@XMr{DP5');
define('LOGGED_IN_KEY',    'uGu-9N3^q~0nY@t2+,(3p+~P7owZhT|1^:z,BA)O>25IRv4yIG6+lM[**Zl?I?ip');
define('NONCE_KEY',        's%__zZudg+Y-=85H|}-XtzA?WM|sH}->l;/X90++VIU{3a_chRL-S+3[dng3CDxV');
define('AUTH_SALT',        'd8#TgCaQGc9(_ _#6vEm!H]k-.A1b:p;e&W6.%N#?$j+Li5_Jst_YWO/uY[eo+Z2');
define('SECURE_AUTH_SALT', '?e&)!=0TTC9AyIY+7(i@%CMO0}87g.fPBr0-bv(.4+|ZEU?JBM-paoS{d(.p(!x#');
define('LOGGED_IN_SALT',   'OuihIr/c;u#Q%.!rJ!fzou|k8k?j0=XiomWOEm%k)LRPje}h[<]ezpbB2xKO*K]@');
define('NONCE_SALT',       '|~{CL:|4f:Girnu9+:z%2Y8syMa}..Jwa/tD|t[-m*l6s901h0}4a)-iKC#NIJK0');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'econ_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if ( !defined('WP_DEBUG') )
	define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
