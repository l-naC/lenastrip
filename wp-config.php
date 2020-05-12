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
define( 'DB_NAME', "database_name");

/** MySQL database username */
define( 'DB_USER', "database_username");

/** MySQL database password */
define( 'DB_PASSWORD', "database_password");

/** MySQL hostname */
define( 'DB_HOST', "localhost");

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0cd23463a8c11e0e4af4232cb2060573393d9b34');
define( 'SECURE_AUTH_KEY',  '7006f39cd68a0b971826dd1ebbaa62f4fd5cb54e');
define( 'LOGGED_IN_KEY',    'd9113d9906ad27b3350af9efc95af5db1cc6c05f');
define( 'NONCE_KEY',        '93d2b875ee949c70bc43a7bc376e2e56a3470f45');
define( 'AUTH_SALT',        '256eb1473615900e499dfa624a7ffa1146f5ddd0');
define( 'SECURE_AUTH_SALT', '7f5ad81f46ff07bdba569cbd1c4431539bf75c7d');
define( 'LOGGED_IN_SALT',   'd5538aff41cbf94d0c6a9a2d6ab1b7aaa232eba9');
define( 'NONCE_SALT',       '6c1db44505f8e53d6b476abf84dde644f8b44789');

/**#@-*/

/**
 * WordPress Database Table prefix.
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

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
