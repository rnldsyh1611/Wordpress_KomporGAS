<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', '4dm1nwp@123' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '%X|f~z.uL*!iA%483|!2DB)P,Hq4[uu0HH>jf~fj_Y|JUXWdn,QiCn~.]R^P=~WV');
define('SECURE_AUTH_KEY',  '-~}<>|UW-!@$l^8Z x<_jdz6t5?YIK:WN[nFP2ox FWNF3j&p{c`%JYh>*Qm<>jL');
define('LOGGED_IN_KEY',    '`N+f2^UK|:M*e./Db]-Ed)jw7ECW=?a%wjVn@q|J.?n+1Fqm7b6on:+?]!-+@&wx');
define('NONCE_KEY',        '_jM*MF*!%v5g:W$dZmP2.<1+HNZDdQ~-mzlq-cx*]E|t4T|{VFAf&-h5j|-d.[@j');
define('AUTH_SALT',        'E$ma|R|Mq)N+.M|c6}k_d0^J=(j:#DH^jlIGsOn0|i+h#qEDkg1Hvgvok=TbVzi;');
define('SECURE_AUTH_SALT', 'os;Jj{kupiYJ1=B`vw%e7!Y4* &Ak`@Z4YCOW{0;-z~rRVlwPpRdQ<][B9:=Kq>R');
define('LOGGED_IN_SALT',   's;,2]GtFS#%QaVS:+L,qUQG>IHa4*{!D|$Xnb2bxg~YDN|}RemYlJl^j%J|~++VQ');
define('NONCE_SALT',       'KC;}t@b_=f(M+q#dv{=Y$V<%Hv9mGIUYn8/6@$C7UMcw^d@G7YCJJL](oh{dZ,8:');
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
