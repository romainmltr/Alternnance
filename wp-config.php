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
define( 'DB_NAME', 'alternance_demo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'Z@8t:mMQGhNKYFZO!.aL)u9v5a_m@kO+yphc6Gv`Z5?;y:>35s0amA[w(Qsh/<d|' );
define( 'SECURE_AUTH_KEY',  '0|yp!OxduWiuFwe36J,;Ka?LJy>9x.<-|CLk*:soSdt*{$<~|;jdDUwaO&/0`B1u' );
define( 'LOGGED_IN_KEY',    'LFj%HiP~vO;5KJ#>j@?E<|./^Pdh.zINGy*K]o1$e6om,CV^$l.`{Jc0{(/[5?W{' );
define( 'NONCE_KEY',        '=V{V(,l5i3ow/NKlGgh(=e)|E~D10+`oG1?MVuX{}};7;zRWEJO9TFW@6G<~36`C' );
define( 'AUTH_SALT',        'p_CPevqm{^4}O_3PC 0fq-I`9&)rj%rVjbi|`?TG:v+`,GO-A,[mc-X.)@Tp@fei' );
define( 'SECURE_AUTH_SALT', '@Z+}kovqT{=}4ms(e#m;}$E@l9c@xewk9Y`+6mH4F-5b=HH0v0l1tQZ3L#8Qn>!$' );
define( 'LOGGED_IN_SALT',   '!2F{@_HfXf|HTaz>(}{|x{K+2oIbs}$jyTT6@bWY~C(g13-M_qjLhl!P[tT7Zf^;' );
define( 'NONCE_SALT',       ',|v2//V2s1%$O*lQ=K.V|W]wLO@&l`b]!hcO`ar>(0A_E70MbGWn/^]`*ce%2pe6' );

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
