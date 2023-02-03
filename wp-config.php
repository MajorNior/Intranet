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
define( 'DB_NAME', 'intranet-nat' );

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
define( 'AUTH_KEY',         'DZ|T%h&0vZqf,e0o*@j`Bf }c6,AF+,7H>n1/ChpdyrS5_6i2XYe0>uzm]E_*Z/~' );
define( 'SECURE_AUTH_KEY',  'd2?pKEe/d5~?4*Q_d @w@&:YZUK#zLpi{FfoeYJPF v2yW,c#%a8AP=8}%kA`9HW' );
define( 'LOGGED_IN_KEY',    '[z-QhEv#ybNU VN.<R/JSBnFKU7H@_O1%pU0C,Mk&}BVE$q@&AZ5X_=LN+!amllG' );
define( 'NONCE_KEY',        'U2Y?vvT!G%0U~:s?s lT/l_+GqFfmgb7U_WTt1BCQz%IO#%-!OttU9B)`KREuCl$' );
define( 'AUTH_SALT',        '!_@TDAR<IaHd/:2B,g7=-!R!0>no2#(<Gkx?rNC}DL*^YP!|a|m5jhq_y:]J~~Yb' );
define( 'SECURE_AUTH_SALT', 'mRf|_^TtJOCP^KkP^P_WjhSgqB>H:d=9VrV4B(R&cglGi}x3-JbmN(**cftT$ {`' );
define( 'LOGGED_IN_SALT',   'DtA^C5QMA^Y:NgQ,ubC=E[<$hwfU_dggXQ&:xB>qQ#e9|n)2$LaQzKK(OG9?ukGX' );
define( 'NONCE_SALT',       '0F48d~g{xJIe5*;J,jkA%@gYw$i;g-;5NYyV__%$^z^TNy-F06UZoZ__y{mMQyR;' );

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
