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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'demoocta_wp6289');

/** MySQL database username */
define('DB_USER', 'demoocta_wp6289');

/** MySQL database password */
define('DB_PASSWORD', '-!9Cp90SL9');

/** MySQL hostname */
define('DB_HOST', '');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'ervbpurfbeinmcagtr7cpmvn75ffz43jb0jcbxgqwslm465sksbnu2rhsvmurpoq');
define('SECURE_AUTH_KEY',  'xuepkglx0qzh69sp4yfjeey46td986vomgcovdrfoxboza0ou73zozmadaehmrnl');
define('LOGGED_IN_KEY',    'fqqemkacogk5ex72dtn4pppbta7avykvpwflrlmaa2idppedwmpy03blljx0xskq');
define('NONCE_KEY',        '6mqopw6acraonkosl7xocxt6aw1qmjit1hgsrwqbpf0uywkjgvqliwnqrvj52bwu');
define('AUTH_SALT',        '8yd45mkebtue7xretolfflqofwa8jzpmcq9zae9xsv3fz9rprmbsrfbearjggzun');
define('SECURE_AUTH_SALT', 'kjemmjlepv69ysfbggu5grgc0g0nm1lw2f0nnxsxhbbcfqe5puwi8soqyz4uobz9');
define('LOGGED_IN_SALT',   'cbbvdhl07q6mbh8i5kkxocpnoxltsjfqqw5duh2w0u5vdtjbpidjipbuqgicljd5');
define('NONCE_SALT',       'umhkjsjfrelxyb4lknblhruvr9eccizynzudb8ptbb87raykwdydjgbhyzlyt95x');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp4q_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
