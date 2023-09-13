<?php
define( 'WP_CACHE', true );



















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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ronibd0_wp168' );

/** Database username */
define( 'DB_USER', 'ronibd0_wp168' );

/** Database password */
define( 'DB_PASSWORD', '3pC95pNS[N)!7[@c' );

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
define( 'AUTH_KEY',         'hhsqmjj06lmr3q8bn1fkvgzan60jxikv3wqxsqcptnsauxawput9khwfgqzmj8fu' );
define( 'SECURE_AUTH_KEY',  '07pnnndsg7uhln6ca5j5tguxxenmgj3v45mhz6xyd9cvy3fb14bm4saxblyls8hu' );
define( 'LOGGED_IN_KEY',    '4jhnzyullyf4zm8uflxssdmlugjpp1am9jqkfmd8xh9wrkkkfounpbjigtzmyuqs' );
define( 'NONCE_KEY',        '7rvr0k8wnnckzmppxltsx3nmgwdczpohpjumevyxvtts5n2rygnrgpaovfr0sxev' );
define( 'AUTH_SALT',        'xbowxo6a0hnlktpbl10ujve7fxashbyp60gij9fic8biid1kmdigpzkoqo2dn9fj' );
define( 'SECURE_AUTH_SALT', 'a2kjdpvi4o1gylemnfmkpg7p8q4scyfovbslqhiqkw0hjxz07vmzbn4qyd68sfup' );
define( 'LOGGED_IN_SALT',   'ebfsh3bgqpsx1m3f8b4cr6jnhk7xolxqogfngh8exojd0bqk5uhrnurlr3pcwhnx' );
define( 'NONCE_SALT',       'nqopdi3ezzt5itg3zxtcmjxwl6vb8gynmwl8q5j2k1bpktohitmd6ewckuo8nnhg' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp3u_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
