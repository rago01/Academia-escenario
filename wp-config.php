<?php
define('WP_CACHE', true);
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
define('DB_NAME', 'rbkapopa_wp3');

/** MySQL database username */
define('DB_USER', 'rbkapopa_wp3');

/** MySQL database password */
define('DB_PASSWORD', 'B.EGTgOrs0IRHWtn94902');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'ZcfodkZPaZOUH2R1AsovUDp9XYIssWHMA623jHAdk4SnyyarC1zHkE3azBan9UXV');
define('SECURE_AUTH_KEY',  'WKQnEL8q7EEHlVjODq77TgTEnPOtEp3svZefEJKgYecRrxPoYuZGD8SqsvPycr8Q');
define('LOGGED_IN_KEY',    'Bq2qd79NacwlI7ZP0gCG7RZHxsUSD527Yxp1YUHJJEWkUrfVTgQBkxXgJrDlqeQ9');
define('NONCE_KEY',        'jYKIWt9ZqDJUvYgEbfi7BClnYqesaNUa7KOJcjW8fss9cBcQYWuQJ2Jgz84vtG3t');
define('AUTH_SALT',        'C9bxhYvwVHiGiuBevknkzdqta8WaLKUkvlTuQLPnbw2pXfgGikJ64MzbwWbUDIfX');
define('SECURE_AUTH_SALT', 'gYlr4VUbD6jHF2XeRaGrUDLf7IbBFZM3ciJSxnIau7bvkIitirKiWdZ74HZmkrlB');
define('LOGGED_IN_SALT',   'y8cs2iKvO757LWWHEAW7lFAoqJstzSVhh1X2z0Y1sCZsiNe31NnsidDPbOgAyUki');
define('NONCE_SALT',       '8Gk5DaWXCdKIvfKKHpVcFqWjbFjCtlPmv9OoDYnYs2E4lTsH39oHf8U6Raafmlan');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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