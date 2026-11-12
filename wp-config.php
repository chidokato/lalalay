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
define( 'DB_NAME', 'lalalayresidences' );

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
define( 'AUTH_KEY',         'n~9L6|Y,zXrBo2ua*S;|>gPrCOkI{a`M?;GumB_QWu|txYQ28I=]ZHtyQX67202M' );
define( 'SECURE_AUTH_KEY',  'jp${BqsO)wv}G%@>T5+l.lm3L`gGvHn0)9%Oflp}>$s4o8rg6kqhU4%/iz7B&i(>' );
define( 'LOGGED_IN_KEY',    '=$63]xqnT~#aK:{2T#yvCMlr5KcAb[6 vS$+!eC&i=4vqp8<rDhWf/9bqaKG2fm,' );
define( 'NONCE_KEY',        'vwKF/??dpE1_l)ctTy[gWYr/uOSo*WlWmR^Ql>bsuztv8iE>yWS7vKBIlA)Gm/`v' );
define( 'AUTH_SALT',        'I.+x?l.PJ-O}j@!s-CoOZARzR7) U.>h9mC-0{_4C}v]<tyd6#Q4<O*PJHk!o_sx' );
define( 'SECURE_AUTH_SALT', 'wmwSz!tSg5$O}}otx?|X0-7yMnaLm<n?c|E%F7fX7En1%BK:|(9]O.P_a,,dGnlO' );
define( 'LOGGED_IN_SALT',   'pq*-J!et6BS!I-=kS- -_t=~g56hz!U!YC`c1K#]A;F+Lf{mw5rqSsQk_vvA}N#R' );
define( 'NONCE_SALT',       'Id._l5]0utrs-.N!YX1AX2)_{dVwZj&w}B#6^ad!`.~{H6lQ0*G?,HprTq4a/4JY' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
