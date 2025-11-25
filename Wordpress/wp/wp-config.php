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
define( 'DB_NAME', 'b2025_ylipelkonen' );

/** Database username */
define( 'DB_USER', 'ares' );

/** Database password */
define( 'DB_PASSWORD', 'ovcyh97lSIv4zCQokEVbmifc68gprgK1' );

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
define( 'AUTH_KEY',         '&]lW-Sr| ^Q-4Wh?{b]~ Kj.QJU+r]l8~|qa/G@g5;42)VemgAg=hX7!RT$G!g2m' );
define( 'SECURE_AUTH_KEY',  'nQ+kjZ!oVr[c!5@p7Pw<tbFU^fn>5~b4gB`Th;5,~laHd4WZM8vshxy`)Asv4 `*' );
define( 'LOGGED_IN_KEY',    'dyaAwS0;H}=Ds7;K3m` SWzCZ4mrVclQhK*-2@e>3&vaw|`JIK|g)lskSY`N(dD?' );
define( 'NONCE_KEY',        '==`]1mkMXCe-de9O5|-jVGA8!^R<EAW,??nG]TE;(19yvM17aKR~7S{G[SVeHZ!s' );
define( 'AUTH_SALT',        'N8FX)1ksw;8xHE{rs~t@no,i8R!uND3ObS?K3Do`Ph!|w*:1-,jBCt]g>en%}UEs' );
define( 'SECURE_AUTH_SALT', '8$S1(/TOmiKM[R+2W24KPy9-79e?y_Gr#u%..aG7hg%1Ko_2~@S_u2vj,dA1$?m7' );
define( 'LOGGED_IN_SALT',   'm:Dc@AV|z;q<Q);WW5Ql_%vK{RkJOZKXZ`6t&oQ{siN>GFaq)[MnkZ`ot!:X6o3B' );
define( 'NONCE_SALT',       'I=4rM,<gHP^Lr%1ouWiRQOP=Z#HWle(2Ez6.a &#kvsSaoUxw9BZ?y}B?W[-<m0q' );

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
