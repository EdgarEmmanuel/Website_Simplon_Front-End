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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6a~x)BU9.kyrQ%jjEf>bb)L5yZHyep`^4q{YvH}oh4W6nNMA;xelDP3C@lyJ7^bT' );
define( 'SECURE_AUTH_KEY',  '~a3r}:J(! =:IITAj0PvcS}L#U#.l/t*IOyXp}tP$9v00P]`i}9B]T>~8Q~w8{9O' );
define( 'LOGGED_IN_KEY',    '#}n/]pr.mW<f9dEL+lq&5iIOJ^@3fu0NT[d@zL?}s3l7)gQCui:~?uJ0qlI/fo4_' );
define( 'NONCE_KEY',        'GfC9HH>77_KZ;6|w4  pNr1:n<T661$ef7@!A..{bPq1Ey`P/CI<|X{,{R$Q0NoW' );
define( 'AUTH_SALT',        '^m~$XK>O9NSR,p?QMW4,v$HKKg/r@:%C!9,TnHqQ2814jwjMjK},EHcL(L;*(s.V' );
define( 'SECURE_AUTH_SALT', '4s`jj-%dCo{GUb?dW[e9Hr=dn:Ao _N?K)#21fNrW^y_0tZ-Kp?kF);Qi9.}gsFz' );
define( 'LOGGED_IN_SALT',   'WR#zSky4mj)y2?OI:^5^]FOIR6isn[@-*qjATJ/R&ygbM.Q(*I3*mpxHb?3V*7T^' );
define( 'NONCE_SALT',       'W,H%-,j3NC3E*7&AAgP%LD!p`v~-ILD+/59>T<S<<ko)TMtT?Z:[gc<g8DC=cXnt' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_test1';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
