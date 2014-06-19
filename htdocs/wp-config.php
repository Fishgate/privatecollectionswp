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

if(file_exists( dirname( __FILE__ ) . '/wp-config-local.php' )){
	include(dirname( __FILE__ ) . '/wp-config-local.php');
}else{
	/** The name of the database for WordPress */
	define('DB_NAME', 'staging');

	/** MySQL database username */
	define('DB_USER', 'settings');

	/** MySQL database password */
	define('DB_PASSWORD', 'go');

	/** MySQL hostname */
	define('DB_HOST', 'here');
	
	/**
	 * For developers: WordPress debugging mode.
	 *
	 * Change this to true to enable the display of notices during development.
	 * It is strongly recommended that plugin and theme developers use WP_DEBUG
	 * in their development environments.
	 */
	define('WP_DEBUG', false);
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
define('AUTH_KEY',         '2%,#fWU3!Sf:z&EBA17Lb|l6dG+~cAO[p[(D7$u7{eE9DB&&> 12`AK^nW LL.WG');
define('SECURE_AUTH_KEY',  '9u,*Go6MUM@N%OG(n$+JI|(,wj%%9wCHh-PZ?QdGl)5+t}$L#K-[>veT70y5z/!|');
define('LOGGED_IN_KEY',    'bdR)OSiQ~fh:}]+;6I|JSrQ&l.O;(*UrgTdtg&/d-O{7(zn!i|RkR{fnmvaH-K8n');
define('NONCE_KEY',        'VT$}h[*W^odSk:7~7.Cck6wZM?I%3n=~@=3l:ZpP!j_9Q!}K%@&ZqgwYr}hMQNcN');
define('AUTH_SALT',        'KBUtS^2,s3 Ef;6D>yNZRI`LoP:S)N*o_rB!eMQ}dpMOCq3}@6*Ls{Cl~8;}~bZc');
define('SECURE_AUTH_SALT', 'cSkGTx>;eHz-kQQ8#<3TY-9~k~z;s,0l7gaIr+8gfEHg!Rs}c/ ?sT+y-R444GJ<');
define('LOGGED_IN_SALT',   'Z~Ta_9La_!5vlccM0mRA.68r}Dl+3mWN%zf@RJ;OVTF2-:X]J64+;ObCB]7Hw(VZ');
define('NONCE_SALT',       '[QYw+pw+CP-H5o.Agd_xtjkJ_p${9W/b-=O*I`|?fGTj=eF20b]=-jHj0Us^<P~@');

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


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
